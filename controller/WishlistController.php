<?php
include "../config/db.php";
class WishlistController{
    public function getWishItems()
{
    global $conn;
    $userId = $_SESSION['auth_user']['id'];

    $query = "SELECT w.id as wid, p.* FROM wishlist w, products p WHERE w.prodId=p.id AND w.userId='$userId'";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
}