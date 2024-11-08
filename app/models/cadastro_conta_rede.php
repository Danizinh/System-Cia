<?php

class cadastro_conta_corrente extends Usuario
{
    private $id;
    private $userId;
    private $nome_da_conta;

    public function __construct($id, $userId, $nome_da_conta)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->nome_da_conta = $nome_da_conta;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($newId)
    {
        $this->id = $newId;
    }
    public function getUserId()
    {
        return $this->userId;
    }
    public function setUserId($newUserId)
    {
        $this->userId = $newUserId;
    }
    public function getNomeDaConta()
    {
        return $this->nome_da_conta;
    }
    public function setNomeDaConta($newNomeDaConta)
    {
        $this->nome_da_conta = $newNomeDaConta;
    }
}
