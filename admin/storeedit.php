<?php
require "../middleware/adminMiddleware.php";
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
                $store = getById('store', $id);
                if (mysqli_num_rows($store) > 0) {
                    $data = mysqli_fetch_array($store);
            ?>
                    <div class="card">
                        <div class="card-header bg-gradient-primary">
                            <h4>Ažuriraj prodavnicu
                                <a href="storeadmin.php" class="btn bg-gradient-primary float-end">Nazad</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="../code/admincode.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="id" value="<?= $data['id']; ?>">
                                        <label for="">Grad</label>
                                        <input type="text" name="grad" value="<?= $data['grad']; ?>" placeholder="Unesi ime grada" class="form-control">
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <label for="">Adresa</label>
                                        <input type="text" name="adresa" value="<?= $data['adresa']; ?>" placeholder="Unesi adresu" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Telefon</label>
                                        <input type="text" name="telefon" value="<?= $data['telefon']; ?>" placeholder="Unesi telefon" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Radno vreme</label>
                                        <input type="text" name="radnoVreme" value="<?= $data['radnoVreme']; ?>" placeholder="Unesi radno vreme" class="form-control">
                                    </div>
 
                                    
                                    <div class="col-md-12">
                                        <button type="submit" class="btn bg-gradient-primary" name="update_store_btn">Ažuriraj</button>
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


<?php include "inc/footer.php";
?>