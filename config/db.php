<?php
    //povezivanje sa bazom
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "zadatak3";

    $conn = new mysqli($host, $user, $pass, $database);
    //print_r($conn);
    //echo $conn->host_info . "\n";

    //provera da li je to uspesno
    if($conn->connect_errno) {
        echo ("Neuspesna konekcija: $conn->connect_errno, poruka: $conn->connect_error");
        exit();
    }




?>