<?php
session_start();
include_once "../db.php";

function redirect($message, $page){
    
    $_SESSION['message'] = "$message";
    header("Location: $page");
    exit(0);
}
function validateInput($conn, $input){
    return mysqli_real_escape_string($conn, $input);
}