<?php
	include('fpdf/fpdf.php');
	$pdf = new FPDF();
	$pdf -> AddPage();
	$pdf -> SetFont('Arial','B',16);

	$pdf->Image('foto/UAD_logo.jpg',20,10,25);
	$pdf->Cell(190,7,'PROGRAM STUDI TEKNIK INFORMATIKA',0,1,'C');
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(190,7,'DAFTAR MAHASISWA PWD',0,1,'C');
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(190,7,'Dosen : Bambang',0,1,'C');
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(190,7,'Asisten : Gontang',0,1,'C');
	
	$pdf->Image('foto/download.jpg',170,10,25);

	$pdf->Cell(10,7,'',0,1);

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(25,6,'NIM',1,0);
	$pdf->Cell(50,6,'NAMA MAHASISWA',1,0);
	$pdf->Cell(25,6,'J KEL',1,0);
	$pdf->Cell(50,6,'ALAMAT',1,0);
	$pdf->Cell(30,6,'TANGGAL LHR',1,1);

	$pdf->SetFont('Arial','',10); include 'koneksi.php';
	$mahasiswa = mysqli_query($konek, "select * from mahasiswa");
	while ($row = mysqli_fetch_array($mahasiswa)){
	$pdf->Cell(25,6,$row['nim'],1,0);
	$pdf->Cell(50,6,$row['nama'],1,0);
	$pdf->Cell(25,6,$row['jkel'],1,0);
	$pdf->Cell(50,6,$row['alamat'],1,0);
	$pdf->Cell(30,6,$row['tgllhr'],1,1);
	}


	$pdf->Output();
?>
