<a href="?page=siswa&aksi=tambah" class="btn btn-primary" style="margin-bottom: 5px;"><i class="fa fa-plus"> Tambah Data</i></a>

<div class="panel panel-primary">
	<div class="panel-heading">
		Data Siswa
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th style="text-align: center;">No</th>
						<th style="text-align: center;">Nomor</th>
						<th>Nama</th>
						<th style="text-align: center;">Tempat Lahir</th>
						<th style="text-align: center;">Tanggal Lahir</th>
						<th style="text-align: center;">Jenis Kelamin</th>
						<th>Prodi</th>
						<th style="text-align: center;">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php

					$no = 1;

					$sql = mysqli_query($conn, "select * from siswa order by nama asc ");

					while ($data = mysqli_fetch_assoc($sql)) {
						@$jk = ($data['jenis_kelamin'] == L) ? "Laki - laki" : "Perempuan";
					?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data['nomor']; ?></td>
							<td><?php echo $data['nama']; ?></td>
							<td align="center"><?php echo $data['tempat_lahir']; ?></td>
							<td align="center"><?php echo date('d F Y', strtotime($data['tanggal_lahir'])); ?></td>
							<td align="center"><?php echo $jk; ?></td>
							<td><?php echo $data['prodi']; ?></td>
							<td align="center">
								<a href="?page=siswa&aksi=edit&id=<?= $data['id'] ?>" class="btn btn-default">
									<i class=" fa fa-refresh "></i> Update
								</a>
								<a href="?page=siswa&aksi=hapus&id=<?= $data['id'] ?>&nomor=<?= $data['nomor'] ?>" class="btn btn-danger">
									<i class="fa fa-pencil"></i> Delete
								</a>
							</td>
						</tr>
					<?php

					}

					?>
				</tbody>
			</table>
		</div>

		<a href="./laporan/pdf/laporan_siswa_pdf.php" target="blank" class="btn btn-warning" style="margin-top: 25px"><i class="fa fa-print "> ExportToPdf</i></a>

		<a href="./laporan/laporan_siswa_exel.php" target="blank" class="btn btn-success" style="margin-top: 25px"><i class="fa fa-print "> ExportToExcel</i></a>

	</div>
</div>
</div>