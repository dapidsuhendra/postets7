<?php

    require 'koneksi.php';
    $keyword = $_GET["keyword"];
    $query = mysqli_query($konek, "SELECT * from mahasiswa where nim LIKE '%$keyword%' OR nama LIKE '%$keyword%' OR email LIKE '%$keyword%' OR jkel LIKE '%$keyword%' OR alamat LIKE '%$keyword%' OR tgllhr LIKE '%$keyword%' ") or die (mysqli_error($konek));
    //var_dump($query);
?>

<table class="table table-striped table-hover ">
		  <thead>
		    <tr>
		      <th>NIM</th>
		      <th>Nama</th>
		      <th>Email</th>
		      <th>Jenis Kelamin</th>
		      <th>Alamat</th>
		      <th>Tangal Lahir</th>
		      <th>Aksi</th>
		    </tr>
		  </thead>
		  <?php 
		 // include 'koneksi.php';
		 // $query=mysqli_query($konek,"SELECT *FROM mahasiswa ORDER BY nim DESC") or die (mysqli_error($konek));
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
		    echo '<td>'.$data['email'].'</td>';
		    echo '<td>'.$data['jkel'].'</td>';
		    echo '<td>'.$data['alamat'].'</td>';
			echo '<td>'.$data['tgllhr'].'</td>';

		    echo '<td><a class="btn btn-primary" href="updatemahasiswa.php?nim='.$data['nim'].'">Update</a>
		     <a class="btn btn-danger" href="delete.php?nim='.$data['nim'].'">Delete</a></tr>';
		    echo '</tr>';
		    $no++;
		    }

		  }
		  
		  ?>
		</table>