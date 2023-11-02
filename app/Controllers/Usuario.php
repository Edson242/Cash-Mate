<?php

namespace App\Controllers;

use App\Services\UserService;
use CodeIgniter\Config\Factories;

class Usuario extends BaseController
{

    // Atributos
    protected $userService;

    public function __construct()
    {
        $this->userService = Factories::class(UserService::class); // Puxa o UserService
    }

    public function index()
    {
        // Chama a View de login
        return view('login');
    }

    public function register()
    {   
        // Chama a View de registro
        return view('register');
    }

    public function authenticate(){
        // Variáveis com os dados do usuário
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');
        
        // Manda esses dados para o Service realizar a autenticação no DB
        return ($this->userService->authenticate($email, $senha)) ? redirect()->to('/dashboard') : redirect()->back();
        // return ($this->userService->authenticate($email, $senha));
    }

    public function createUser(){
        // Coleta os dados do usuário para criação dele
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $nome = $this->request->getPost('nome');

        // Envia esses dados para o Service criar o usuário
        $this->userService->createUser($nome ,$email, $password);
    }

    public function logout(){
        // Faz o logout destruindo a session e manda para o login novamente
        session()->destroy();
        return redirect()->to('/login');
    }
}
