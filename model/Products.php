<?php

class Products{
    public $id;
    public $ime;
    public $kratkiOpis;
    public $opis;
    public $orginalnaCena;
    public $prodajnaCena;
    public $image;
    public $status;
    public $trending;
    public $kolicina;
    public Category $categoryId;
    public function __construct($id, $ime, $kratkiOpis, $opis, $orginalnaCena, $prodajnaCena, $image, $status, $trending, $kolicina, Category $categoryId){
        $this->id=$id;
        $this->ime=$ime;
        $this->opis=$opis;
        $this->orginalnaCena=$orginalnaCena;
        $this->prodajnaCena=$prodajnaCena;
        $this->image=$image;
        $this->status=$status;
        $this->trending=$trending;
        $this->kolicina=$kolicina;
        $this->categoryId=$categoryId;
       
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

    public function getKratkiOpis()
    {
        return $this->kratkiOpis;
    }

    public function setKratkiOpis($kratkiOpis)
    {
        $this->kratkiOpis = $kratkiOpis;
    }

    public function getOpis()
    {
        return $this->opis;
    }

    public function setOpis($opis)
    {
        $this->opis = $opis;
    }

    public function getOrginalnaCena()
    {
        return $this->orginalnaCena;
    }

    public function setOrginalnaCena($orginalnaCena)
    {
        $this->orginalnaCena = $orginalnaCena;
    }

    public function getProdajnaCena()
    {
        return $this->prodajnaCena;
    }

    public function setProdajnaCena($prodajnaCena)
    {
        $this->prodajnaCena = $prodajnaCena;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getTrending()
    {
        return $this->trending;
    }

    public function setTrending($trending)
    {
        $this->trending = $trending;
    }

    public function getCategoryId(): Category
    {
        return $this->categoryId;
    }
}