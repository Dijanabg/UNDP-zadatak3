<?php
//session_start();
include "functions/myfunctions.php";
include "view/authenticate.php";
//include "code/handleCart.php";
include_once "controller/CartController.php";
include "inc/header.php";


?>
<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a href="index.php" class="text-white">Home /</a>
            Cart /
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="card card-body shadow mt-3">
            <div class="row">
                <div class="col-md-12">
                    <div id="mycart">
                        <?php
                        $proditems=new CartController;
                        $items = $proditems-> getCartItems();
                        if (mysqli_num_rows($items) > 0) { ?>
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h6>Proizvod</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>Cena</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>Količina</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>Akcija</h6>
                                </div>
                            </div>
                            <div id="">
                                <?php
                                $subPrice =0;
                                $totalPrice=0;
                                foreach ($items as $citem) {
                                ?>
                                    <div class="card product_data shadow-sm mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-2">
                                                <img src="uploads/<?= $citem['image']; ?>" alt="" class="w-50">
                                            </div>
                                            <div class="col-md-4">
                                                <h5><?= $citem['ime']; ?></h5>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <h3 class=""> <?=
                                $subPrice = $citem['prodajnaCena'] * $citem['prodQty']; ?></h3>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="hidden" class="prodId" value="<?= $citem['prodId']; ?>">
                                                <div class="input-group mb-3" style="width: 80px;">
                                                    <button class="input-group-text decrement-btn updateQty">-</button>
                                                    <input type="text" class="form-control text-center input-qty bg-white " value="<?= $citem['prodQty']; ?>" disabled>
                                                    <button class=" input-group-text increment-btn updateQty">+</button>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-danger btn-sm  deleteItem" value="<?= $citem['cid']; ?>">
                                                    <i class="fa fa-trash me-2"></i> Ukloni
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $totalPrice += $citem['prodajnaCena'] * $citem['prodQty']; 
                                } ?>
                            </div>
                            <div class="text-center">
                                <h5><span class=" fw-bold fs-3"> Ukupna cena: <?= $totalPrice ?></span></h5>
                            </div>
                            <div class=" float-end">
                                <a href="checkout.php" class="btn btn-outline-primary">Poruči</a>
                            </div>
                           
                        <?php
                        } else {
                        ?>

                            <div class="card card-body text-center shadow">
                                <h4 class="py-3">Vaša korpa je prazna</h4>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "inc/footer.php"; ?>