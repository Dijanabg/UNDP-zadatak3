<?php 
   include "../code/auth.php";
   include "../inc/header.php";
?>
<div class="form-container">

   <form action="" method="post">
      <h3>uloguj se</h3>

      <?php include "../code/message.php"?>
      <input type="email" name="email" placeholder="unesi svoj email" required class="box">
      <input type="password" name="password" placeholder="unesi svoju šifru" required class="box">
      
      <button type="submit" name="login_btn" class="btn">Uloguj se</button>
      <p>nemas nalog? <a href="register.php">Registruj se</a></p>
   </form>
</div>
<?php include "../inc/footer.php";?>