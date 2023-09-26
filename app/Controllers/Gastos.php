<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\Categorias;
use App\Database\Migrations\Usuarios;
use App\Models\Despesas;

class Gastos extends BaseController
{
    // Atributos
    protected $_modelDespesas;
    public $descricao; 
    public $valor; // Sem formatação | Aplicar formatação
    public $data; // Sem formatação | Aplicar formatação
    public $categoria; // Int ou Str -> Retornar em Str

    public function __construct__($descricao, $valor, $data, $categoria)
    {
        $this->_modelDespesas = new Despesas();
        $this->descricao = $descricao;
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
    public function calcularGastos() // Em Desenvolvimento
    {   
        // Despesas vindas do DB
        $gastos = $this->_modelDespesas->findAll();
        echo '<pre>';
        print_r($gastos);
        // return $gastos;
    }

}
