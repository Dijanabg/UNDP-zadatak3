<?php

//echo "hello admin";
//https://www.creative-tim.com/product/material-dashboard
require "../middleware/adminMiddleware.php";
include_once "../functions/myfunctions.php";
 
include "inc/header.php";

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
      <div class="col-lg-5 col-sm-5">
        <div class="card  mb-8 mt-5">
  <div class="card-header p-3 pt-2">
    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
      <i class="material-icons opacity-10">weekend</i>
    </div>
    <div class="text-end pt-1">
      <p class="text-sm mb-0 text-capitalize">Kupovine</p>
      <h4 class="mb-0">281</h4>
    </div>
  </div>

  <hr class="dark horizontal my-0">
  <div class="card-footer p-3">
    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>nego prošle nedelje</p>
  </div>
</div>

        <div class="card  mb-8">
  <div class="card-header p-3 pt-2">
    <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
      <i class="material-icons opacity-10">leaderboard</i>
    </div>
    <div class="text-end pt-1">
      <p class="text-sm mb-0 text-capitalize">Današnjih posetilaca</p>
      <h4 class="mb-0">2,300</h4>
    </div>
  </div>

  <hr class="dark horizontal my-0">
  <div class="card-footer p-3">
    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>nego prethodnog meseca</p>
  </div>
</div>

      </div>
      <div class="col-lg-5 col-sm-5 mt-sm-0">
        <div class="card  mb-8 mt-5">
  <div class="card-header p-3 pt-2 bg-transparent">
    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
      <i class="material-icons opacity-10">store</i>
    </div>
    <div class="text-end pt-1">
      <p class="text-sm mb-0 text-capitalize ">Zarada</p>
      <h4 class="mb-0 ">34k</h4>
    </div>
  </div>

  <hr class="horizontal my-0 dark">
  <div class="card-footer p-3">
    <p class="mb-0 "><span class="text-success text-sm font-weight-bolder">+1% </span>nego juče</p>
  </div>
</div>

        <div class="card mb-8">
  <div class="card-header p-3 pt-2 bg-transparent">
    <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
      <i class="material-icons opacity-10">person_add</i>
    </div>
    <div class="text-end pt-1">
      <p class="text-sm mb-0 text-capitalize ">Pratilaca</p>
      <h4 class="mb-0 ">+91</h4>
    </div>
  </div>

  <hr class="horizontal my-0 dark">
  <div class="card-footer p-3">
    <p class="mb-0 ">Upravo ažurirano</p>
  </div>
</div>

      </div>
    </div>
        </div>
    </div>
</div>
<?php include "inc/footer.php"; ?>