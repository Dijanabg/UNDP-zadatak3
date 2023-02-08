<?php
// 1. bootstrap starter template
// 2. dodat jquery cdn
// 3. prebacni delovi koda u view (header, footer)
// 4. ubacen bootstrap navbar i inkludovan u header.php

include "functions/myfunctions.php";
include_once "code/auth.php";
include "inc/header.php";

?>
<div class="container">
    <?php include "code/message.php"?>
    <h1>Home page</h1>
</div>
    

<?php include "inc/footer.php";?>