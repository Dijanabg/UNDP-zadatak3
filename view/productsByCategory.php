<?php
//session_start();

include "../functions/myfunctions.php";
include "../inc/header.php";
include_once "../controller/TableController.php";
include_once "../controller/UserController.php";

if (isset($_GET['categoryId'])) {
    
    $category_id = $_GET['categoryId'];
    $category_cat=new UserController;
    $category_data = $category_cat->getStatusActive( $category_id);
    $category = mysqli_fetch_array($category_data);
    if ($category) {
        //$category_id = $category['id'];
?>

        <div class="py-3 bg-secondary">
            <div class="container">
                <h6 class="text-white fs-4">
                    <a class="text-white text-decoration-none " href="home.php">Home /</a>
                    <a class="text-white text-decoration-none " href="category.php">Kategorije /</a>
                    <?= $category['ime']; ?>
                </h6>
            </div>
        </div>
        <div class="py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 mb-5 mt-5">
                        <div class="row " height='250px' >
                            <h2><?= $category['ime']; ?></h2>
                            
                            <hr>
                            <?php
                            $probycat= new UserController;
                            $products = $probycat-> getProByCategory($category_id);
                            if (mysqli_num_rows($products) > 0) {
                                foreach ($products as $item) {
                            ?>
                                    <div class="col-md-3 mb-2 mt-5">
                                        <a class="text-dark  text-decoration-none " href="productView.php?products=<?= $item['id']; ?>">
                                            <div class="card shadow" style="height: 280px" >
                                                <div class="card-body text-center mt-5">
                                                    <img class="w-50 mb-3" height='100px' src="../uploads/<?= $item['image'] ?>" alt="Product image">
                                                    <h4 class="text-center mt-5 mb-5"><?= $item['ime']; ?></h4>
                                                
                                                    <h4 class="  text-center text-danger mt-5"><?= $item['prodajnaCena']; ?> DIN</h4>
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
<?php
    } else {
        echo "Ne??to nije u redu";
    }
} else {
    echo "Ne??to je po??lo po zlu";
}
include "../inc/footer.php"; ?>