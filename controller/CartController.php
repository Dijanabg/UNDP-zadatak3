<?php
include "../config/db.php";
class CartController{
    public function getCartItems()
{
    global $conn;
    $userId = $_SESSION['auth_user']['id'];

    $query = "SELECT c.id as cid, c.prodId, c.prodQty, p.id as pid, p.ime, p.image, p.prodajnaCena FROM carts c, products p WHERE c.prodId=p.id AND c.userId='$userId'";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
}