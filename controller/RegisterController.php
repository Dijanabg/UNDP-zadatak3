<?php
include "../config/db.php";
include_once "../code/auth.php";
class RegisterController{

    public function registration($ime, $email, $hashedpassword, mysqli $conn){
        $query = "INSERT INTO users (ime, email, password) VALUES ('$ime', '$email', '$hashedpassword')";
        $result = $conn->query($query);
        return $result;
    }

    public function isExistsUser($email, mysqli $conn){
        $query = "SELECT email FROM users WHERE email='$email' limit 1";
        $result = $conn->query($query);
        if($result->num_rows > 0){
            return true;
        }else{
            return false;
        }
    }
    public function confirmPassword($password, $cpass, mysqli $conn){
        if($password == $cpass){
            return true;
        }else{
            return false;
        }
    }
}