<?php 
include "../functions/myfunctions.php";
include_once "../code/auth.php";
include "../inc/header.php";
?>



<div class="form-container">

   <form action="" method="post">
      <h3>registruj se</h3>

      
      <input type="text" name="ime" placeholder="unesi svoje ime" required class="box">
      <input type="email" name="email" placeholder="unesi svoj email" required class="box">
      <input type="password" name="password" placeholder="unesi svoju šifru" required class="box">
      <input type="password" name="cpass" placeholder="potvrdi svoju šifru" required class="box">
      <?php include "../code/message.php"?>
      <button type="submit" name="register_btn" class="btn btn-primary">Registruj se</button>
      <p>već si registrovan? <a href="login.php">uloguj se</a></p>
   </form>
</div>
<?php include "../inc/footer.php";?>