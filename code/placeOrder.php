<?php 

include "../db.php";
include "../functions/myfunctions.php";


if (isset($_SESSION['auth']) == true) {
    if (isset($_POST['placeOrderBtn'])) {
        
        $imePrezime = validateInput($conn, $_POST['imePrezime']);
        $email = validateInput($conn, $_POST['email']);
        $telefon = validateInput($conn, $_POST['telefon']);
        $pincode = validateInput($conn, $_POST['pincode']);
        $adresa = validateInput($conn, $_POST['adresa']);
        $payMode = validateInput($conn, $_POST['payMode']);
        $payId = validateInput($conn, $_POST['payId']);
        if ($imePrezime == "" || $email == "" || $telefon == "" || $pincode == "" || $adresa == "") {
            redirect("Sva polja su obavezna", "checkout.php");
            exit(0);
        }
        $userId = $_SESSION['auth_user']['id'];
        echo $userId;
        $query = "SELECT c.id as cid, c.prodId, c.prodQty, p.id as pid, p.ime, p.image, p.prodajnaCena FROM carts c, products p WHERE c.prodId=p.id AND c.userId='$userId'";
        $query_run = mysqli_query($conn, $query);

        $totalPrice = 0;
        foreach ($query_run as $citem) {
            
            $totalPrice += $citem['prodajnaCena'] * $citem['prodQty'];
        }
        echo $totalPrice;
        $trackingNo = "dijanacode" . rand(1111, 9999) . substr($telefon, 2);
        echo $trackingNo;
        //ubacivanje u tabelu orders
        $insert_query = "INSERT INTO orders (trackingNo, userId, imePrezime, email, telefon, adresa, pincode, totalPrice, payMode, payId) VALUE ('$trackingNo', '$userId', '$imePrezime', '$email', '$telefon', '$adresa', '$pincode', '$totalPrice', '$payMode', '$payId')";
        $insert_query_run = mysqli_query($conn, $insert_query);
        if ($insert_query_run>0) {
            $orderId = mysqli_insert_id($conn);
            foreach ($query_run as $citem) {
                $prodId = $citem['prodId'];
                $kolicina = $citem['prodQty'];
                $cena = $citem['prodajnaCena'];

                $insert_items_query = "INSERT INTO order_items (id, prodId, kolicina, cena) VALUES ('$orderId', '$prodId', '$kolicina', '$cena')";
                $insert_items_query_run = mysqli_query($conn, $insert_items_query);

                $product_query = "SELECT * FROM products WHERE id='$prodId'";
                $product_query_run = mysqli_query($conn, $product_query);

                $productData = mysqli_fetch_array($product_query_run);
                $current_qty = $productData['kolicina'];

                $newQty = $currentQty - $kolicina;

                $updateQty_query = "UPDATE products SET kolicina='$newQty' WHERE id='$prodId'";
                $updateQty_query_run = mysqli_query($conn, $updateQty_query);
            }
            //ovde treba da dodam delete iz carts tabele
            $deleteCartQuery = "DELETE FROM carts WHERE userId='$userId'";
            $deleteCartQuery_run = mysqli_query($conn, $deleteCartQuery);


            redirect("Porudzbina je prihvacena", "../myOrders.php");
            die();
        }
    }
} else {
    header('Location: ../index.php');
}