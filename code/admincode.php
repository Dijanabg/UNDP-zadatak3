<?php
//session_start();
include "../db.php";
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
        redirect("Category added successfully", "../categoryadd.php");
    } else {
        redirect("Something went wrong", "../categoryadd.php");
    }
}