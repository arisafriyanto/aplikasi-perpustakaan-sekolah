<?php

$conn = mysqli_connect("localhost", "root", "", "aplikasi_perpustakaan_sekolah");

$filename = "siswa_exel-(" . date('d-m-Y') . ").xls";

header("content-disposition: attachment; filename=$filename");
header("content-type: application/vnd-ms-exel");

?>

<center>
	<h2>Laporan Data Siswa</h2>
</center>

<table border="1">
	<tr>
		<th>No</th>
		<th>Nomor</th>
		<th>Nama</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Jenis Kelmain</th>
		<th>Prodi</th>
	</tr>

	<?php

	$no = 1;

	$sql = mysqli_query($conn, "select * from siswa ");

	while ($data = mysqli_fetch_assoc($sql)) {
		@$jk = ($data['jenis_kelamin'] == L) ? "Laki - laki" : "Perempuan";
	?>

		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['nomor']; ?></td>
			<td><?php echo $data['nama']; ?></td>
			<td align="center"><?php echo $data['tempat_lahir']; ?></td>
			<td align="center"><?php echo $data['tanggal_lahir']; ?></td>
			<td align="center"><?php echo $jk; ?></td>
			<td><?php echo $data['prodi']; ?></td>
		</tr>
	<?php

	}

	?>
</table>