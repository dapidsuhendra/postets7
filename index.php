<!DOCTYPE>
<html>

<head>
<link href="asset/css/bootstrap.min.css" rel="stylesheet">
<link href="asset/css/bootstrap.css" rel="stylesheet">
<link href="asset/css/sweetalert.css" rel="stylesheet">

<link href="asset/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="asset/css/datepicker.css">
	<title>Praktikum Rweb</title>
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
</head>

<body>
	<div class="container">
		<div class="row">
<a href="cetak.php" class="btn btn-success" id="">Cetak</a>
			<a href="#" class="btn btn-success" id="tambah">Create</a>
			<form action="" method="POST">
				<div class="form-group">
					<div class="col-lg-11">
						<input class="form-control" type="text" name="keyword" id="keyword"
							placeholder="Masukkan pencarian" autocomplete="off" autofocus>
					</div>
					<button type="submit" value="cari" name="cari" id="tombol-cari" class="btn btn-danger">Search</button>
				</div>
			</form>

			
			<div id="container">
			<table class="table table-striped table-hover ">
				<thead>
					<tr>
						<th>NIM</th>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>E-Mail</th>
						<th>Alamat</th>
						<th>Tangal Lahir</th>
						
						<th>Aksi</th>
					</tr>
				</thead>
				<?php 
					include 'koneksi.php';
					$query=mysqli_query($konek,"SELECT *FROM mahasiswa ORDER BY nim DESC") or die (mysqli_error($konek));
					if(mysqli_num_rows($query)==0){
						echo '<tbody>
						<tr class="active">
						<td colspan="5">Tidak ada data yang di entrikan </td>
						</tr>
					</tbody>';
						
					}
					else{
						$no=1;
						while($data=mysqli_fetch_assoc($query)){
						echo '<tbody>
						<tr class="active">';
						echo '<td>'.$data['nim'].'</td>';
						echo '<td>'.$data['nama'].'</td>';
						echo '<td>'.$data['jkel'].'</td>';
						echo '<td>'.$data['email'].'</td>';
						echo '<td>'.$data['alamat'].'</td>';
						echo '<td>'.$data['tgllhr'].'</td>';

						echo '<td><a class="btn btn-primary" href="updatemahasiswa.php?nim='.$data['nim'].'">Update</a>
						<a class="btn btn-danger" href="hapusmahasiswa.php?nim='.$data['nim'].'">Delete</a></tr>';
						echo '</tr>';
						$no++;
						}

					}
		  
		  		?>
			</table>
			</div>		
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Masukan Data Pribadi</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" id="form" action="tambahmahasiswa.php" method="POST"
								onsubmit="return validasi(this)">
								<fieldset>
									<div class="form-group">
										<label for="inputEmail" class="col-lg-2 control-label">Nim</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" placeholder="masukan nim" id="nim"
												name="nim">
										</div>
									</div>
									<div class="form-group">
										<label for="inputEmail" class="col-lg-2 control-label">Nama Lengkap</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" placeholder="Masukan Nama" id="nama"
												name="nama">
										</div>
									</div>
									<div class="form-group">
										<label for="inputEmail" class="col-lg-2 control-label">E-Mail</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" placeholder="Masukan E-mail"
												id="email" name="email">
										</div>
									</div>
									<div class="form-group">
										<label for="select" class="col-lg-2 control-label">Jenis Kelamin</label>
										<div class="col-lg-10">
											<select class="form-control" id="jkel" name="jkel">
												<option value="">Tidak Ada</option>
												<option value="l">Laki laki</option>
												<option value="p">Perempuan</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="inputEmail" class="col-lg-2 control-label">Alamat</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" placeholder="Masukan Alamat"
												id="alamat" name="alamat">
										</div>
									</div>
									<div class="form-group">
										<?php
				    		$tgl =  date('l, d-m-Y');
				    	?>
										<label for="inputEmail" class="col-lg-2 control-label">Tanggal Lahir</label>
										<div class="col-lg-10">
											<input type="date" class="form-control" placeholder="" id="tgllhr"
												name="tgllhr">
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-10 col-lg-offset-2">
											<input type="submit" name="simpan" class="btn btn-primary"
												value="Tambahkan">
										</div>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

<script type="text/javascript">
	$('#tambah').click(function () {
		$('#myModal').modal('show');
	});
</script>

<script type="text/javascript">
	function validasi(form) {
		pola_nim = /^[0-9]+$/;
		pola_username = /^[a-zA-Z0-9\_\-]{6,100}$/;
		pola_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

		if (!pola_nim.test(form.nim.value)) {
			alert("Nim harus berisi angka");
			form.nim.focus();
			return false;
		}
		if (form.nama.value == "") {
			alert("Nama harus diisi");
			form.nama.focus();
			return false;
		}
		if (form.email.value == "") {
			alert("Email harus diisi dengan benar");
			form.email.focus();
			return false;
		}
		if (!pola_email.test(form.email.value)) {
			alert("Email harus pakai @");
			form.email.focus();
			return false;
		}
		if (form.jkel.value == "") {
			alert("Jenis kelamin harus diisi");
			form.jkel.focus();
			return false;
		}
		if (form.alamat.value == "") {
			alert("Alamat harus diisi");
			form.alamat.focus();
			return false;
		}
		if (form.tgllhr.value == "") {
			alert("Tanggal lahir harus diisi");
			form.tgllhr.focus();
			return false;
		}
	}
</script>

<script type="text/javascript" src="asset/js/jquery.min.js"></script>
<script src="javascript/jquery-3.4.1.min"></script>
<script src="javascript/jquery.js"></script>
<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="asset/js/sweetalert.min.js"></script>
<script src="asset/js/bootstrap-datepicker.js"></script>

</div>

</html>
<?php
 }
 ?>