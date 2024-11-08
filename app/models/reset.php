<?php

class Reset
{
    private $id;
    private $code;
    private $email;

    public function __construct($id, $code, $email)
    {
        $this->id = $id;
        $this->code = $code;
        $this->email = $email;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($newId)
    {
        $this->id = $newId;
    }
    public function getCode()
    {
        return $this->code;
    }
    public function setCode($newCode)
    {
        $this->code = $newCode;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($newEmail)
    {
        $this->email = $newEmail;
    }
}