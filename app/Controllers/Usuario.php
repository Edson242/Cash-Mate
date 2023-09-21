<?php

class usuario extends Pessoas{
    private $email;
    private $senha;
    private $tipo;


    public function __construct($email, $senha, $tipo)
    {
        $this-> email = $email;
        $this-> senha = $senha;
        $this-> tipo = $tipo; 
    }

    public function getNome() {
        return $this->email;
    }

    public function setNome($email){
        $this-> email = $email;
    }

    public function getEndereco(){
        return $this->senha;
    }

    public function setEndereco($senha){
        $this-> senha = $senha;
    }

    public function getBairro(){
        return $this-> tipo;
    }

    public function setBairro($tipo){
        $this-> tipo = $tipo;
    }
}