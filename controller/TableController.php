<?php

include "../config/db.php";


function getAll($table)
{
    global $conn;
    $query = "SELECT * FROM $table";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}

function getById($table, $id)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
 function getAllActive($table)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE status='0'";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}