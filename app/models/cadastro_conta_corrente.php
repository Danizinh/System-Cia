<?php

class cadastro_conta_corrente
{
    private $id;
    private $nome_do_banco;
    private $prefixo;
    private $numero_da_agencia;
    private $numero_da_conta;
    private $saldo;
    private $limite;
    private $data_cadastro;
    private $data_atualizacao;
    private $status;

    public function __construct($id, $nome_do_banco, $prefixo, $numero_da_agencia, $numero_da_conta, $saldo, $limite, $data_cadastro, $data_atualizacao, $status)
    {
        $this->id = $id;
        $this->nome_do_banco = $nome_do_banco;
        $this->prefixo = $prefixo;
        $this->numero_da_agencia = $numero_da_agencia;
        $this->numero_da_conta = $numero_da_conta;
        $this->saldo = $saldo;
        $this->limite = $limite;
        $this->data_cadastro = $data_cadastro;
        $this->data_atualizacao = $data_atualizacao;
        $this->status = $status;
    }
    public function getID()
    {
        return $this->id;
    }
    public function setID($newId)
    {
        $this->id = $newId;
    }
    public function getNomeDoBanco()
    {
        return $this->nome_do_banco;
    }
    public function setNomeDoBanco($newNomeDoBanco)
    {
        $this->nome_do_banco = $newNomeDoBanco;
    }
    public function getprefixo()
    {
        return $this->prefixo;
    }
    public function setprefixo($newPrefixo)
    {
        $this->prefixo = $newPrefixo;
    }
    public function getNumeroDaAgencia()
    {
        return $this->numero_da_agencia;
    }
    public function setNumeroDaAgencia($newNumeroDaAgencia)
    {
        $this->numero_da_agencia = $newNumeroDaAgencia;
    }
    public function getNumeroDaConta()
    {
        return $this->numero_da_conta;
    }
    public function setNumeroDaConta($newNumeroDaConta)
    {
        $this->numero_da_conta = $newNumeroDaConta;
    }
    public function getSaldo()
    {
        return $this->saldo;
    }
    public function setSaldo($newSaldo)
    {
        $this->saldo = $newSaldo;
    }
    public function getLimite()
    {
        return $this->limite;
    }
    public function setLimite($newLimite)
    {
        $this->limite = $newLimite;
    }
    public function getdata_cadastro()
    {
        return $this->data_cadastro;
    }
    public function setdata_cadastro($newData_Cadastro)
    {
        $this->data_cadastro = $newData_Cadastro;
    }
    public function getdata_atualizacao()
    {
        return $this->data_atualizacao;
    }
    public function setdata_atualizacao($newdata_atualizacao)
    {
        $this->data_atualizacao = $newdata_atualizacao;
    }
}