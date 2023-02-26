<?php

class Category{
    public $id;
    public $ime;
    public $opis;
    public $image;
    public function __construct($id, $ime, $opis, $image){
        $this->id=$id;
        $this->ime=$ime;
        $this->opis=$opis;
        $this->image=$image;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the value of ime
     */ 
    public function getIme()
    {
        return $this->ime;
    }

    public function setIme($ime)
    {
        $this->ime = $ime;
    }

    /**
     * Get the value of opis
     */ 
    public function getOpis()
    {
        return $this->opis;
    }

    public function setOpis($opis)
    {
        $this->opis = $opis;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }
}