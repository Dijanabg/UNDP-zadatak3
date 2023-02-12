<?php
//session_start();

include "functions/myfunctions.php";
include "inc/header.php";
include_once "controller/TableController.php";
include_once "controller/AuthController.php";
include_once "controller/UserController.php";

?>

<div class="py-3 bg-secondary">
    <div class="container">
        <h6 class="text-white fs-4"> 
            <a class="text-white fs-4" href="index.php">Home /</a> Kategorije /
        <?php 
                    //$_SESSION['role_as'] = $role_as;
                    $admin = new AuthController;
                    $adminLog=$admin->adminBtn($conn);
                    
                    if($adminLog == true){?>
                    <a href="categoryadmin.php" class=" btn  bg-secondary float-end">Admin panel</a>
                    <?php }?>
       </h6>
    </div>
</div>
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
                                            <img class="w-100 " height='200px' src="uploads/<?= $item['image'] ?>" alt="Category image">
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
<?php include "inc/footer.php"; ?>