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
                    <h4>Prodavnice</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Grad</th>
                                <th>Adresa</th>
                                <th>Telefon</th>
                                <th>Radno vreme</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            
                            $store = getAll("store");
                            if (mysqli_num_rows($store) > 0) {
                                foreach ($store as $item) { ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['grad']; ?></td>
                                        <td><?= $item['adresa']; ?></td>
                                        <td><?= $item['telefon']; ?></td>
                                        <td><?= $item['radnoVreme']; ?></td>
                                        
                                        <td><a href="storeedit.php?id=<?= $item['id']; ?>" class="btn bg-gradient-primary">Ažuriraj</a>
                                            <form action="../code/admincode.php" method="post">
                                                <input type="hidden" name="id" value="<?= $item['id']; ?>">
                                                <button type="submit" class="btn bg-gradient-primary" name="delete_store_btn">Obriši</button>
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

        <?php include "inc/footer.php"; ?>