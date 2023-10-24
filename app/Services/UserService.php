<?php

namespace App\Services;

use App\Controllers\Usuario;
use App\Entities\User;
use App\Entities\Usuarios;
use App\Models\UsuariosModel;
use CodeIgniter\Config\Factories;

class UserService{

    protected $userModel;

    public function __construct()
    {
        $this->userModel = Factories::models(UsuariosModel::class);
    }

    public function authenticate($email, $senha){

        $user = $this->userModel->getUser($email);
       
        if($user && password_verify($senha, $user->password)){
           
            $variavalDeSessao = [
                'email' => $user->email,
                'isLoggedIn' => true
            ];
            
            session()->set($variavalDeSessao);
            session()->setFlashdata('success', 'Usuário logado com Sucesso!');
            return true;
        }else{
            session()->setFlashdata('error', 'Erro ao tentar logar!');
            return false;
        }
    }

    public function createUser($nome, $email, $password){

        $user = new Usuarios();
       
        $user->nome = $nome;
        $user->email = $email;
        $user->password = $password;
    
        if($this->userModel->save($user)){
            session()->setFlashdata('success', 'Usuário criado com sucesso!');
            return redirect()->to('/');
        }else{
            return redirect()->back()->withInput()->with('errors', $this->userModel->errors()); 
        }

    }

}