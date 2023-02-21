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
        <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="row ">
                    <h1 class="col-md-12 mb-5 mt-5">Kategorije</h1>
                    <hr>
                    <?php
                    $categories=new UserController;
                    $activcat = $categories -> getAllActive("categories");
                    if (mysqli_num_rows($activcat) > 0) {
                        foreach ($activcat as $item) {
                    ?>
                            <div class="col-md-4 mb-5 mt-5">
                                <a href="productsByCategory.php?categoryId=<?= $item['id']; ?>">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <img class="w-100 " height='200px' src="../uploads/<?= $item['image'] ?>" alt="Category image">
                                            <h4 class="text-center"><?= $item['ime']; ?></h4>
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
        <div class="col-md-8">
                <div class="row ">
                    <h1 class="col-md-12 mb-5 mt-5">Popularni proizvodi</h1>
                    <hr>
                    <?php
                    $prodTrending =new UserController;
                    
                    $trendingProducts = $prodTrending->getAllTrending();
                    if (mysqli_num_rows($trendingProducts) > 0) {
                        foreach ($trendingProducts as $item) {
                    ?>
                            <div class="col-md-4 mb-5 mt-5">
                                <a href="productsByCategory.php?categoryId=<?= $item['id']; ?>">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <img class="w-100 " height='200px' src="../uploads/<?= $item['image'] ?>" alt="Category image">
                                            <h4 class="text-center"><?= $item['ime']; ?></h4>
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
<div class="py-5 bg-f2f2f2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                <h4>O nama</h4>
                <div class="underline mb-2"></div>
                <p class="fs-4">Bavimo se proizvodnjom i prodajom bicikala, distribucijom raznovrsne sportske opreme i pružanjem specijalizovanih servisnih usluga. Naš osnovni cilj je vrhunski kvalitet ponude i usluga i maksimalno zadovoljstvo korisnika.</p>
                <p class="fs-4">U našoj fabrici u Kruševcu, proizvodimo bicikle pod sopstvenim robnim markama Polar i Booster. Takođe, za mnogobrojne partnere u zemlji i inostranstvu proizvodimo bicikle pod drugim robnim markama, na bazi OEM usluge.

Uvoznik smo i distributer poznatih robnih marki: Scott, Continental, Elan, Nordica, Salewa, Dainese, Völkl, Dalbello, Oakley, Look, Syncros, Fizik, Kettler, Elite, Brooks, Body Sculpture, Saris, Selle Royal, Rollerblade, Infini, Swiss Stop, Weldtite, Polisport, Poivre Blanc, Northwave, Uvex, Geosmina, Zefal i drugih.
                    <br>U našoj veleprodajnoj mreži sarađujemo sa više od 200 dilera u Srbiji, Bosni i Hercegovini, Makedoniji i Crnoj Gori i drugim evropskim zemljama.
                </p>

            </div>
            </div>
        </div>
    </div>
</div>
    

<?php include "../inc/footer.php";?>
