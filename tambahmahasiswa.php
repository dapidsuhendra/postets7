<?php
include('koneksi.php');
// Check If form submitted, insert form data into users table.
 if(isset($_POST['simpan'])) {
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jkel = $_POST['jkel'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$tgllhr = $_POST['tgllhr'];

$nama = strtoupper($nama);
$alamat = strtoupper($alamat);

// Insert user data into table
$result = mysqli_query($konek, "INSERT INTO mahasiswa(nim,nama,jkel,email,alamat ,tgllhr) VALUES('$nim','$nama','$jkel','$email','$alamat','$tgllhr')");

// Show message when user added
echo "Data berhasil disimpan. <a href='index.php'>View Users</a>";
}
?>