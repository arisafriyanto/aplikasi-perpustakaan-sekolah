<?php 

	include "fpdf.php";
	$conn = mysqli_connect("localhost", "root", "", "aplikasi_perpustakaan_sekolah");

	$pdf = new FPDF();
	$pdf->AddPage();

	$pdf->SetFont('Arial', 'B', 16);
	$pdf->Cell(0,5, 'SMK BINA ISLAM MANDIRI KERSANA', '0', '1', 'C', false);
	$pdf->SetFont('Arial', 'i', 8);
	$pdf->Cell(0,5, 'Alamat : Jln.RAYA DESA LIMBANGAN KERSANA', '0', '1', 'C', false);
	$pdf->Cell(0,2, 'Copyright @ arisafriyanto1933', '0', '1', 'C',false);
	$pdf->Ln(3);
	$pdf->Cell(190,0.6, '', '0', '1', 'C', true);
	$pdf->Ln(5);

	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(50,5, 'Laporan Perpustakaan Data Siswa', '0', '1', 'L', false);
	$pdf->Ln(3);

	$pdf->SetFont('Arial', 'B', 7);
	@$pdf->Cell(20,6, 'No', 1,0,'C');
	@$pdf->Cell(28,6, 'nomor', 1,0,'C');
	@$pdf->Cell(28,6, ' Nama', 1,0,'C');
	@$pdf->Cell(28,6, 'Tempat Lahir ', 1,0,'C');
	@$pdf->Cell(28,6, ' Tanggal Lahir', 1,0,'C');
	@$pdf->Cell(28,6, 'Jenis Kelamin', 1,0,'C');
	@$pdf->Cell(28,6, 'Prodi ', 1,0,'C');
	$pdf->Ln(2);
	$no = 1;
		$sql = mysqli_query($conn, "select * from siswa");
		while ($data = mysqli_fetch_array($sql)) {
			@$jk = ($data['jenis_kelamin']==L)?"Laki - laki":"Perempuan";
			$pdf->Ln(4);
			$pdf->SetFont('Arial', '', 7);
			@$pdf->Cell(20,4,$no++,1,0, 'C');
			@$pdf->Cell(28,4,$data['nomor'],1,0, 'C');
			@$pdf->Cell(28,4,$data['nama'],1,0, 'C');
			@$pdf->Cell(28,4,$data['tempat_lahir'],1,0, 'C');
			@$pdf->Cell(28,4,$data['tanggal_lahir'],1,0, 'C');
			@$pdf->Cell(28,4,$jk,1,0, 'C');
			@$pdf->Cell(28,4,$data['prodi'],1,0, 'C');
		}

$pdf->Output();
