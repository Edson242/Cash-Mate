<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuarios extends Model
{
    protected $table            = 'usuarios';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['nome', 'email', 'password'];
}
