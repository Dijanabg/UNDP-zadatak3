<?php
//session_start();

include "functions/myfunctions.php";
include "inc/header.php";
include_once "controller/TableController.php";
include_once "controller/UserController.php";

if (isset($_GET['categoryId'])) {
    
    $category_id = $_GET['categoryId'];
    $category_cat=new UserController;
    $category_data = $category_cat->getStatusActive('categories', $category_id);
    $category = mysqli_fetch_array($category_data);
    if ($category) {
        //$category_id = $category['id'];
?>

        <div class="py-3 bg-secondary">
            <div class="container">
                <h6 class="text-white fs-4">
                    <a class="text-white" href="index.php">Home /</a>
                    <a class="text-white" href="category.php">Kategorije /</a>
                    <?= $category['ime']; ?>
                </h6>
            </div>
        </div>
        <div class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="row">
                            <h2><?= $category['ime']; ?></h2>
                            <hr>
                            <?php
                            $probycat= new UserController;
                            $products = $probycat-> getProByCategory($category_id);
                            if (mysqli_num_rows($products) > 0) {
                                foreach ($products as $item) {
                            ?>
                                    <div class="col-md-4 mb-2 ">
                                        <a href="productView.php?products=<?= $item['id']; ?>">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <img class="w-100 " height='200px' src="uploads/<?= $item['image'] ?>" alt="Product image">
                                                    <h4 class="text-center"><?= $item['ime']; ?></h4>
                                                    <h4 class="text-center text-dark"><?= $item['prodajnaCena']; ?> DIN</h4>
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
        echo "Nešto nije u redu";
    }
} else {
    echo "Nešto je pošlo po zlu";
}
include "inc/footer.php"; ?>