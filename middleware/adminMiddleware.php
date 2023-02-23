<?php 
//https://www.youtube.com/watch?v=1gf7LBmq-to
//sluzi da ogranici pristup administratorskim stranicama ukoliko nije ulogovan admin



include "../functions/myfunctions.php";


if (isset($_SESSION['auth'])) {
    if ($_SESSION['role_as'] != 1) {
        redirect("Ulogujte se da bi nastavili", "../view/login.php");
        
        // $_SESSION['message'] = "You are not authorized to access this page";
        // header('Location: ../index.php');
    }
} else {
    redirect("Nemate ovlašćenja da vidite ovu stranicu", "../index.php");
    // $_SESSION['message'] = "Login to continue";
    // header('Location: ../login.php');
}