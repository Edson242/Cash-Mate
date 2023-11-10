<?php

namespace App\Controllers;

use App\Services\UserService;
use App\Models\UsuariosModel;
use CodeIgniter\Config\Factories;

class UsuarioController extends BaseController
{

    // Atributos
    protected $userService;
    protected $userModel;

    public function __construct()
    {
        $this->userService = Factories::class(UserService::class); // Puxa o UserService
        $this->userModel = Factories::models(UsuariosModel::class); // Puxa o Model
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

    public function viewUser()
    {   
        // Chama a View de Usuário
        return view('usuario');
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

    public function alterarDados(){
        // Obter os dados do formulário
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha1');
        $confirmSenha = $this->request->getPost('senha2');
    
        // Verifica se a senha e a confirmação da senha coincidem
        if($senha === $confirmSenha) {
            // Cria o novo Hash
            $newHash = password_hash($senha, PASSWORD_DEFAULT);
        
            // Obter os dados do usuário da sessão
            $dado = session()->get('variavelDeSessao');
            $nome = $dado['nome'];
        
            // Dados a serem atualizados
            $dados = [
                'email' => $email,
                'password' => $newHash,
                'nome' => $nome
            ];
        
            // Verificar se a atualização foi bem-sucedida
            if ($this->userModel->update($dado['id'], $dados)) {
                session()->setFlashdata('successUpdateUser', 'Dados de usuário alterados com sucesso!');
                return redirect()->to('/usuario');
            } else {
                session()->setFlashdata('errorUpdateUser', 'Erro ao alterar os dados de usuário!');
                return redirect()->to('/usuario');
            }    
        } else {
            session()->setFlashdata('errorSenhaUser', 'Senha não coincidem!');
                return redirect()->to('/usuario');
        }
    }
}
