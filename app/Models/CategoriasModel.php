<?php

namespace App\Models;

use App\Entities\Categorias;
use CodeIgniter\Model;


class CategoriasModel extends Model
{
    protected $table            = 'categorias';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nome', 'usuarios_id'];
    protected $returnType       = Categorias::class;
    protected $validationRules = [
        'nome' => 'required|min_length[5]',
    ];

}
