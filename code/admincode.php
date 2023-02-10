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
        redirect("Category deleted successfully", "../categoryadmin.php");
    } else {
        redirect("something went wrong", "../categoryadmin.php");
    }
}