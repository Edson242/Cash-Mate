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
            // return redirect()->to(site_url('/dashboard'));
            return true;
        } else {
            session()->setFlashdata('error', 'Erro ao inserir despesa!');
            // return redirect()->to(site_url('/dashboard'));
            return false;
        }
    }

    public function updateDespesasInDB($id, $dados) {
    // Verifica se deu certo o update e seta as Flash Data
        if($this->gastoModel->update($id, $dados)){
            session()->setFlashdata('successUpdate', 'Despesa alterada com sucesso!');
            return true;
        }else{
            session()->setFlashdata('errorUpdate', 'Erro ao alterar a despesa!');
            return false;
        }
    }

    public function findAllGastos($id){
        return $this->gastoModel->where('user_id', $id)->findAll();
    }

    public function findCategorias($id){
        // Busca todas as categorias no DB
        return $this->categoriaModel->where('usuarios_id', $id)->findAll();
    }

    public function addCategoria($dados){

        // Inseri e faz uma verificação para saber se adicionou de fato a despesa
        if($this->categoriaModel->insert($dados)){
            session()->setFlashdata('successAddCat', 'Categoria inserida com sucesso!');
            return true;
        } else {
            session()->setFlashdata('errorAddCat', 'Erro ao inserir categoria!');
            return false;
        }
    }    
    
}