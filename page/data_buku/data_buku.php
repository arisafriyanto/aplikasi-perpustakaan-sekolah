<a href="?page=data_buku&aksi=tambah" class="btn btn-info" style="margin-bottom: 5px;"><i class="fa fa-plus"> Tambah Data</i></a>

<div class="panel panel-info">
	<div class="panel-heading">
		Data Buku Masuk
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th style="text-align: center;">No</th>
						<th>Judul</th>
						<th style="text-align: center;">Tanggal Masuk</th>
						<th style="text-align: center;">Jumlah Buku</th>
						<th style="text-align: center;">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php

					$no = 1;

					$sql = mysqli_query($conn, "select * from cetak_buku ");

					while ($data = mysqli_fetch_assoc($sql)) {
						@$tanggall = (date("d F Y",  strtotime($data['tanggal_masuk'])));


					?>
						<tr>
							<td style="text-align: center;"><?php echo $no++; ?></td>
							<td><?php echo $data['judul']; ?></td>
							<td style="text-align: center;"><?php echo $tanggall ?></td>
							<td style="text-align: center;"><?php echo $data['jumlah_buku']; ?></td>
							<td align="center">
								<a href="?page=data_buku&aksi=edit&id=<?= $data['id'] ?>" class="btn btn-default">
									<i class=" fa fa-refresh "></i> Update
								</a>
								<a href="?page=data_buku&aksi=hapus&id=<?= $data['id'] ?>" class="btn btn-danger">
									<i class=" fa fa-pencil "></i> Delete
								</a>
							</td>
						</tr>
					<?php

					}

					?>
				</tbody>
			</table>
		</div>
	</div>
</div>