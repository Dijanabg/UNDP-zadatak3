<?php

class Order{
    public $id;
    public $trackingNo;
    public User $userId;
    public $imePrezime;
    public $email;
    public $telefon;
    public $adresa;
    public $pincode;
    public $payMode;
    public $payId;
    public $status;
    public $komentar;
    public function __construct($id, $trackingNo, User $userId, $imePrezime, $email, $telefon, $adresa, $pincode, $payMode, $payId){
        $this->id=$id;
        $this->trackingNo=$trackingNo;
        $this->userId=$userId;
        $this->imePrezime=$imePrezime;
        $this->email=$email;
        $this->telefon=$telefon;
        $this->adresa=$adresa;
        $this->pincode=$pincode;
        $this->payMode=$payMode;
        $this->$payId=$$payId;
       
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTrackingNo()
    {
        return $this->trackingNo;
    }

    public function setTrackingNo($trackingNo)
    {
        $this->trackingNo = $trackingNo;
    }

    public function getUserId() : User
    {
        return $this->userId;
    }

    public function getimePrezime()
    {
        return $this->imePrezime;
    }

    public function setimePrezime($imePrezime)
    {
        $this->imePrezime = $imePrezime;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getTelefon()
    {
        return $this->telefon;
    }

    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;
    }

    public function getAdresa()
    {
        return $this->adresa;
    }

    public function setAdresa($adresa)
    {
        $this->adresa = $adresa;
    }

    public function getPincode()
    {
        return $this->pincode;
    }

    public function setPincode($pincode)
    {
        $this->pincode = $pincode;
    }

}