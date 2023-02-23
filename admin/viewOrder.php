<?php
require "../middleware/adminMiddleware.php";
//include "../code/auth.php";
include_once "../functions/myfunctions.php";
include_once "inc/header.php";

include_once "../controller/TableController.php";
include_once "../controller/OrderController.php";

if (isset($_GET['t'])) {
    
    $trackingNo = $_GET['t'];
    $orderData=new OrderController;
    
    $validOrderData = $orderData -> adminCheckTrackingNoValid($trackingNo);

    if (mysqli_num_rows($validOrderData) < 0) {

?>
        <h4>Nesto je pogresno</h4>
    <?php
        die();
    }
} else { ?>
    <h4>Something went wrong</h4>
<?php
    die();
}
 $data = mysqli_fetch_array($validOrderData);

?>


<div class="py-5">
    <div class="container">
        <div class="card card-body shadow mt-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-gradient-primary">
                            <span class="text-white fs-4">Vidi porudžbine</span>
                            <a href="orders.php" class="btn bg-gradient-primary float-end">
                                <i class="fa fa-replay"></i>Nazad
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Detalji za slanje</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold" for="imePrezime">Ime prezime</label>
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
                                            <label class="fw-bold" for="telefon">Telefon</label>
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
                                            <label class="fw-bold" for="adresa">Address</label>
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
                                    <h4>Detalji porudžbine</h4>
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

                                    <h5>Total Price: <span class="float-end fw-bold"><?= $data['totalPrice']; ?></span></h5>
                                    <hr>
                                    <label class="fw-bold">Plaćanje</label>
                                    <div class="border p-1">

                                        <?= $data['payMode']; ?>
                                    </div>
                                    <label class="fw-bold">Status</label>
                                    <div class="mb-3">
                                        <form action="../code/admincode.php" method="POST">
                                            <input type="hidden" class="trackingNo" name="trackingNo" value="<?= $data['trackingNo'] ?>">
                                            <select name="status" class="form-select">
                                                <option value="0" <?= $data['status'] == 0 ? "selected" : "" ?>>U procesu</option>
                                                <option value="1" <?= $data['status'] == 1 ? "selected" : "" ?>>Završeno</option>
                                                <option value="2" <?= $data['status'] == 2 ? "selected" : "" ?>>Otkazano</option>
                                            </select>
                                            <button type="submit" name="update_order_btn" class=" btn bg-gradient-primary mt-2">Ažuriraj</button>
                                        </form>
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