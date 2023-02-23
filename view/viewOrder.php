<?php
//session_start();
include "../functions/myfunctions.php";
include "../inc/header.php";
include "authenticate.php";
include "../controller/OrderController.php";

if (isset($_GET['t'])) {
    $orderData=new OrderController;
    $trackingNo = $_GET['t'];

    $validOrderData = $orderData -> checkTrackingNoValid($trackingNo);

    if (mysqli_num_rows($validOrderData) < 0) {
?>
        <h4>Nešto nije u redu</h4>
    <?php
        die();
    }
} else { ?>
    <h4>Nešto je pošlo po zlu</h4>
<?php
    die();
}
$data = mysqli_fetch_array($validOrderData);
?>
<div class="py-3 bg-secondary">
    <div class="container">
        <h6 class="text-white fs-4">
            <a href="home.php" class="text-white  text-decoration-none fs-4">Home /</a>
            <a href="myOrders.php" class="text-white text-decoration-none  fs-4">Moje porudžbine /</a>
            <a href="#" class="text-white text-decoration-none  fs-4">Vidi porudžbinu /</a>

        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="card card-body shadow mt-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <span class="text-white fs-4">Vidi porudžbinu</span>
                            <a href="myOrders.php" class="btn btn-warning float-end">
                                <i class="fa fa-replay"></i>Nazad
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Detalji o slanju</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold" for="name">Ime i Prezime</label>
                                            <div class="border p-1">
                                                <?= $data['imePrezime']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold" for="email">Email</label>
                                            <div class="border p-1">
                                                <?= $data['email']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold" for="phone">Telefon</label>
                                            <div class="border p-1">
                                                <?= $data['telefon']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold" for="trackingNo">Tracking no</label>
                                            <div class="border p-1">
                                                <?= $data['trackingNo']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold" for="address">Address</label>
                                            <div class="border p-1">
                                                <?= $data['adresa']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold" for="pincode">Pin Code</label>
                                            <div class="border p-1">
                                                <?= $data['pincode']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4>Poručeno</h4>
                                    <hr>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Proizvod</th>
                                                <th>Cena</th>
                                                <th>Količina</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_GET['t'])) {
                                            $trackingNo = $_GET['t'];
                                            $viewOrd = new OrderController;
                                            $viewOrde = $viewOrd->getOrderDetails($trackingNo);
                                            $viewOrder = mysqli_fetch_array($viewOrde);
                                            if ($viewOrder >0) {
                                                foreach($viewOrde as $item){
                                                    //$viewOrde = mysqli_fetch_array($viewOrde);
                                            ?>
                                                    <tr>
                                                        <td class="align-middle">
                                                            <img src="../uploads/<?= $item['image']; ?>" alt="" width="50px" height="50px">
                                                        </td>
                                                        <td class="align-middle">
                                                            <?= $item['cena']; ?>
                                                        </td>
                                                        <td class="align-middle">
                                                            <?= $item['oiKolicina']; ?>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }}
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <hr>

                                    <h5>Ukupna cena: <span class="float-end fw-bold"><?= $data['totalPrice']; ?></span></h5>
                                    <hr>
                                    <label class="fw-bold">Plaćanje</label>
                                    <div class="border p-1">

                                        <?= $data['payMode']; ?>
                                    </div>
                                    <label class="fw-bold">Status</label>
                                    <div class="border p-1">

                                        <?php

                                        if ($data['status'] == 0) {
                                            echo "U proceduri";
                                        } elseif ($data['status'] == 1) {
                                            echo "Završeno";
                                        } elseif ($data['status'] == 2) {
                                            echo "Otkazano";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php include "../inc/footer.php"; ?>