<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
		include "koneksi.php";
		include "library/import.php";
        include "navbar.php";

 session_start();
 if (empty($_SESSION['nama_lengkap'])) {
        //echo 'alert("Login Dulu")';
    header("location:formlogin.php");
    //echo 'alert("Login Dulu")'; // jika belum login, maka dikembalikan ke file form_login.php
 } else {

 ?>
 
    <title>Beranda</title>
</head>

<body>
    <div class="container">

        <h1 class="text-center">Selamat Datang <?php echo $_SESSION['nama_lengkap'] ?></h1>

    </div>
</body>

</html>
<?php
 }
 ?>