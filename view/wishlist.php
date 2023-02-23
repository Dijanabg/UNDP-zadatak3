<?php
//session_start();
include "../functions/myfunctions.php";
include "authenticate.php";
//include "code/handleCart.php";
include_once "../controller/WishlistController.php";
include "../inc/header.php";


?>
<div class="py-3 bg-secondary">
    <div class="container">
        <h6 class="text-white">
            <a href="home.php" class="text-white text-decoration-none ">Home /</a>
            Cart /
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="card card-body shadow mt-3">
            <div class="row">
                <div class="col-md-12">
                    <div id="mywishlist">
                        <?php
                        $proditems=new WishlistController;
                        $items = $proditems-> getWishItems();
                        if (mysqli_num_rows($items) > 0) { ?>
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <h6>Slika</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>Naziv</h6>
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
                                foreach ($items as $witem) {
                                ?>
                                    <div class="card product_data shadow-sm mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-2">
                                                <img src="../uploads/<?= $witem['image']; ?>" alt="" class="w-50">
                                            </div>
                                            <div class="col-md-2">
                                                <h5><?= $witem['ime']; ?></h5>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <h3> <?= $witem['prodajnaCena']; ?></h3>
                                            </div>
                                            <div class="col-md-2">
                                            <h3> <?= $witem['kolicina']; ?></h3>
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-danger btn-sm  delItem" value="<?= $witem['wid']; ?>">
                                                    <i class="fa fa-trash me-2"></i> Ukloni
                                                </button>
                                            </div>
                                            <div class=" col-md-2">
                                            <button class=" btn btn-primary btn-sm">
                                                 <a class="text-decoration-none text-white" href="productView.php?products=<?= $witem['id']; ?>">Vidi</a>
                                            </button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                } ?>
                            </div>
                           
                           
                        <?php
                        } else {
                        ?>

                            <div class="card card-body text-center shadow">
                                <h4 class="py-3">Vaša lista želja je prazna</h4>
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
<?php include "../inc/footer.php"; ?>