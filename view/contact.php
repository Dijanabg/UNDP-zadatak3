<?php 
include "../functions/myfunctions.php";
include "../inc/header.php";
?>

<section class="mb-4">

<!--Section heading-->
<h2 class="h1-responsive font-weight-bold text-center my-4 mb-5">Kontaktirajte nas</h2>
<!--Section description-->
<p class="text-center fs-4 w-responsive mx-auto mb-2 mt-5">Da li imate neka pitanja za nas?</p>
<p class="text-center fs-4 w-responsive mx-auto ">Molimo nemojte odlagati, pišite nam odmah.</p>
<p class="text-center fs-4 w-responsive mx-auto ">Naš tim će Vam odgovoriti u najkraćem mogućem roku.</p>

<div class="row px-5 mt-5">

    <!--Grid column-->
    <div class="col-md-6 mb-md-0 mb-5 mt-5">
        
        <form id="contact-form" name="contact-form" action="../code/mail.php" method="POST">

            <!--Grid row-->
            <div class="row">
        <div class="col-md-2 mt-5"></div>
                <!--Grid column-->
                <div class="col-md-5">
                    <div class="md-form mb-0">
                        <label for="name" class="fs-4">Vaše ime</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-5">
                    <div class="md-form mb-0">
                        <label for="email" class="fs-4">Vaš email</label>
                        <input type="text" id="email" name="email" class="form-control">
                    </div>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

            <!--Grid row-->
            <div class="row">
            <div class="col-md-2 mt-5"></div>
                <div class="col-md-10">
                    <div class="md-form mb-0">
                        <label for="subject" class="fs-4">Tema</label>
                        <input type="text" id="subject" name="subject" class="form-control">
                    </div>
                </div>
            </div>
            <!--Grid row-->

            <!--Grid row-->
            <div class="row">
            <div class="col-md-2 mt-5"></div>
                <!--Grid column-->
                <div class="col-md-10">

                    <div class="md-form">
                        
                    <label for="message"class="fs-4">Vaša poruka</label>
                        <textarea type="text" id="message" name="message" rows="5" class="form-control md-textarea"></textarea>
                    </div>

                </div>
            </div>
            <!--Grid row-->

        </form>
        
        <div class="text-center text-md-left">
        <a class="btn btn-primary" onclick="validateForm();">Pošalji</a>
        </div>
        <div class="status"></div>
    </div>
    <!--Grid column-->
    <div class="col-md-1 mt-5"></div>
    <!--Grid column-->
    <div class="col-md-3 mt-5 text-center">
        <ul class="list-unstyled mb-0 mt-5">
            <li><i class="fas fa-map-marker-alt fa-2x"></i>
                <p class="fs-4">Nemanjina 1, Beograd, Srbija</p>
            </li>

            <li><i class="fa fa-phone mt-4 fa-2x"></i>
                <p class="fs-4">+8164555666</p>
            </li>

            <li><i class="fa fa-envelope mt-4 fa-2x"></i>
                <p class="fs-4">xzy@gmail.com</p>
            </li>
        </ul>
    </div>
    <!--Grid column-->

</div>

</section>

<div class="row justify-content-center mb-1 ">
<h2 class="text-center">Naše prodavnice</h2>
        <div class="col-3 text-center">
            
            <div class="input-group mb-1">
                <input type="text" id="search" autocomplete="off" class="form-control form-control-lg" placeholder="Grad">
            </div>
        </div>
</div>
<div class="row justify-content-center my-5  ">
        <div class="col-8 text-center">
            <table class="table table-bordered" id="table">
                <thead class="bg-secondary fs-4 text-white">
                    <tr>
                        <th>Grad</th>
                        <th>Adresa</th>
                        <th>Telefon</th>
                        <th>Radno vreme</th>
                    </tr>
                </thead>
                <tbody class="fs-4 ">
                    <?php
                    require '../config/db.php';
                    $query  = "SELECT * FROM store";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($Row = mysqli_fetch_assoc($result)) {
                            //displaying data in table rows dynamically
                    ?>
                            <tr>
                                <td><?php
                                    echo $Row['grad'];
                                    ?></td>
                                <td><?php
                                    echo $Row['adresa'];
                                    ?></td>
                                <td><?php
                                    echo $Row['telefon'];
                                    ?></td>
                                <td><?php
                                    echo $Row['radnoVreme'];
                                    ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php include "../inc/footer.php";