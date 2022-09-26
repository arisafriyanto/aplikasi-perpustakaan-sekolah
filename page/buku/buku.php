<a href="?page=buku&aksi=tambah" class="btn btn-success" style="margin-bottom: 5px;"><i class="fa fa-plus"> Tambah Data</i></a>

<div class="panel panel-success">
	<div class="panel-heading">
		Data Buku
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Penerbit</th>
						<th style="text-align: center;">Isbn</th>
						<th style="text-align: center;">Lokasi</th>
						<th style="text-align: center;">Jumlah Buku</th>
						<th style="text-align: center;">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php

					$no = 1;

					$sql = mysqli_query($conn, "select * from buku ");

					while ($data = mysqli_fetch_assoc($sql)) {


					?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data['judul']; ?></td>
							<td><?php echo $data['penerbit']; ?></td>
							<td align="center"><?php echo $data['isbn']; ?></td>
							<td align="center"><?php echo $data['lokasi']; ?></td>
							<td align="center"><?php echo $data['jumlah_buku']; ?></td>
							<td align="center">
								<a href="?page=buku&aksi=edit&id=<?= $data['id'] ?>" class="btn btn-default">
									<i class=" fa fa-refresh "></i> Update
								</a>
								<a href="?page=buku&aksi=hapus&id=<?= $data['id'] ?>&judul=<?= $data['judul'] ?>" class="btn btn-danger">
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

		<a href="./laporan/import_excel_to_mysql/member.php" class="btn btn-info" style="margin-top: 25px"><i class="fa fa-print "> ImportExcelToMysql</i></a>

	</div>
</div>
</div>