<?php

namespace App\Models;

use App\Entities\Gastos;
use CodeIgniter\Model;

class DespesasModel extends Model
{
    protected $table            = 'despesas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $protectFields    = true;
    protected $returnType       = Gastos::class;
    protected $allowedFields    = ['user_id', 'categoria_id', 'valor', 'data', 'descricao'];
    protected $validationRules = [
        'valor' => 'required',
        'data' => 'required',
        'descricao' => 'required|min_length[5]|max_length[100]'
    ];
}
