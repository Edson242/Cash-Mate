<?php

namespace App\Models;

use CodeIgniter\Model;

class Despesas extends Model
{
    protected $table            = 'despesas';
    protected $allowedFields    = ['user_id', 'categoria_id', 'valor', 'data', 'descricao'];
    protected $validationRules = [
        'valor' => 'required',
        'data' => 'required',
        'descricao' => 'required|min_length[5]|max_length[100]'
    ];
}
