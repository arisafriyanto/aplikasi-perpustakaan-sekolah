<?php

if (!isset($_GET['id'])) {
	header("location: ?page=buku");
}

$id = $_GET['id'];

$sql = mysqli_query($conn, "select * from buku where id= " . $id);

if (mysqli_num_rows($sql) < 1) {
	header("location: ?page=buku");
}

$data = mysqli_fetch_assoc($sql);

$tahun2 = $data['tahun_terbit'];


?>
<div class="panel panel-success">
	<div class="panel-heading">
		Update Data
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<form role="form" action="" method="post">
					<input type="hidden" name="id" value="<?= $data['id']; ?>">
					<div class="form-group">
						<label>Judul</label>
						<input class="form-control" name="judul" value="<?php echo $data['judul']; ?>" readonly />
					</div>


					<div class="form-group">
						<label>Pengarang</label>
						<input class="form-control" name="pengarang" value="<?php echo $data['pengarang']; ?>" />
					</div>


					<div class="form-group">
						<label>Penerbit</label>
						<input class="form-control" name="penerbit" value="<?php echo $data['penerbit']; ?>" />
					</div>


					<div class="form-group">
						<label>Tahun Terbit</label>
						<select class="form-control" name="tahun">
							<?php

							$tahun = date("Y");

							for ($i = $tahun - 29; $i <= $tahun; $i++) {

								if ($i == $tahun2) {
									echo "<option value='" . $i . "' selected>" . $i . "</option>";
								} else {

									echo "<option value='" . $i . "'>" . $i . "</option>";
								}
							}

							?>
						</select>
					</div>

					<div class="form-group">
						<label>Isbn</label>
						<input class="form-control" name="isbn" value="<?php echo $data['isbn']; ?>" />
					</div>

					<div class="form-group">
						<label>Jumlah Buku</label>
						<input class="form-control" type="number" name="jumlah" value="<?php echo $data['jumlah_buku']; ?>" />
					</div>

					<div class="form-group">
						<label>Lokasi</label>
						<input class="form-control" type="text" name="lokasi" value="<?php echo $data['lokasi'] ?>" />
					</div>

					<div>
						<input type="submit" name="update" value="Update Data" class="btn btn-success">
					</div>
				</form>

				<?php

				if (isset($_POST['update'])) {
					$id = $_POST['id'];
					$judul = ucwords($_POST['judul']);
					$pengarang = ucwords($_POST['pengarang']);
					$penerbit = ucwords($_POST['penerbit']);
					$tahun = $_POST['tahun'];
					$isbn = $_POST['isbn'];
					$jumlah = $_POST['jumlah'];
					$lokasi = ucwords($_POST['lokasi']);


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
					} else {

						$update = mysqli_query($conn, "UPDATE buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun', isbn='$isbn', jumlah_buku='$jumlah', lokasi='$lokasi' WHERE id= " . $id);

						if ($update) {
				?>
							<script type="text/javascript">
								alert("Data Berhasil DiEdit");
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