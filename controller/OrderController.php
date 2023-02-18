<?php
include "../config/db.php";
class OrderController{
    function getOrders()
{
    global $conn;
    $userId = $_SESSION['auth_user']['id'];

    $query = "SELECT * FROM orders WHERE userId='$userId'";
    // ORDER BY id DESC";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
function getAllOrders()
{
    global $conn;
    $query = "SELECT * FROM orders WHERE status='0' ";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}

function checkTrackingNoValid($trackingNo)
{
    global $conn;
    $userId = $_SESSION['auth_user']['id'];

    $query = "SELECT * FROM orders WHERE trackingNo='$trackingNo' AND userId='$userId'";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
}