<?php include "../inc/header.php";?>
<div class="form-container">

   <form action="" method="post">
      <h3>uloguj se</h3>

      
      <input type="email" name="email" placeholder="unesi svoj email" required class="box">
      <input type="password" name="password" placeholder="unesi svoju šifru" required class="box">
      
      <input type="submit" name="submit" value="uloguj se" class="btn">
      <p>nemas nalog? <a href="register.php">Registruj se</a></p>
   </form>
</div>
<?php include "../inc/footer.php";?>