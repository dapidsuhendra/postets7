<?php 
// mysqli_connect("localhost","root","") or die (mysqli_error());
// mysqli_select_db("pwd") or die (mysqli_error());

$konek = mysqli_connect("localhost","root","") or die (mysql_error());
$conn = mysqli_select_db($konek,"p8") or die (mysql_error());
 ?>
 