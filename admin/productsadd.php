<?php
require "../middleware/adminMiddleware.php";
include_once "../functions/myfunctions.php";
include_once "inc/header.php";

include_once "../controller/TableController.php"
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gradient-primary">
                    <h4>Dodaj proizvod</h4>
                </div>
                <div class="card-body">
                    <form action="../code/admincode.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12  mb-2">
                                <label for="">Izaberi kategoriju</label>
                                <select name="categoryId" class="form-select">
                                    <option selected>Izaberi kategoriju</option>
                                    <?php
                                    $category = getAll("categories");

                                    if (mysqli_num_rows($category) > 0) {
                                        foreach ($category as $item) {
                                    ?>
                                            <option value="<?= $item['id']; ?>"><?= $item['ime'] ?></option>
                                    <?php
                                        }
                                    } else {
                                        echo "Nema kategorija";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Ime</label>
                                <input type="text" required name="ime" placeholder="Unesi ime proizvoda" class="form-control mb-2">
                            </div>
                            
                            <div class="col-md-12">
                                <label class="mb-0" for="">Kratki opis</label>
                                <input type="text" required name="kratkiOpis" placeholder="Unesi kratki opis" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Opis</label>
                                <input type="text" required name="opis" placeholder="Unesi opis" class="form-control mb-2 ">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="">Orginalna cena</label>
                                <input type="text" required name="originalnaCena" placeholder="Unesi orginalnu cenu" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="">Prodajna cena</label>
                                <input type="text" required name="prodajnaCena" placeholder="Unesi prodajnu cenu" class="form-control  mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Upload image</label>
                                <input type="file" required name="image" class="form-control mb-2">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mb-0" for="">Količina</label>
                                    <input type="text" required name="kolicina" placeholder="Unesi količinu" class="form-control mb-2">
                                </div>
                                <div class="col-md-3  mb-2">
                                    <label class="mb-0" for="">Status</label><br>
                                    <input type="checkbox" name="status">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label class="mb-0" for="">Trending</label><br>
                                    <input type="checkbox" name="trending">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn bg-gradient-primary" name="add_product_btn">Sačuvaj</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include "inc/footer.php";
?>