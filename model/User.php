<?php

class User{
    public $id;
    public $ime;
    public $email;
    public $password;
    public function __construct($id, $ime, $email, $password){
        $this->id=$id;
        $this->ime=$ime;
        $this->email=$email;
        $this->password=$password;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIme()
    {
        return $this->ime;
    }

    public function setIme($ime)
    {
        $this->ime = $ime;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}