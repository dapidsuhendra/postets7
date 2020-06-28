  <?php
    include "koneksi.php";
    include "library/import.php";
  ?>
<!DOCTYPE html>

<html lang="en">
<head>
  <title>Daftar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<div class="container">
  <br>
  <center><h1>Daftar Akun</h1>
  <h3>PORTAL AKADEMIK TIF UAD</h3></center>
  <form action="cek_daftar.php" method="POST">
    <div class="form-group">
      <label for="Username">Username:</label>
      <input type="username" class="form-control" id="username" placeholder="Enter Username" name="username">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
    <div class="form-group">
      <label for="Username">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
    </div>
    <div class="form-group">
    <img src='captcha.php' class="img-fluid"/>
    </div>
    <div class="form-group">
      <label for="pwd">Type Captcha : </label>
      <input type="text" class="form-control" id="captcha_code" placeholder="Enter Captcha Code" name="captcha_code">
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" name="daftar" class="btn btn-primary">Daftar</button>
  </form>
</div>

</body>
</html>
