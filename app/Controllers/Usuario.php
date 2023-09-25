<?php

class Usuario extends Pessoas
{
    private $email;
    private $senha;
    private $tipo;


    public function __construct($email, $senha, $tipo)
    {
        $this->email = $email;
        $this->senha = $senha;
        $this->tipo = $tipo;
    }

    public function getNome()
    {
        return $this->email;
    }

    public function setNome($email)
    {
        $this->email = $email;
    }

    public function getEndereco()
    {
        return $this->senha;
    }

    public function setEndereco($senha)
    {
        $this->senha = $senha;
    }

    public function getBairro()
    {
        return $this->tipo;
    }

    public function setBairro($tipo)
    {
        $this->tipo = $tipo;
    }


    //Em andamento 
    public function arterarSenha($senhaNova)
    {

        return $this->senha === $senhaNova;
    }

    //Em andamento
    public function verificarSenha($senha)
    {

        return $this->senha === $senha;
    }


    //Em andamento
    public function arterarEmail($emailNova)
    {

        return $this->email === $emailNova;
    }

    //Em andamento
    public function verificarEmail($email)
    {

        return $this->email === $email;
    }
}
