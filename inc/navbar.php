<nav class="navbar fs-3 navbar-expand-lg navbar-dark bg-body-dark bg-dark shadow">
  <div class="container">
    <a class="navbar-brand fs-3 " href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link  active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="category.php">Kategorije</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <?php  
        if (isset($_SESSION['auth'])) 
        { 
        ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
              <?php echo $_SESSION['auth_user']['email'] ?>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item fs-3" href="cart.php">Korpa</a></li>
                
                <li><a class="dropdown-item fs-3" href="view/logout.php">Izloguj se</a></li>
              </ul>
            </li>
            <li><?php include_once "controller/AuthController.php";
                    //$_SESSION['role_as'] = $role_as;
                    $admin = new AuthController;
                    
                    $adminLog=$admin->adminBtn($conn);
                    
                    if($adminLog == true){?>
                    <a href="admin.php" class=" nav-link">Admin panel</a>
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