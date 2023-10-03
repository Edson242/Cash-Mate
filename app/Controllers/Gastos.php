<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Despesas;

class Gastos extends BaseController
{
    // Atributos
    protected $_model;
    public $user_id;
    public $categoria_id;
    public $descricao; 
    public $valor; // Sem formatação | Aplicar formatação
    public $data; // Sem formatação | Aplicar formatação
    public $categoria; // Int ou Str -> Retornar em Str

    public function __construct($user_id = null, $categoria_id = null, $descricao = null, $valor = null, $data = null, $categoria = null)
    {
        $this->_model = new Despesas();
        $this->user_id = $user_id;
        $this->descricao = $descricao;
        $this->categoria_id = $categoria_id;
        $this->valor = $valor;
        $this->data = $data;
        $this->categoria = $categoria;   
    }

    // Métodos Get
    public function getDescricao()
    {
        return $this->descricao;
    }
    public function getValor()
    {
        return $this->valor;
    }
    public function getData()
    {
        return $this->data;
    }
    public function getCategoria()
    {
        return $this->categoria;
    }

    // Métodos Set
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    public function setValor($valor)
    {
        $this->valor = $valor;
    }
    public function setData($data)
    {
        $this->data = $data;
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    // Métodos Adicionais
    public function calcularGastos() // OK -> Retorna dados corretamente
    {   
        // Despesas vindas do DB
        $gastos = $this->_model->findAll();
        debug($gastos);
        // return $gastos;
    }
    // OK -> Adiciona corretamente no DB, porem n retorna resposta na View
    public function addDespesaView(){
        return view('inserirDespesa');
    }
    public function addDespesa(){
        // Busca os dados do Form e coloca em um array | PASSAR ID USUÁRIO/CATEGORIA COM SESSION!
        $date = [
            'user_id' => 1, 
            'categoria_id' => 1,
            'valor' => $this->request->getPost('valor'),
            'data' => $this->request->getPost('data'),
            'descricao' => $this->request->getPost('descricao') 
        ];

        // Inseri e faz uma verificação para saber se adicionou de fato a despesa
        if($this->_model->insert($date)){
            session()->setFlashdata('sucess', 'Despesas inserida com sucesso!');
            return redirect()->back();
        } else {
            session()->setFlashdata('error', 'Erro ao inserir despesa!');
            return redirect()->back();
        }
    }
    // OK -> Criar direcionamento com o ID da despesa
    public function deletarDespesa($id){
        // Deleta despesa passando o ID e fazendo uma verificação
        if($this->_model->delete($id, true)){
            session()->setFlashdata('sucessDeleted', 'Despesa deletada com sucesso!');
            return redirect()->back();
        } else {
            session()->setFlashdata('errorDeleted', 'Erro ao deletar sua despesa!');
            return redirect()->back();
        }
        
    }

}
