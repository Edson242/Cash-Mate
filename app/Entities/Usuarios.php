<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Usuarios extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $attributes = [
        'nome' => null,
        'email' => null,
        'password' => null
    ];
    protected $casts   = [];

    public function setPassword(string $password){
        $this->attributes['password'] = password_hash($password, PASSWORD_DEFAULT);
        return $this;
    }
}
