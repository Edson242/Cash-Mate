<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use App\Services\UserService;
use CodeIgniter\Config\Factories;

class Usuario extends BaseController
{
    protected $_model;
    protected $userService;

    public function __construct()
    {
        $_model = new UsuariosModel();
        $this->userService = Factories::class(UserService::class);
    }

    public function index()
    {
        echo view('login');
    }

    public function register()
    {
        echo view('register');
    }

    public function authenticate(){
       
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');
        
        return ($this->userService->authenticate($email, $senha)) ? redirect()->to('/dashboard') : redirect()->back();
    }

    public function createUser(){

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $nome = $this->request->getPost('nome');

        $this->userService->createUser($nome ,$email, $password);
    }

    public function logout(){
        session()->destroy();
        return redirect()->to('/');
    }
}

    // public function login()
    // {

    //     $email = $this->request->getPost('email');
    //     $senha = $this->request->getPost('senha');

    //     $usuario = $this->_model->buscarPorEmailSenha($email, $senha);

    //     if ($usuario) {
    //         session()->set('usuario', $usuario);
    //         return redirect()->to('dashboard');
    //     } else {
    //         session()->setFlashdata('error', 'E-mail ou senha inválidos');
    //         return redirect()->to('login');
    //     }
    // }

    // public function logout()
    // {
    //     session()->remove('usuario');
    //     return redirect()->to('login');
    // }
//}
