<div class="panel panel-success">
	<div class="panel-heading">
		Tambah Data
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<form role="form" action="" method="post">
					<div class="form-group">
						<label>Judul</label>
						<input class="form-control" name="judul" />
					</div>


					<div class="form-group">
						<label>Pengarang</label>
						<input class="form-control" name="pengarang" />
					</div>


					<div class="form-group">
						<label>Penerbit</label>
						<input class="form-control" name="penerbit" />
					</div>


					<div class="form-group">
						<label>Tahun Terbit</label>
						<select class="form-control" name="tahun">
							<?php

							$tahun = date("Y");

							for ($i = $tahun - 29; $i <= $tahun; $i++) {
								echo "<option> $i </option>";
							}

							?>
						</select>
					</div>

					<div class="form-group">
						<label>Isbn</label>
						<input class="form-control" name="isbn" />
					</div>

					<div class="form-group">
						<label>Jumlah Buku</label>
						<input class="form-control" type="number" name="jumlah" />
					</div>

					<div class="form-group">
						<label>Lokasi</label>
						<input class="form-control" type="text" name="lokasi" />
					</div>

					<div>
						<input type="submit" name="tambah" value="Tambah Data" class="btn btn-success">
					</div>
				</form>

				<?php

				if (isset($_POST['tambah'])) {
					$judul = ucwords($_POST['judul']);
					$pengarang = ucwords($_POST['pengarang']);
					$penerbit = ucwords($_POST['penerbit']);
					$tahun = $_POST['tahun'];
					$isbn = $_POST['isbn'];
					$jumlah = $_POST['jumlah'];
					$lokasi = ucwords($_POST['lokasi']);

					$sql = mysqli_query($conn, "select * from buku");

					$data = mysqli_fetch_assoc($sql);

					if (empty($judul)) {
						echo "Judul Harus Diisi";
					} else if (empty($pengarang)) {
						echo "Pengarang Harus Diisi";
					} else if (empty($penerbit)) {
						echo "Penerbit Harus Diisi";
					} else if (empty($tahun)) {
						echo "Tahun Harus Diisi";
					} else if (empty($isbn)) {
						echo "Isbn Harus Diisi";
					} else if (empty($jumlah)) {
						echo "Jumlah Harus Diisi";
					} else if (empty($lokasi)) {
						echo "Lokasi Harus Diisi";
					} else if ($data['judul'] === $judul) {
						echo "Judul Sudah Digunakan";
					} else {

						$sql = mysqli_query($conn, "INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit, isbn, jumlah_buku, lokasi) VALUES ('$judul', '$pengarang', '$penerbit', '$tahun', '$isbn', '$jumlah', '$lokasi')");

						if ($sql) {
				?>
							<script type="text/javascript">
								alert("Data Berhasil Ditambah");
								window.location.href = "?page=buku";
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