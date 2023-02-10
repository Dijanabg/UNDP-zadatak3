<?php
session_start();


function redirect($message, $page){
    include_once "code/message.php";
    $_SESSION['message'] = "$message";
    header("Location: $page");
    exit(0);
}
//da bi izbegla specijalne karaktere u stringu za sql
function validateInput($conn, $input){
    return mysqli_real_escape_string($conn, $input);
}