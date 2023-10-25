<?php

namespace App\Services;

use App\Entities\Usuarios;
use App\Models\UsuariosModel;
use CodeIgniter\Config\Factories;

class UserService{

    // Atributos
    protected $userModel;

    public function __construct()
    {
        $this->userModel = Factories::models(UsuariosModel::class); // Chama o model e passa ele para o atributo
    }

    public function authenticate($email, $senha){
        // Pega o nome do usuário e autentica no DB
        $user = $this->userModel->getUser($email);
        
        // Verifica se a senha passada pelo o usuário corresponde
        if($user && password_verify($senha, $user->password)){
            
            // Cria uma variável que vaie estar em uma session para futuras utilizações
            $variavelDeSessao = [
                'email' => $user->email,
                'isLoggedIn' => true
            ];
            
            // Coloca a variável dentro da session
            session()->set($variavelDeSessao);

            // Flashdata para exibir nas Views
            session()->setFlashdata('success', 'Usuário logado com Sucesso!');
            return true;
        } else{
            session()->setFlashdata('error', 'Erro ao tentar logar!');
            return false;
        }
    }

    public function createUser($nome, $email, $password){

        // Pega os dados da Entity
        $user = new Usuarios();
        
        // Passa os novos dados para a Entity
        $user->nome = $nome;
        $user->email = $email;
        $user->password = $password;
    
        // Salva no DB e faz uma verificação
        if($this->userModel->save($user)){

            // Flashdata para exibir nas Views 
            session()->setFlashdata('success', 'Usuário criado com sucesso!');
            return redirect()->to('/login');
        } else{
            return redirect()->back()->withInput()->with('errors', $this->userModel->errors()); 
        }

    }

}