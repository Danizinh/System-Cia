<?php

class Endereco extends Usuario
{
    protected $id;
    private $UserId;
    private $cep;
    private $rua;
    private $bairro;
    private $cidade;
    private $uf;
    private $ibge;

    public function __construct($id, $UserId, $cep, $rua, $bairro, $cidade, $uf, $ibge)
    {
        $this->id = $id;
        $this->UserId = $UserId;
        $this->cep = $cep;
        $this->rua = $rua;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->ibge = $ibge;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($newid)
    {
        $this->id = $newid;
    }
    public function getUserID()
    {
        return $this->UserId;
    }
    public function setUserID($newUserId)
    {
        $this->UserId = $newUserId;
    }
    public function getcep()
    {
        return $this->cep;
    }
    public function setcep($newcep)
    {
        $this->cep = $newcep;;
    }
    public function getrua()
    {
        return $this->rua;
    }
    public function setrua($newrua)
    {
        $this->rua = $newrua;
    }
    public function getbairro()
    {
        return $this->bairro;
    }
    public function setbairro($newbairro)
    {
        $this->bairro = $newbairro;
    }
    public function getcidade()
    {
        return $this->cidade;
    }
    public function setcidade($newcidade)
    {
        $this->cidade = $newcidade;
    }
    public function getuf()
    {
        return $this->uf;
    }
    public function setuf($newuf)
    {
        $this->uf = $newuf;
    }
    public function getibge()
    {
        return $this->ibge;
    }
    public function setibge($newibge)
    {
        $this->ibge = $newibge;
    }
}
