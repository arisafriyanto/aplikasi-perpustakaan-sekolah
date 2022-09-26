<div class="panel panel-primary">
	<div class="panel-heading">
		Tambah Data
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<form role="form" action="" method="post">
					<div class="form-group">
						<label>Nomor</label>
						<input class="form-control" name="nomor" />
					</div>


					<div class="form-group">
						<label>Nama</label>
						<input class="form-control" name="nama" />
					</div>


					<div class="form-group">
						<label>Tempat Lahir</label>
						<input class="form-control" name="tempat_lahir" />
					</div>

					<div class="form-group">
						<label>Tanggal Lahir</label>
						<input class="form-control" type="date" name="tanggal_lahir" />
					</div>

					<div class="form-group">
						<label>Jenis Kelamin</label><br />
						<label class="checkbox-inline">
							<input type="checkbox" / value="L" name="jenis_kelamin"> Laki - laki
						</label><br />
						<label class="checkbox-inline">
							<input type="checkbox" / value="P" name="jenis_kelamin"> Perempuan
						</label>
					</div>

					<div class="form-group">
						<label>Prodi</label>
						<select class="form-control" name="prodi">
							<option value="TKJ">TKJ</option>
							<option value="TBSM">TBSM</option>
							<option value="TOKR">TOKR</option>
							<option value="APHP">APHP</option>
							<option value="AKUTANSI">AKUTANSI</option>
						</select>
					</div>

					<div>
						<input type="submit" name="tambah" value="Tambah Data" class="btn btn-primary">
					</div>
				</form>

				<?php

				if (isset($_POST['tambah'])) {
					$nomor = $_POST['nomor'];
					$nama = ucwords($_POST['nama']);
					$tempat_lahir = ucwords($_POST['tempat_lahir']);
					$tanggal_lahir = $_POST['tanggal_lahir'];
					@$jenis_kelamin = $_POST['jenis_kelamin'];
					$prodi = $_POST['prodi'];


					$sql = mysqli_query($conn, "select * from siswa");

					$data = mysqli_fetch_assoc($sql);


					if (empty($nomor)) {
						echo "Nomor Harus Diisi";
					} else if (empty($nama)) {
						echo "Nama Harus Diisi";
					} else if (empty($tempat_lahir)) {
						echo "Tempat Lahir Harus Diisi";
					} else if (empty($tanggal_lahir)) {
						echo "Tanggal Lahir Harus Diisi";
					} else if (empty($jenis_kelamin)) {
						echo "Jenis Kelamin Harus Diisi";
					} else if (empty($prodi)) {
						echo "Prodi Harus Diisi";
					} else if ($data['nomor'] === $nomor) {
						echo "Nomor Sudah Digunakan";
					} else {

						$sql = mysqli_query($conn, "INSERT INTO siswa (id, nomor, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, prodi) VALUES (null, '$nomor', '$nama', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$prodi')");

						if ($sql) {
				?>
							<script type="text/javascript">
								alert("Data Berhasil Ditambah");
								window.location.href = "?page=siswa";
							</script>
				<?php
						}
					}
				}

				?>
			</div>
		</div>
	</div>
</div>