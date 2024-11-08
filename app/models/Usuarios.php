<?php

class Usuario
{
    protected $id;
    protected $nome;
    protected $sobrenome;
    protected $email;
    protected $aniversario;
    protected $telefone;
    protected $CPF;
    protected $RG;
    protected $genero;

    public function __construct($id, $nome, $sobrenome, $email, $aniversario, $telefone, $CPF, $RG, $genero)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->email = $email;
        $this->aniversario = $aniversario;
        $this->telefone = $telefone;
        $this->CPF = $CPF;
        $this->RG = $RG;
        $this->genero = $genero;
    }

    public function getID()
    {
        return $this->id;
    }
    public function setId($newId)
    {
        $this->id = $newId;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($newNome)
    {
        $this->nome = $newNome;
    }
    public function getSobrenome()
    {
        return $this->sobrenome;
    }
    public function setSobrenome($newSobrenome)
    {
        $this->nome = $newSobrenome;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($newEmail)
    {
        $this->email = $newEmail;
    }
    public function getAniversario()
    {
        return $this->aniversario;
    }
    public function setAniversario($newAniversario)
    {
        $this->aniversario = $newAniversario;
    }
    public function getTelefone()
    {
        return $this->telefone;
    }
    public function setTelefone($newTelefone)
    {
        $this->telefone = $newTelefone;
    }
    public function getCPF()
    {
        return $this->CPF;
    }
    public function setCPF($newCPF)
    {
        $this->CPF = $newCPF;
    }
    public function getRG()
    {
        return $this->RG;
    }
    public function setRG($newRG)
    {
        $this->RG = $newRG;
    }

    public function getgenero()
    {
        return $this->genero;
    }
    public function setgenero($newgenero)
    {
        $this->genero = $newgenero;
    }
}
