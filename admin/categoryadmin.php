<?php
include_once "../functions/myfunctions.php";
include_once "inc/header.php";

include_once "../controller/TableController.php"
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gradient-primary">
                    <h4>Kategorije</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ime</th>
                                <th>Image</th>
                                <th>Akcija</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            
                            $category = getAll("categories");
                            if (mysqli_num_rows($category) > 0) {
                                foreach ($category as $item) { ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['ime']; ?></td>
                                        <td>
                                            <img src="../uploads/<?= $item['image']; ?>" width="100px" height="100px" alt="<?= $item['ime']; ?>">
                                        </td>
                                        
                                        <td><a href="categoryedit.php?id=<?= $item['id']; ?>" class="btn bg-gradient-primary">Ažuriraj</a>
                                            <form action="../code/admincode.php" method="post">
                                                <input type="hidden" name="id" value="<?= $item['id']; ?>">
                                                <button type="submit" class="btn bg-gradient-primary" name="delete_category_btn">Obriši</button>
                                            </form>
                                        </td>
                                    </tr>
                            <?php  }
                            } else {
                                echo "No records found";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php include "inc/footer.php"; ?>