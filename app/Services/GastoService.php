<?php

namespace App\Services;

use App\Models\CategoriasModel;
use App\Models\DespesasModel;
use CodeIgniter\Config\Factories;

class GastoService {

    // Atributos
    protected $gastoModel;
    protected $categoriaModel;

    public function __construct()
    {
        $this->gastoModel = Factories::models(DespesasModel::class);
        $this->categoriaModel = Factories::models(CategoriasModel::class);
    }

    public function inserirDespesaInDB($dados) {
        
        // Inseri e faz uma verificação para saber se adicionou de fato a despesa
        if($this->gastoModel->insert($dados)){
            session()->setFlashdata('success', 'Despesas inserida com sucesso!');
            return redirect()->to('addDespesa');
        } else {
            session()->setFlashdata('error', 'Erro ao inserir despesa!');
            return redirect()->to('addDespesa');
        }
    }

    public function updateDespesasInDB($id, $dados) {
    // Verifica se deu certo o update e seta as Flash Data
        if($this->gastoModel->update($id, $dados)){
            session()->setFlashdata('successUpdate', 'Despesa alterada com sucesso!');
            return redirect()->to('/addDespesa');
        }else{
            session()->setFlashdata('errorUpdate', 'Erro ao alterar a despesa!');
            return redirect()->to('/addDespesa');
        }
    }

    public function findAllGastos(){
        return $this->gastoModel->findAll();
    }

    public function findCategorias($id){

        // Busca todas as categorias no DB
        $categorias = $this->categoriaModel->where('usuarios_id', $id)->findAll();
        $categoriaId = array();

        // Coloca o ID como Key e o nome como Valor
        foreach ($categorias as $categoria) {
            $categoriaId[$categoria->id] = $categoria->nome;
        }
        return $categoriaId;

        $despesas = $this->gastoModel->where('id', $id)->findAll();

    }    
    
}