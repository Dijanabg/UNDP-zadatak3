
<?php
include_once "../functions/myfunctions.php";
include_once "inc/header.php";

include_once "../controller/TableController.php"
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $product = getById('products', $id);

                if (mysqli_num_rows($product) > 0) {
                    $data = mysqli_fetch_array($product); 

            ?>
                    <div class="card">
                        <div class="card-header bg-gradient-primary">
                            <h4>Ažuriraj proizvod
                                <a href="productsadmin.php" class="btn bg-gradient-primary float-end">Nazad</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="../code/admincode.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12  mb-2">
                                        <label for="">Izaberi kategoriju</label>

                                        <select name="category_id"  class="form-select">
                                            <option selected>Izaberi kategoriju</option>
                                            <?php
                                            $category = getAll("categories");

                                            if (mysqli_num_rows($category) > 0) {
                                                foreach ($category as $item) {
                                            ?>
                                                    <option value="<?= $item['id']; ?>" <?= $data['category'] = $item['id'] ? "selected" : ""; ?>><?= $item['ime'] ?></option>
                                            <?php
                                                }
                                            } else {
                                                echo "Kategorija nije dostupna";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <input type="hidden" name="id" value="<?= $data['id']; ?>">
                                    <div class="col-md-12">
                                        <label class="mb-0" for="">Ime</label>
                                        <input type="text" required name="ime" value="<?= $data['ime']; ?>" placeholder="Unesi ime proizvoda" class="form-control mb-2">
                                    </div>
                                   
                                    <div class="col-md-12">
                                        <label class="mb-0" for="">Kratki opis</label>
                                        <input type="text" required name="kratkiOpis" value="<?= $data['kratkiOpis']; ?>" placeholder="Unesi kratki opis" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="">Opis</label>
                                        <input type="text" required name="opis" value="<?= $data['opis']; ?>" placeholder="Unesi opis" class="form-control mb-2 ">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0" for="">Original_price</label>
                                        <input type="text" required name="orginalnaCena" value="<?= $data['orginalnaCena']; ?>" placeholder="Unesi orginalnu cenu" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0" for="">Prodajna cena</label>
                                        <input type="text" required name="prodajnaCena" value="<?= $data['prodajnaCena']; ?>" placeholder="Unesi prodajnu cenu" class="form-control  mb-2">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="">Upload image</label>
                                        <input type="hidden" name="old_image" value=" <?= $data['image']; ?>">
                                        <input type="file" name="image" class="form-control mb-2">
                                        <label class="mb-0" for="">Trenutna slika</label>
                                        <img src="../uploads/<?= $data['image']; ?>" alt="Product image" width="50px" height="50px">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="mb-0" for="">Kolicina</label>
                                            <input type="text" required name="kolicina" value="<?= $data['kolicina']; ?>" placeholder="Unesi kolicinu" class="form-control mb-2">
                                        </div>
                                        <div class="col-md-3  mb-2">
                                            <label class="mb-0" for="">Status</label><br>
                                            <input type="checkbox" name="status" <?= $data['status'] == '0' ? '' : 'checked'; ?>>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label class="mb-0" for="">Trending</label><br>
                                            <input type="checkbox" name="trending" <?= $data['trending'] == '0' ? '' : 'checked'; ?>>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn bg-gradient-primary" name="update_product_btn">Ažuriraj</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php
                } else {
                    echo "Proizvod nije pronadjen";
                }
            } else {
                echo "Id missing from url";
            }
            ?>
        </div>
    </div>
</div>


<?php include "inc/footer.php";
?>