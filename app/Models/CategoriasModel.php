<?php

namespace App\Models;

use App\Entities\Categorias;
use CodeIgniter\Model;


class CategoriasModel extends Model
{
    protected $table            = 'categorias';
    protected $allowedFields    = ['nome', 'usuarios_id'];
    protected $returnType       = Categorias::class;

}
