<?php

namespace App\Controllers;

use App\Models\CategoriasModel;
use App\Models\DespesasModel;
use App\Services\GastoService;
use CodeIgniter\Config\Factories;

class Home extends BaseController
{
    protected $_model;
    protected $_modelCategoria;
    private $gastosService;

    public function __construct()
    {
        $this->_model = new DespesasModel();
        $this->_modelCategoria = new CategoriasModel();
        $this->gastosService = Factories::class(GastoService::class);
    }

    public function index(): string
    {
        return view('welcome_message');
    }
    public function dashboard(){
        $dados = session()->get('variavelDeSessao');
        $id = $dados['id'];
        // Pega as despesas para exibir na tela
        $data['gastos'] = $this->gastosService->findAllGastos($id);
        // debug($data);
        $data['categorias'] = $this->gastosService->findCategorias($id);
        // $cat = $data['categorias'];
        // foreach ($cat as $cats):
        //     debug($cats->nome);
        // endforeach;
        // Vai para a View de inserir despesas
        return view('dashboard', $data);
        // return view('dashboard');
    }
}
