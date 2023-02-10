<nav class="navbar navbar-expand-lg navbar-dark bg-body-dark bg-dark shadow">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <?php  
        if (isset($_SESSION['auth'])) 
        { 
        ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <!-- ne znam zasto nece da ispise ime<?= $_SESSION['auth_user']['ime'] ?> -->
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                
                <li><a class="dropdown-item" href="view/logout.php">Izloguj se</a></li>
              </ul>
            </li>
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