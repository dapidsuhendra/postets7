<?php
session_start();
include "koneksi.php";
$id_user = $_POST['username'];
$pass=$_POST['password'];
$sql="SELECT * FROM user WHERE id_user='$id_user' AND password='$pass'";

if ($_POST["captcha_code"] == $_SESSION["captcha_code"]){
$login=mysqli_query($konek,$sql);

$ketemu=mysqli_num_rows($login);
$r= mysqli_fetch_array($login);

if ($ketemu > 0){ session_start();

$_SESSION['iduser'] = $r['id_user'];
$_SESSION['passuser'] = $r['password'];
$_SESSION['nama_lengkap'] = $r['nama_lengkap'];


header("Location:beranda.php");
}
else{
echo "<center>Login gagal! username & password tidak benar<br>";
echo "<a href=formlogin.php><b>ULANGI LAGI</b></a></center>";
}
mysqli_close($konek);

} else {
echo "<center>Login gagal! Captcha tidak sesuai<br>"; echo "<a href=formlogin.php><b>ULANGI
LAGI</b></a></center>"; }

?>
