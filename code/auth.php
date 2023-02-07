<?php

include "../db.php";
include "../functions/myfunctions.php";
include_once "../controller/RegisterController.php";

if(isset($_POST['register_btn'])){
    $ime = validateInput($conn, $_POST['ime']);
    $email = validateInput($conn, $_POST['email']);
    $password = validateInput($conn, $_POST['password']);
    $cpass = validateInput($conn, $_POST['cpass']);

    $register = new RegisterController;

    $resultpass = $register->confirmPassword($password, $cpass, $conn);

    if($resultpass){

        $resUser = $register->isExistsUser($email, $conn);
        if($resUser){

            redirect("Email je vec registrovan", "register.php");
        } else {
            $regquery = $register->registration($ime, $email, $password, $conn);
            if ($regquery) {
                redirect("Uspesna registracija", "login.php");
            } else {
                redirect("Nešto je krenulo po zlu", "register.php");
            }
        }
    }else{
        redirect("Password se ne poklapa", "register.php");
    }
}