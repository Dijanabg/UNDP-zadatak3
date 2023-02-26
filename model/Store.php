<?php

class Store{
    public $id;
    public $grad;
    public $adresa;
    public $telefon;
    public $radnoVreme;
    public function __construct($id, $grad, $adresa, $telefon, $radnoVreme){
        $this->id=$id;
        $this->grad=$grad;
        $this->adresa=$adresa;
        $this->telefon=$telefon;
        $this->radnoVreme=$radnoVreme;
    }
   
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getGrad()
    {
        return $this->grad;
    }

    public function setGrad($grad)
    {
        $this->grad = $grad;
    }

    public function getAdresa()
    {
        return $this->adresa;
    }

    public function setAdresa($adresa)
    {
        $this->adresa = $adresa;
    }

    public function getTelefon()
    {
        return $this->telefon;
    }

    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;
    }
    public function getRadnoVreme()
    {
        return $this->radnoVreme;
    }

    public function setRadnoVreme($radnoVreme)
    {
        $this->radnoVreme = $radnoVreme;

        return $this;
    }
}