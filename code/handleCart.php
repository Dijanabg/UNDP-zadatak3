<?php

include "../db.php";
include_once "../functions/myfunctions.php";

if (isset($_SESSION['auth']) == true) {
    //ako direktno zeli da pristupi stranici
    if (isset($_POST['scope'])) {
        $scope = $_POST['scope'];
        switch ($scope) {
            case "add":
                $prodId = $_POST['prodId'];
                $prodQty = $_POST['prodQty'];

                $userId = $_SESSION['auth_user']['id'];

                $chk_existing_cart = "SELECT * FROM carts WHERE prodId='$prodId' AND userId='$userId'";
                $chk_existing_cart_run = mysqli_query($conn, $chk_existing_cart);

                if (mysqli_num_rows($chk_existing_cart_run) > 0) {
                    echo "existing";
                } else {
                    $insert_query = "INSERT INTO carts (userId, prodId, prodQty) VALUES ('$userId','$prodId','$prodQty')";
                    $insert_query_run = mysqli_query($conn, $insert_query);

                    if ($insert_query_run) {
                        redirect("Proizvod dodat","../cart.php");
                        echo 201;
                    } else {
                        redirect("joj","productView.php");
                        echo 500;
                    }
                }

                break;
            

            default:
                echo 500;
        }
    }
} else {
    echo 401;
}
