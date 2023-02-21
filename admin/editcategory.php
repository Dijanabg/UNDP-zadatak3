<?php


include_once "admin/inc/header.php";
include_once "admin/inc/sidebar.php";

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4>Add Category</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Name</label>
                                <input type="text" name="name" placeholder="Unesite ime kategorije" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Opis kategorije</label>
                                <input type="text" name="description" placeholder="Unesite opis kategorije" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Upload image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                           
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_category_btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include "admin/inc/footer.php";
?>