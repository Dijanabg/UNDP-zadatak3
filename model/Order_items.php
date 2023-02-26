<?php


class Order_items{

    public $id;
    public Order $orderId;
    public Products $prodId;
    public $oiKolicina;

    public $cena;
    public function __construct($id, Products $prodId, Order $orderId){
        $this->id=$id;
        $this->prodId=$prodId;
        $this->orderId=$orderId;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getOrderId(): Order
    {
        return $this->orderId;
    }

    public function getProdId():Products
    {
        return $this->prodId;
    }

    public function getOiKolicina()
    {
        return $this->oiKolicina;
    }

    public function setOiKolicina($oiKolicina)
    {
        $this->oiKolicina = $oiKolicina;
    }
}