<?php 
include "../functions/myfunctions.php";
include "../inc/header.php";
?>

<section class="mb-4">

<!--Section heading-->
<h2 class="h1-responsive font-weight-bold text-center my-4 mb-5">Kontaktirajte nas</h2>
<!--Section description-->
<p class="text-center w-responsive mx-auto mb-5 mt-5">Da li imate neka pitanja za nas? Molimo nemojte odlagati, pišite nam odmah. Naš tim će Vam odgovoriti u najkraćem mogućem roku.</p>

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
                        <input type="text" id="name" name="name" class="form-control">
                        <label for="name" class="">Vaše ime</label>
                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-5">
                    <div class="md-form mb-0">
                        <input type="text" id="email" name="email" class="form-control">
                        <label for="email" class="">Vaš email</label>
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
                        <input type="text" id="subject" name="subject" class="form-control">
                        <label for="subject" class="">Tema</label>
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
                        <textarea type="text" id="message" name="message" rows="5" class="form-control md-textarea"></textarea>
                        <label for="message">Vaša poruka</label>
                    </div>

                </div>
            </div>
            <!--Grid row-->

        </form>
        
        <div class="text-center text-md-left">
        <Pošalji class="btn btn-primary" onclick="validateForm();">Pošalji</a>
        </div>
        <div class="status"></div>
    </div>
    <!--Grid column-->
    <div class="col-md-1 mt-5"></div>
    <!--Grid column-->
    <div class="col-md-3 mt-5 text-center">
        <ul class="list-unstyled mb-0 mt-5">
            <li><i class="fas fa-map-marker-alt fa-2x"></i>
                <p>Nemanjina 1, Beograd, Srbija</p>
            </li>

            <li><i class="fas fa-phone mt-4 fa-2x"></i>
                <p>+8164555666</p>
            </li>

            <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                <p>xzy@gmail.com</p>
            </li>
        </ul>
    </div>
    <!--Grid column-->

</div>

</section>
<?php include "../inc/footer.php";