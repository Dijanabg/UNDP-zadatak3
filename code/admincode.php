<?php
//session_start();
include "../config/db.php";
include "../functions/myfunctions.php";


if (isset($_POST['add_category_btn'])) {
    $ime = $_POST['ime'];
    $opis = $_POST['opis'];
    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $imgname = time() . '.' . $image_ext;

    $cate_query = "INSERT INTO categories (ime, opis, image)
    VALUES ('$ime','$opis','$imgname')";

    $cate_query_run = mysqli_query($conn, $cate_query);

    if ($cate_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $imgname);
        redirect("Kategorija je dodata uspešno", "../admin/categoryadd.php");
    } else {
        redirect("Nešto je pošlo po zlu", "../admin/categoryadd.php");
    }
}elseif (isset($_POST['delete_category_btn'])) {
    $category_id = mysqli_real_escape_string($conn, $_POST['id']);

    $category_query = "SELECT * FROM categories WHERE id='$category_id'";
    $category_query_run = mysqli_query($conn, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $image = $category_data['image'];

    $delete_query = "DELETE FROM categories WHERE id='$category_id'";
    $delete_query_run = mysqli_query($conn, $delete_query);

    if ($delete_query_run) {
        if (file_exists("../uploads/" . $image)) {
            unlink("../uploads/" . $image);
        }
        redirect("Kategorija je izbrisana uspešno", "../admin/categoryadmin.php");
    } else {
        redirect("Nešto je pošlo po zlu", "../admin/categoryadmin.php");
    }
} elseif (isset($_POST['update_category_btn'])) {
    $category_id = $_POST['id'];
    $ime = $_POST['ime'];
    $opis = $_POST['opis'];
   
    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if ($new_image != "") {
        //$update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $image_ext;
    } else {
        $update_filename = $old_image;
    }
    $path = "../uploads";

    $update_query = "UPDATE categories SET ime='$ime', opis='$opis', image='$update_filename' WHERE id='$category_id'";
    $update_query_run = mysqli_query($conn, $update_query);
    

    if ($update_query_run) {
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
            if (file_exists("../uploads/" . $old_image)) {
                unlink("../uploads/" . $old_image);
            }
        }
        redirect("Kategorija je ažurirana uspešno", "../admin/categoryedit.php?id=$category_id");
    } else {
        redirect("Nešto je pošlo po zlu", "../admin/categoryedit.php?id=$category_id" );
    }
}elseif (isset($_POST['add_product_btn'])) {

    $categoryId = $_POST['categoryId'];
echo ($categoryId);
    $ime = $_POST['ime'];
    $kratkiOpis = $_POST['kratkiOpis'];
    $opis = $_POST['opis'];
    $orginalnaCena = $_POST['originalnaCena'];
    $prodajnaCena = $_POST['prodajnaCena'];
    $kolicina = $_POST['kolicina'];
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';

    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;

    if ($ime != "" && $kratkiOpis != "" && $opis != "") {

        $product_query = "INSERT INTO 
        products (categoryId, ime, kratkiOpis, opis, orginalnaCena, prodajnaCena, kolicina, status, trending, image ) 
        VALUES ('$categoryId','$ime','$kratkiOpis', '$opis', '$orginalnaCena', '$prodajnaCena', '$kolicina', '$status', '$trending', '$filename' )";
        $product_query_run = mysqli_query($conn, $product_query);

        if ($product_query_run) {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);

            redirect("Proizvod je uspešno dodat","../admin/productsadd.php");
        } else {
            redirect("Nešto je krenulo po zlu", "../admin/productsadd.php");
        }
    } else {
        redirect("Sva polja su obavezna", "../admin/productsadd.php");
    }
}elseif (isset($_POST['delete_product_btn'])) {
    $product_id = mysqli_real_escape_string($conn, $_POST['id']);

    $product_query = "SELECT * FROM products WHERE id='$product_id'";
    $product_query_run = mysqli_query($conn, $product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image = $product_data['image'];

    $delete_query = "DELETE FROM products WHERE id='$product_id'";
    $delete_query_run = mysqli_query($conn, $delete_query);

    if ($delete_query_run) {
        if (file_exists("../uploads/" . $image)) {
            unlink("../uploads/" . $image);
        }
        redirect("Proizvod je uspešno obrisan", "../admin/productsadmin.php");
        //echo 200;
        //header('Location: .');
    } else {
        redirect("Nešto je pošlo po zlu", "../admin/productsadmin.php");
        //echo 500;
    }
} elseif (isset($_POST['update_product_btn'])) {
    $product_id = $_POST['id'];
    $category_id = $_POST['categoryId']; 

    $ime = $_POST['ime'];
    $kratkiOpis = $_POST['kratkiOpis'];
    $opis = $_POST['opis'];
    $orginalnaCena = $_POST['orginalnaCena'];
    $prodajnaCena = $_POST['prodajnaCena'];
    $kolicina = $_POST['kolicina']; 
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if ($new_image != "") {
        //$update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $image_ext;
    } else {
        $update_filename = $old_image;
    }
    $path = "../uploads";
    $update_product_query = "UPDATE products SET categoryId='$category_id',ime='$ime', kratkiOpis='$kratkiOpis', opis='$opis', orginalnaCena='$orginalnaCena', prodajnaCena='$prodajnaCena', kolicina='$kolicina', status='$status', trending='$trending', image='$update_filename' WHERE id='$product_id'";
    $update_product_query_run = mysqli_query($conn, $update_product_query);

    if ($update_product_query_run) {
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
            if (file_exists("../uploads/" . $old_image)) {
                unlink("../uploads/" . $old_image);
            }
        }
        redirect( "Proizvod je ažuriran","../admin/productsedit.php?id=$product_id");
    } else {
        redirect("Nešto nije u redu","../admin/productsedit.php?id=$product_id");
    }
} elseif (isset($_POST['update_order_btn'])) {
    
        $trackNo = $_POST['trackingNo'];
        
        $orderStatus = $_POST['status'];
    
        $updateOrder_query = "UPDATE orders SET status ='$orderStatus' WHERE trackingNo='$trackNo' ";
        $updateOrder_query_run = mysqli_query($conn, $updateOrder_query);
       redirect("Order status Updated successfuly", "../admin/orders.php");
}elseif(isset($_POST['add_store_btn'])){
   
        $grad = $_POST['grad'];
        $adresa = $_POST['adresa'];
        $telefon = $_POST['telefon'];
        $radnoVreme = $_POST['radnoVreme'];
    
       
    
        $store_query = "INSERT INTO store (grad, adresa, telefon, radnoVreme)
        VALUES ('$grad','$adresa','$telefon', '$radnoVreme')";
    
        $store_query_run = mysqli_query($conn, $store_query);
    
        if ($store_query_run) {
            redirect("Prodavnica je dodata uspešno", "../admin/storeadd.php");
        } else {
            redirect("Nešto je pošlo po zlu", "../admin/storeadd.php");
        }
}elseif (isset($_POST['delete_store_btn'])) {
        $store_id = mysqli_real_escape_string($conn, $_POST['id']);
    
        $store_query = "SELECT * FROM store WHERE id='$store_id'";
        $store_query_run = mysqli_query($conn, $store_query);
        $store_data = mysqli_fetch_array($store_query_run);
        $image = $store_data['image'];
    
        $delete_query = "DELETE FROM store WHERE id='$store_id'";
        $delete_query_run = mysqli_query($conn, $delete_query);
    
        if ($delete_query_run) {
           
        
            redirect("Kategorija je izbrisana uspešno", "../admin/storeadmin.php");
        } else {
            redirect("Nešto je pošlo po zlu", "../admin/storeadmin.php");
        }
   } elseif (isset($_POST['update_store_btn'])) {
        $store_id = $_POST['id'];
        $grad = $_POST['grad'];
        $adresa = $_POST['adresa'];
        $telefon = $_POST['telefon'];
        $radnoVreme = $_POST['radnoVreme'];
    
        $update_query = "UPDATE store SET grad='$grad', adresa='$adresa', telefon='$telefon', radnoVreme='$radnoVreme' WHERE id='$store_id'";
        $update_query_run = mysqli_query($conn, $update_query);
        
    
        if ($update_query_run) {
            redirect("Prodavnica je ažurirana uspešno", "../admin/storeedit.php?id=$store_id");
        } else {
            redirect("Nešto je pošlo po zlu", "../admin/storeedit.php?id=$store_id" );
        }
    }

else {
    header('Location: ../view/home.pxp');
}