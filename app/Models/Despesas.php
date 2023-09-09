<?php

namespace App\Models;

use CodeIgniter\Model;

class Despesas extends Model
{
    protected $table            = 'despesas';
    protected $allowedFields    = ['valor', 'data', 'descricao'];
}
