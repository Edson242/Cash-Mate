<?php

namespace App\Models;

use App\Entities\Usuarios;
use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table            = 'usuarios';
    protected $useSoftDeletes   = true;
    protected $returnType       = Usuarios::class;
    protected $allowedFields    = ['nome', 'email', 'password'];

    public function getUser($email, $senha)
    {
        return $this->where('email', $email)->first();
    }}
