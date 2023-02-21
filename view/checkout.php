<?php
include "../functions/myfunctions.php";
include "authenticate.php";
include_once "../controller/CartController.php";
include "../inc/header.php";

?>
<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a href="home.php" class="text-white">Home /</a>
            <a href="checkout.php" class="text-white">Checkout</a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card card-body shadow mt-3">
                <form action="../code/placeOrder.php" method="POST">
                    <div class="row">
                        <div class="col-md-7">
                            <h5>Osnovni podaci</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Ime i prezime</label>
                                    <input type="text" name="imePrezime" required placeholder="Unesi ime i prezime" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Email</label>
                                    <input type="email" name="email" required placeholder="Unesi email" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Telefon</label>
                                    <input type="text" name="telefon" required placeholder="Unesi kontakt telefon" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Pin Code</label>
                                    <input type="text" name="pincode" required placeholder="Unesi pin code" class="form-control">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Adresa</label>
                                    <textarea name="adresa" class="form-control " rows="10" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h5>Detalji porudžbine</h5>
                            <hr>
                            <?php
                                $proditems=new CartController;
                                $items = $proditems-> getCartItems();
                                $totalPrice = 0;
                                foreach ($items as $citem) {
                            ?>
                                <div class="card product_data shadow-sm mb-3">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <img src="../uploads/<?= $citem['image']; ?>" alt="" width="60px">
                                        </div>
                                        <div class="col-md-5">
                                            <label><?= $citem['ime']; ?></label>
                                        </div>
                                        <div class="col-md-3">
                                            <label><?= $citem['prodajnaCena']; ?></label>
                                        </div>
                                        <div class="col-md-2">
                                            <label>x<?= $citem['prodQty']; ?></label>
                                        </div>

                                    </div>
                                </div>
                            <?php
                                $totalPrice += $citem['prodajnaCena'] * $citem['prodQty'];
                            }
                            ?>
                            <h5>Ukupna cena : <span class="float-end fw-bold"><?= $totalPrice ?></span></h5>
                            <div>
                                <input type="hidden" name="payMode" value="pp">
                                <button type="submit" name="placeOrderBtn" class="btn btn-primary w-100">Potvrdi porudžbinu</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php include "../inc/footer.php"; ?>