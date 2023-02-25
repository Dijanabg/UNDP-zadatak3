<?php
// 1. bootstrap starter template
// 2. dodat jquery cdn
// 3. prebacni delovi koda u view (header, footer)
// 4. ubacen bootstrap navbar i inkludovan u header.php

include "../functions/myfunctions.php";
include_once "../code/auth.php";
include "../controller/UserController.php";
include "../inc/header.php";
include "../inc/slider.php";

?>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 px-2">
                <h2 class="text-center mb-2 mt-3">Kategorije</h2>
                <div class="underline mb-2"></div>
                <hr class="text-danger mb-5">
                    <div class="owl-carousel owl-theme">
                    <?php
                    $categories=new UserController;
                    $activcat = $categories -> getAllActive("categories");
                    if (mysqli_num_rows($activcat) > 0) {
                        foreach ($activcat as $item) {
                    ?>
                            <div class="item">
                                <a class="text-decoration-none text-dark " href="productsByCategory.php?categoryId=<?= $item['id']; ?>">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <img class="w-80 " height='150px' src="../uploads/<?= $item['image'] ?>" alt="Category image">
                                            <h4 class="text-center text-dark mt-5"><?= $item['ime']; ?></h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    <?php
                        }
                    } else {
                        echo "Nema dostupnih podataka";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12 px-2">
                <h2 class="text-center mb-2 mt-3">Popularni proizvodi</h2>
                <div class="underline  mb-2"></div>
                <hr class="text-danger mb-5">
                    <div class="owl-carousel owl-theme">
                    <?php
                    $prodTrending =new UserController;
                    
                    $trendingProducts = $prodTrending->getAllTrending();
                    if (mysqli_num_rows($trendingProducts) > 0) {
                        foreach ($trendingProducts as $item) {
                    ?>
                            <div class="item">
                                <a class="text-decoration-none text-dark " href="productView.php?products=<?= $item['id']; ?>">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <img class="w-80 " height='130px' src="../uploads/<?= $item['image'] ?>" alt="Category image">
                                            <h4 class="text-center text-dark mt-5"><?= $item['ime']; ?></h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    <?php
                        }
                    } else {
                        echo "Nema dostupnih podataka";
                    }
                    ?>
                    </div>
            </div>
        </div>
    </div>
</div>
<div class="py-5 bg-f2f2f2 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                <h3 class="text-center text-uppercase mb-3 mt-5">O nama</h3>
                <div class="underline  mb-2"></div>
                <hr class="text-danger">
                <div class="underline mb-2"></div>
                <p class="fs-4 mt-5">Bavimo se proizvodnjom i prodajom bicikala, distribucijom raznovrsne sportske opreme i pružanjem specijalizovanih servisnih usluga. Naš osnovni cilj je vrhunski kvalitet ponude i usluga i maksimalno zadovoljstvo korisnika.</p>
                <p class="fs-4 mb-5">U našoj fabrici u Kruševcu, proizvodimo bicikle pod sopstvenim robnim markama Polar i Booster. Takođe, za mnogobrojne partnere u zemlji i inostranstvu proizvodimo bicikle pod drugim robnim markama, na bazi OEM usluge.

Uvoznik smo i distributer poznatih robnih marki: Scott, Continental, Elan, Nordica, Salewa, Dainese, Völkl, Dalbello, Oakley, Look, Syncros, Fizik, Kettler, Elite, Brooks, Body Sculpture, Saris, Selle Royal, Rollerblade, Infini, Swiss Stop, Weldtite, Polisport, Poivre Blanc, Northwave, Uvex, Geosmina, Zefal i drugih.
                    <br>U našoj veleprodajnoj mreži sarađujemo sa više od 200 dilera u Srbiji, Bosni i Hercegovini, Makedoniji i Crnoj Gori i drugim evropskim zemljama.
                </p>

            </div>
            </div>
        </div>
    </div>
</div>
    

<?php include "../inc/footer.php";?>
<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 6
                }
            }
        })
    });
</script>