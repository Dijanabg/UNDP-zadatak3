<?php
include_once "functions/myfunctions.php";
include_once "admin/inc/header.php";

include_once "controller/TableController.php"
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gradient-primary">
                    <h4>Proizvodi</h4>
                </div>
                <div class="card-body" id="products_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ime</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $products = getAll("products");
                            if (mysqli_num_rows($products) > 0) {
                                foreach ($products as $item) { ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['ime']; ?></td>
                                        <td>
                                            <img src="uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['ime']; ?>">
                                        </td>
                                        <td><?= $item['status'] == '0' ? "Visible" : "Hidden" ?></td>
                                        <td>
                                            <a href="productsedit.php?id=<?= $item['id']; ?>" class="btn btn-sm bg-gradient-primary">Ažuriraj</a>
                                        </td>
                                        <td>
                                        <form action="code/admincode.php" method="post">
                                                <input type="hidden" name="id" value="<?= $item['id']; ?>">
                                                <button type="submit" class="btn bg-gradient-primary" name="delete_product_btn">Obriši</button>
                                            </form>
                                        </td>
                                    </tr>
                            <?php  }
                            } else {
                                echo "No records found";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php include "admin/inc/footer.php";