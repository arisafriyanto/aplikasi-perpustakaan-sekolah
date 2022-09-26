<?php
error_reporting(0);

$connect = mysqli_connect("localhost", "root","","aplikasi_perpustakaan_sekolah");

require_once "PHPExcel/Classes/PHPExcel.php";
require_once "PHPExcel/Classes/PHPExcel/IOFactory.php";

$uploaddir = 'import/'; 
$file = $uploaddir .$_FILES['filename']['name']; 
$file_name = $_FILES['filename']['name'];

$import = move_uploaded_file($_FILES['filename']['tmp_name'], $file);

if ($import)
{ 
	$objPHPExcel = PHPExcel_IOFactory::load($file);
	
	foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
		$worksheetTitle     = $worksheet->getTitle();
		$highestRow         = $worksheet->getHighestRow(); // e.g. 10
		$highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
		$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
	    
	    $nrColumns = ord($highestColumn) - 64;
	    for ($row = 5; $row <= $highestRow; ++ $row) {
	    	$val = array();
	    	for ($col = 0; $col < $highestColumnIndex; ++ $col) {
	    		$cell = $worksheet->getCellByColumnAndRow($col, $row);
	    		$val[] = $cell->getValue();
			}
			
			$end = $val[1];
			$judul = htmlspecialchars($val[2]);
			$pengarang = htmlspecialchars($val[3]);
			$penerbit = htmlspecialchars($val[4]);
			$tahun_terbit = htmlspecialchars($val[5]);
			$isbn = htmlspecialchars($val[6]);
			$jumlah_buku = htmlspecialchars($val[7]);
			$lokasi = htmlspecialchars($val[8]);
			
			if ($end == 'END'){
				break;
			}
			
			else{
				$sql = "INSERT INTO buku (	judul,
													pengarang,
													penerbit,
													tahun_terbit,
													isbn,
													jumlah_buku,
													lokasi)
											VALUES(	'$judul',
													'$pengarang',
													'$penerbit',
													'$tahun_terbit',
													'$isbn',
													'$jumlah_buku',
													'$lokasi')";
				mysqli_query($connect, $sql);
			}
	    }
	}

	header("location: ../../index.php?page=buku");
}
