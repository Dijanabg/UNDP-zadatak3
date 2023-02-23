<?php

include "../config/db.php";

include_once "../controller/RegisterController.php";
include_once "../controller/LoginController.php";

$checkLog = new LoginController;
if (isset($_POST['login_btn'])) {
    $email = validateInput($conn, $_POST['email']);
    $password = validateInput($conn, $_POST['password']);

    
    $checkLog->login($email, $password, $conn);
    if(isset($checkLog)){
       if($_SESSION['auth_role'] && $_SESSION['auth_role']===1){
        redirect("Ulogovali ste se uspesno", "admin.php");
       }else{
        redirect("Ulogovali ste se uspesno", "index.php");
       }
    }else{
        redirect("Uneli ste pogresne podatke ili vec imate nalog", "login.php");
        ;
    }
}
if(isset($_POST['register_btn'])){
    $ime = validateInput($conn, $_POST['ime']);
    $email = validateInput($conn, $_POST['email']);
    $password = validateInput($conn, $_POST['password']);
    $cpass = validateInput($conn, $_POST['cpass']);
    $encryption_key = 'di'; // Replace with your own secret encryption key

    $options = [
        'salt' => $encryption_key, // Use the encryption key as the salt
        'cost' => 12, // Choose a suitable cost factor
    ];
    
    $hashedpassword = password_hash($password, PASSWORD_BCRYPT, $options);
    $register = new RegisterController;

    $resultpass = $register->confirmPassword($password, $cpass, $conn);

    if($resultpass){

        $resUser = $register->isExistsUser($email, $conn);
        if($resUser){

            redirect("Email je vec registrovan", "register.php");
        } else {
            $regquery = $register->registration($ime, $email, $hashedpassword, $conn);
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