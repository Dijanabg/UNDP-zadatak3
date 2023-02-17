<?php


if (!isset($_SESSION['auth'])) {

    redirect("Ulogujte se da bi nastavili", "login.php" );
}