<?php
include "library/import.php";
// include database connection file 
include_once("koneksi.php");
error_reporting(null);
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))

{
$nim = $_POST['nim'];
$nama=$_POST['nama'];
$jkel=$_POST['jkel'];
$email=$_POST['email'];
$alamat=$_POST['alamat'];
$tgllhr=$_POST['tgllhr'];

// update user data
$result = mysqli_query($konek, "UPDATE mahasiswa SET nama='$nama',jkel='$jkel',email='@email',alamat='$alamat',tgl='$tgllhr' WHERE nim='$nim'");

// Redirect to homepage to display updated user in list header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$nim = $_GET['nim'];

// Fetech user data based on id
$result = mysqli_query($konek, "SELECT * FROM mahasiswa WHERE nim='$nim'");

while($user_data = mysqli_fetch_array($result))
{
$nim = $user_data['nim'];
$nama = $user_data['nama'];
$jkel = $user_data['jkel'];
$jemail =$user_data['email'];
$alamat = $user_data['alamat'];
$tgllhr = $user_data['tgllhr'];
}
?>




    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Update Data </h4>
        </div>
        <div class="modal-body">
		  <form class="form-horizontal" id="form" action="updatemahasiswa.php" method="POST">
		  <fieldset>
		    <div class="form-group">
		      <label for="inputEmail" class="col-lg-2 control-label">Nim</label>
		      <div class="col-lg-10">
		        <input readonly="true" type="text" class="form-control" placeholder="masukan nim" id="nim" name="nim" value=<?php echo
$nim;?> required hidden >
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="inputEmail" class="col-lg-2 control-label">Nama Lengkap</label>
		      <div class="col-lg-10">
		        <input type="text" class="form-control"  placeholder="Masukan Nama" id="nama" name="nama" value=<?php echo
$nama;?> required >
		      </div>
		    </div>
		     <div class="form-group">
		      <label for="inputEmail" class="col-lg-2 control-label">Alamat</label>
		      <div class="col-lg-10">
		        <input type="text" class="form-control"  placeholder="Masukan Alamat" id="nama" name="alamat" value=<?php echo
$alamat;?> required >
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="select" class="col-lg-2 control-label">Jenis Kelamin</label>
		      <div class="col-lg-10">
		        <select class="form-control" id="select" name="jkel" required>
		          <option value="l">Laki laki</option>
		          <option value="p">Perempuan</option>
		        </select>
		      </div>
		    </div>
		    
		      <div class="form-group">
				    	<?php
				    		$tgl =  date('l, d-m-Y');
				    	?>
				      <label for="inputEmail" class="col-lg-2 control-label">Tanggal Lahir</label>
				      <div class="col-lg-10">
				        <input type="date" class="form-control"  placeholder="" id="" name="ttl" value=<?php echo
$tgllhr;?>>
				      </div>
				    </div>
		    <div class="form-group">
		      <div class="col-lg-10 col-lg-offset-2">
		        <input type="submit" name="update" class="btn btn-primary" value="update">
		      </div>
		    </div>
		  </fieldset>
		</form> 
      </div>
    </div>
  </div>

  