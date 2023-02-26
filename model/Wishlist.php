<?php

class Wishlist{
    public $id;
    public Products $prodId;
    public User $userId;
    public function __construct($id, Products $prodId, User $userId){
        $this->id=$id;
        $this->prodId=$prodId;
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
    public function getProdId(): Products {
		return $this->prodId;
	}

	public function getUserId(): User {
		return $this->userId;
	}
	
}