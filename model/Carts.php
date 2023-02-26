<?php


class Carts{
    public $id;
    public User $userId;
    public Products $prodId;
    public Products $prodQty;
    public function __construct($id, Products $prodId, Products $prodQty, User $userId){
        $this->id=$id;
        $this->prodId=$prodId;
        $this->prodQty=$prodQty;
        $this->userId=$userId;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUserId():User
    {
        return $this->userId;
    }

    public function getProdId():Products
    {
        return $this->prodId;
    }

    public function getProdQty():Products
    {
        return $this->prodQty;
    }
}