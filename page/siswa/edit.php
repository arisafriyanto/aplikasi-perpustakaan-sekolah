<?php

if (!isset($_GET['id'])) {
	header("location: ?page=siswa");
}

$id = $_GET['id'];

$sql = mysqli_query($conn, "select * from siswa where id= " . $id);

if (mysqli_num_rows($sql) < 1) {
	header("location: ?page=siswa");
}

$data = mysqli_fetch_assoc($sql);

$jk = $data['jenis_kelamin'];


?>
<div class="panel panel-primary">
	<div class="panel-heading">
		Update Data
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<form role="form" action="" method="post">
					<input type="hidden" name="id" value="<?= $data['id'] ?>">
					<div class="form-group">
						<label>Nomor</label>
						<input class="form-control" name="nomor" value="<?php echo $data['nomor']; ?>" readonly />
					</div>


					<div class="form-group">
						<label>Nama</label>
						<input class="form-control" name="nama" value="<?php echo $data['nama']; ?>" />
					</div>


					<div class="form-group">
						<label>Tempat Lahir</label>
						<input class="form-control" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" />
					</div>


					<div class="form-group">
						<label>Tanggal Lahir</label>
						<input class="form-control" type="date" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>" />
					</div>

					<div class="form-group">
						<label>Jenis Kelamin</label><br />
						<label class="checkbox-inline">
							<input type="checkbox" / value="L" name="jenis_kelamin" <?php echo ($jk == 'L') ? "checked" : ""; ?> /> Laki - laki
						</label><br />
						<label class="checkbox-inline">
							<input type="checkbox" / value="P" name="jenis_kelamin" <?php echo ($jk == 'P') ? "checked" : ""; ?> /> Perempuan
						</label>
					</div>

					<div class="form-group">
						<label>Prodi</label>
						<select class="form-control" name="prodi">
							<option value="<?php echo $data['prodi'] ?>"><?php echo $data['prodi']; ?></option>
							<option value="TKJ">TKJ</option>
							<option value="TBSM">TBSM</option>
							<option value="TOKR">TOKR</option>
							<option value="APHP">APHP</option>
							<option value="AKUTANSI">AKUTANSI</option>
						</select>
					</div>

					<div>
						<input type="submit" name="update" value="Update Data" class="btn btn-primary">
					</div>
				</form>

				<?php

				if (isset($_POST['update'])) {
					$id = $_POST['id'];
					$nomor = $_POST['nomor'];
					$nama = ucwords($_POST['nama']);
					$tempat_lahir = ucwords($_POST['tempat_lahir']);
					$tanggal_lahir = $_POST['tanggal_lahir'];
					$jenis_kelamin = $_POST['jenis_kelamin'];
					$prodi = $_POST['prodi'];


					if (empty($nomor)) {
						echo "nomor Harus Diisi";
					} else if (empty($nama)) {
						echo "nama Harus Diisi";
					} else if (empty($tempat_lahir)) {
						echo "tempat_lahir Harus Diisi";
					} else if (empty($tanggal_lahir)) {
						echo "tanggal_lahir Harus Diisi";
					} else if (empty($jenis_kelamin)) {
						echo "jenis_kelamin Harus Diisi";
					} else if (empty($prodi)) {
						echo "prodi Harus Diisi";
					} else {

						$update = mysqli_query($conn, "UPDATE siswa SET nomor='$nomor', nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', prodi='$prodi' WHERE id= " . $id);

						$updateTransaksi = mysqli_query($conn, "UPDATE transaksi SET nomor='$nomor', nama='$nama' WHERE nomor='$nomor'");

						if ($update) {
				?>
							<script type="text/javascript">
								alert("Data Berhasil DiEdit");
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