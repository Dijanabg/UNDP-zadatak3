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
    $query = "SELECT * FROM orders ";
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
function adminCheckTrackingNoValid($trackingNo)
{
    global $conn;
    $query = "SELECT * FROM orders WHERE trackingNo='$trackingNo'";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
function getOrderDetails($trackingNo){
    global $conn;
    $order_query = "SELECT * FROM orders o, order_items oi, products p WHERE  oi.orderId=o.id AND p.id=oi.prodId AND o.trackingNo='$trackingNo' ";
    $order_query_run = mysqli_query($conn, $order_query);
    return $order_query_run;
}
}