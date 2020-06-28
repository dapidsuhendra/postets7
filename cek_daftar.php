<?php
session_start();
include "koneksi.php";


//$sql="SELECT * FROM users WHERE nama_lengkap='$id_user' AND password='$pass'";

if ($_POST["captcha_code"] == $_SESSION["captcha_code"])
{
if (isset($_POST['daftar'])) {

    $nama   = $_POST['username'];
    $pass   = $_POST['password'];
    $email  = $_POST['email'];
    $level  = "Member";
    $result = mysqli_query($konek, "INSERT INTO users(nama_lengkap,password,email,level) VALUES ('$nama','$pass','$email','$level')");

    echo "<center>Data berhasil disimpan. <a href='formlogin.php'>Login</a></center>";
}else{
    echo "<center>Data gagal disimpan. <a href='daftar.php'>Daftar</a></center>";
}}

else{
    echo "<center>Daftar gagal! Captcha tidak sesuai<br>"; 
    echo "<a href=daftar.php><b>ULANGILAGI</b></a></center>";
}
    
?>