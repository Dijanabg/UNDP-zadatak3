<?php

require "../middleware/adminMiddleware.php";
include_once "inc/header.php";
include_once "inc/sidebar.php";

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gradient-primary">
                    <h4>Unos nove kategorije</h4>
                </div>
                <div class="card-body">
                    <form action="../code/admincode.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Ime</label>
                                <input type="text" name="ime" placeholder="Unesite ime kategorije" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Opis kategorije</label>
                                <input type="text" name="opis" placeholder="Unesite opis kategorije" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Upload image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                           
                            <div class="col-md-12">
                                <button type="submit" class="btn bg-gradient-primary" name="add_category_btn">Save</button>
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