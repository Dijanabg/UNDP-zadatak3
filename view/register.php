<div class="form-container">

   <form action="" method="post">
      <h3>registruj se</h3>

      <input type="text" name="name" placeholder="unesi svoje ime" required class="box">
      <input type="email" name="email" placeholder="unesi svoj email" required class="box">
      <input type="password" name="password" placeholder="unesi svoju šifru" required class="box">
      <input type="password" name="cpassword" placeholder="potvrdi svoju šifru" required class="box">
      <select name="user_type" class="box">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="registruj se" class="btn">
      <p>već si registrovan? <a href="../index.php">uloguj se</a></p>
   </form>
</div>