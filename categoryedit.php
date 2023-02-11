<?php
include_once "functions/myfunctions.php";
include_once "admin/inc/header.php";

include_once "controller/TableController.php"

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $category = getById('categories', $id);
                if (mysqli_num_rows($category) > 0) {
                    $data = mysqli_fetch_array($category);
            ?>
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h4>Ažuriraj kategoriju
                                <a href="categoryadmin.php" class="btn btn-primary float-end">Nazad</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="code/admincode.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="id" value="<?= $data['id']; ?>">
                                        <label for="">Ime</label>
                                        <input type="text" name="ime" value="<?= $data['ime']; ?>" placeholder="Unesi ime kategorije" class="form-control">
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <label for="">Opis</label>
                                        <input type="text" name="opis" value="<?= $data['opis']; ?>" placeholder="Unesi opis" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Upload image</label>
                                        <input type="file" name="image" class="form-control">
                                        <label for="">Trenutna slika</label>
                                        <input type="hidden" name="old_image" value="<?= $data['image']; ?>">
                                        <img src="uploads/<?= $data['image']; ?>" height="50px" width="50px" alt="">
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" name="update_category_btn">Ažuriraj</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php
                } else {
                    echo "Kategorija nije pronadjena";
                }
            } else {
                echo "Nešto je krenulo po zlu";
            }
            ?>

        </div>
    </div>
</div>


<?php include "admin/inc/footer.php";
?>