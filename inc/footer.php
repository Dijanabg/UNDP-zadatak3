<footer class="mt-auto">
<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="text-white">E-shop</h4>
                <div class="underline mb-2"></div><br>
                <a href="home.php" class="text-white"><i class="fa fa-angle-right">Home</i></a><br>
                <a href="contact.php" class="text-white"><i class="fa fa-angle-right">Kontakt</i></a><br>
                <a href="category.php" class="text-white"><i class="fa fa-angle-right">Kategorije</i></a><br>
                <a href="cart.php" class="text-white"><i class="fa fa-angle-right">Korpa</i></a>
            </div>
            <div class="col-md-3">
                <h4 class="text-white">Address</h4>
                <div class="underline mb-2"></div><br>
                <p class="text-white">
                    Nemanjina 1,
                    Beograd, Srbija
                </p>
                <a href="tel:+381645556664" class="text-white text-decoration-none "><i class="fa fa-phone"></i>+381 645556664</a><br>
                <a href="mailto: xyz@gmail.com" class="text-white text-decoration-none "><i class="fa fa-envelope"></i> xyz@gmail.com</a>
            </div>
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.6710956565694!2d20.4571736!3d44.8078912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7aa979a545d5%3A0x60cf4ceb300aca4e!2z0J3QtdC80LDRmtC40L3QsCAxLCDQkdC10L7Qs9GA0LDQtA!5e0!3m2!1ssr!2srs!4v1674742824644!5m2!1ssr!2srs" class="w-100" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
<div class="py-2 bg-dark">
    <div class="text-center">
        <p class="mb-0 text-white">All rights reserved. Copyright @ <a href="#" target="_blank" class="text-danger">Dijana</a> <?= date('Y') ?></p>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="../script/js/custom.js"></script>
    <script src="../script/js/owl.carousel.min.js"></script>

<!-- Alertify JS za iskacuce poruke -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
    
    alertify.set('notifier', 'position', 'top-center');
    <?php if (isset($_SESSION['message'])) {
    ?>
       
        alertify.success("<?= $_SESSION['message'] ?>");
    <?php
        unset($_SESSION['message']);
    }
    ?>
    </script>
</footer>
</body>
</html>