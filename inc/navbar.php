<nav class="navbar fs-3 navbar-expand-lg navbar-dark bg-body-dark bg-dark shadow">
  <div class="container">
    <a class="navbar-brand bg-danger fs-3 " href="#"> .HELL SHOP. </a><img src="../uploads/favicon.ico" alt="">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link  active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="category.php">Kategorije</a>
        </li>
        
        <?php  
        if (isset($_SESSION['auth'])) 
        { 
        ?> 
        <li>
          <a class="nav-link fs-3" href="cart.php">Korpa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="myOrders.php">Moje porudžbine</a>
        </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
              <?php echo $_SESSION['auth_user']['ime'] ?>
              </a>
              <ul class="dropdown-menu">
                
                
                <li><a class="dropdown-item fs-3" href="logout.php">Izloguj se</a></li>
              </ul>
            </li>
            <li><?php include_once "../controller/AuthController.php";
                    //$_SESSION['role_as'] = $role_as;
                    $admin = new AuthController;
                    
                    $adminLog=$admin->adminBtn($conn);
                    
                    if($adminLog == true){?>
                    <a href="../admin/admin.php" class="  bg-danger text-white nav-link">Admin panel</a>
            </li>
                    <?php }?>
       </h6>
        <?php
        }else{ 
        ?>
            <li class="nav-item" >
              <a class="nav-link" href="register.php">Registracija</a>
            </li>
            <li class="nav-item" >
              <a class="nav-link" href="login.php">Uloguj se</a>
            </li>

        <?php 
        } 
        ?>
      </ul>
    </div>
  </div>
</nav>