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
                    <h4>Naše prodavnice</h4>
                </div>
                <div class="card-body">
                    <form action="../code/admincode.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Grad</label>
                                <input type="text" name="grad" placeholder="Unesite grad" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Adresa</label>
                                <input type="text" name="adresa" placeholder="Unesite adresu" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Telefon</label>
                                <input type="text" name="telefon" placeholder="Unesite telefon" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Radno vreme</label>
                                <input type="text" name="radnoVreme" placeholder="Unesite radno vreme" class="form-control">
                            </div>
                           
                            <div class="col-md-12">
                                <button type="submit" class="btn bg-gradient-primary" name="add_store_btn">Save</button>
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