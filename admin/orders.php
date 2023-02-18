<?php

include_once "../functions/myfunctions.php";
include_once "inc/header.php";

include_once "../controller/TableController.php";
include_once "../controller/OrderController.php";

?>


<div class="py-5">
    <div class="container">
        <div class="card card-body shadow mt-3">
            <div class="row">
                <div class="card-header bg-primary">
                    <h4>Orders</h4>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Korisnik Id</th>
                                <th>Tracking No</th>
                                <th>Cena</th>
                                <th>Datum</th>
                                <th>Vidi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ord= new OrderController;
                            $orders = $ord-> getAllOrders();
                            if (mysqli_num_rows($orders) > 0) {
                                foreach ($orders as $item) {
                            ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['userId']; ?></td>
                                        <td><?= $item['trackingNo']; ?></td>
                                        <td><?= $item['totalPrice']; ?></td>
                                        <td><?= $item['created_at']; ?></td>
                                        <td><a href="viewOrder.php?t=<?= $item['trackingNo']; ?>" class="btn btn-primary">Vidi detalje</a></td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="5">Nema porudzbina</td>
                                </tr>
                            <?php
                            }
                            ?>


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<?php include "inc/footer.php"; ?>