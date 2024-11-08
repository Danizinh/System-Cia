<?php

class registro_de_despesas
{
    private $id;
    private $data_da_despesa;
    private $valor_da_despesa;
    private $nome_da_despesa;

    public function __construct($id, $data_da_despesa, $valor_da_despesa, $nome_da_despesa)
    {
        $this->id = $id;
        $this->data_da_despesa = $data_da_despesa;
        $this->valor_da_despesa = $valor_da_despesa;
        $this->nome_da_despesa = $nome_da_despesa;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($newId)
    {
        $this->id = $newId;
    }
    public function getdata_da_despesa()
    {
        return $this->data_da_despesa;
    }
    public function setdata_da_despesa($newdata_da_despesa)
    {
        $this->data_da_despesa = $newdata_da_despesa;
    }
    public function getvalor_da_despesa()
    {
        return $this->valor_da_despesa;
    }
    public function setvalor_da_despesa($newvalor_da_despesa)
    {
        $this->valor_da_despesa = $newvalor_da_despesa;
    }
    public function getnome_da_despesa()
    {
        return $this->nome_da_despesa;
    }
    public function setnome_da_despesa($newnome_da_despesa)
    {
        $this->id = $newnome_da_despesa;
    }
}