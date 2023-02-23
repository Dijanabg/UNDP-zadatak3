<?php

include "../config/db.php";
include_once "../functions/myfunctions.php";

if (isset($_SESSION['auth']) == true) {
    //ako direktno zeli da pristupi stranici
    if (isset($_POST['scope2'])) {
        $scope2 = $_POST['scope2'];
        switch ($scope2) {
            case "add":
                $prodId = $_POST['prodId'];
                $userId = $_SESSION['auth_user']['id'];

                $chk_existing_wishlist = "SELECT * FROM wishlist WHERE prodId='$prodId' AND userId='$userId'";
                $chk_existing_wishlist_run = mysqli_query($conn, $chk_existing_wishlist);

                if (mysqli_num_rows($chk_existing_wishlist_run) > 0) {
                    echo "existing";
                } else {
                    $insert_query = "INSERT INTO wishlist (userId, prodId) VALUES ('$userId','$prodId')";
                    $insert_query_run = mysqli_query($conn, $insert_query);

                    if ($insert_query_run) {
                        echo 200;
                    } else {
                        echo 500;
                    }
                }
                break;
                case "delete":
                    $wishId = $_POST['id'];
                    $userId = $_SESSION['auth_user']['id'];
    //echo "$userId";
                    $chk_existing_wishlist = "SELECT * FROM wishlist WHERE id='$wishId' AND userId='$userId'";
                    $chk_existing_wishlist_run = mysqli_query($conn, $chk_existing_wishlist);
    
                    if (mysqli_num_rows($chk_existing_wishlist_run) == 1) {
                        $delete_query = "DELETE FROM wishlist WHERE id='$wishId'AND userId='$userId'";
                        $delete_query_run = mysqli_query($conn, $delete_query);
                        if ($delete_query_run) {
                            echo 200;
                        } else {
                            echo "Nešto je krenulo po zlu";
                        }
                    } else {
                        echo "Nešto je krenulo po zlu";
                    }
                    break;

        default:
            echo 500;
    }
}
} else {
echo 401;
}
