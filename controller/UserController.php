<?php
//session_start();
// if (!isset($_SESSION['message'])) {
//     session_start();
// }

include "../config/db.php";
class UserController{
public function getAllActive($table)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE status='0'";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
function getAllTrending()
{
    global $conn;
    $query = "SELECT * FROM products WHERE trending='1'";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
function getStatusActive($table, $slug)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE status='0' LIMIT 1";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
function getProByCategory($category_id)
{
    global $conn;
    $query = "SELECT * FROM products  WHERE categoryId='$category_id' AND status='0'";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
function getIDActive($table, $id)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE id='$id' AND status='0'";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}

}