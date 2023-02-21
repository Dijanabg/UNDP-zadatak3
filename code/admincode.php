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

        $product_query = "INSERT INTO products (categoryId,ime, kratkiOpis, opis, orginalnaCena, prodajnaCena, kolicina, status,trending, image ) VALUES ('$categoryId','$ime','$kratkiOpis', '$opis', '$orginalnaCena', '$prodajnaCena', '$kolicina', '$status', '$trending', '$filename' )";
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
    $category_id = $_POST['category_id'];

    $ime = $_POST['ime'];
    $kratkiOpis = $_POST['kratkiOpis'];
    $opis = $_POST['opis'];
    $orginalnaCena = $_POST['orginalnaCena'];
    $prodajnaCena = $_POST['prodajnaCena'];
    $kolicina = $_POST['kolicina'];
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';

    $path = "../uploads";

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
}elseif (isset($_POST['update_order_btn'])) {
    
    $trackNo = $_POST['trackingNo'];
    
    $order_status = $_POST['status'];

    $updateOrder_query = "UPDATE orders SET status ='$order_status' WHERE trackingNo='$trackNo' ";
    $updateOrder_query_run = mysqli_query($conn, $updateOrder_query);
    if($updateOrder_query_run){
   redirect ("Status porudžbine je ažuriran uspešno", "../admin/orders.php");
}else{
    redirect ("Nešto nije u redu", "../admin/orders.php");
}
}else {
    header('Location: ../view/home.pxp');
}