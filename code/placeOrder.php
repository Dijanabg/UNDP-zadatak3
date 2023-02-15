<?php 

include "db.php";
include "functions/myfunctions.php";


if (isset($_SESSION['auth']) == true) {
    if (isset($_POST['placeOrderBtn'])) {
        $imePrezime = validateInput($conn, $_POST['imePrezime']);
        $email = validateInput($conn, $_POST['email']);
        $telefon = validateInput($conn, $_POST['telefon']);
        $pincode = validateInput($conn, $_POST['pincode']);
        $adresa = validateInput($conn, $_POST['adresa']);
        $payMode = validateInput($conn, $_POST['payMode']);
        $payId = validateInput($conn, $_POST['payId']);
        if ($ImePrezime == "" || $email == "" || $telfon == "" || $pincode == "" || $adresa == "") {
            // $_SESSION['message'] = "All fields are mandatory";
            // header('Location: checkout.php');
            redirect("Sva polja su obavezna", "checkout.php");
            exit(0);
        }
        $userId = $_SESSION['auth_user']['userId'];
        $query = "SELECT c.id as cid, c.prodId, c.prodQty, p.id as pid, p.name, p.image, p.prodajnaCena FROM carts c, products p WHERE c.prodId=p.id AND c.userId='$userId'";
        $query_run = mysqli_query($conn, $query);

        $totalPrice = 0;
        foreach ($query_run as $citem) {
            $totalPrice += $citem['prodajnaCena'] * $citem['prodQty'];
        }
        echo $totalPrice;
        $trackingNo = "dijanacode" . rand(1111, 9999) . substr($phone, 2);
    
    }}