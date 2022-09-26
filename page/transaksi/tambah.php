<?php 

	date_default_timezone_set("Asia/Jakarta");

	
	$tanggal_pinjam = date("d-m-Y");

	$tujuh_hari = mktime(0,0,0, date("n"), date("j")+7, date("Y") );
	$kembali = date("d-m-Y", $tujuh_hari);

?>
<div class="panel panel-danger">
	<div class="panel-heading">
		Tambah Data
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
	   			<form role="form" action="" method="post">
	  				<div class="form-group">
	    				<label>Buku</label>
	    				<select class="form-control" name="buku" />
	    					<?php 

                        		$dbbuku = mysqli_query($conn, "select * from buku order by id ");

                        		while ($data = mysqli_fetch_assoc($dbbuku)) {
                        			echo "<option value='$data[id].$data[judul]'> $data[judul] </option>";
                        		}

                        	?>
	    				</select>
	    			</div>

	    			<div class="form-group">
                       	<label>Nama</label>
                        <select class="form-control" name="nama">
                        	<?php 

                        		$dbbuku = mysqli_query($conn, "select * from siswa order by nama ");

                        		while ($data = mysqli_fetch_assoc($dbbuku)) {
                        			echo "<option value='$data[nomor].$data[nama]'>$data[nomor].$data[nama] </option>";
                        		}

                        	?>
                        </select>
                    </div>

	  				<div class="form-group">
	    				<label>Tanggal Pinjam</label>
	    				<input class="form-control" name="tanggal_pinjam" id="tgl" value="<?php echo $tanggal_pinjam; ?>" readonly="" />
	    			</div>


	  				<div class="form-group">
	    				<label>Tanggal Kembali</label>
	    				<input class="form-control" name="tanggal_kembali" id="tgl"  value="<?php echo $kembali; ?>" readonly="" />
	    			</div>

	    			<div>
	    				<input type="submit" name="tambah" value="Tambah Data" class="btn btn-danger">
	    			</div>
	    		</form>

	    	</div>
	    </div>
	</div>
</div>

<?php 

	if(isset($_POST['tambah'])) {

		$tanggal_pinjam = $_POST['tanggal_pinjam'];
		$tanggal_kembali = $_POST['tanggal_kembali'];

		$buku = $_POST['buku'];
		$pecah_buku = explode(".", $buku);
		$id = $pecah_buku[0];
		$judul = $pecah_buku[1];

		$nama = $_POST['nama'];
		$pecah_nama = explode(".", $nama);
		$nomor = $pecah_nama[0];
		$nama = $pecah_nama[1];


		$sql = mysqli_query($conn, "select * from buku where judul='$judul' ");
		while ($data = mysqli_fetch_assoc($sql)) {
			$sisa = $data['jumlah_buku'];

			if($sisa == 0) {
				?>
					<script type="text/javascript">
						alert("Stok Buku Habis, Transaksi Tidak Dapat Dilakukan, Silahkan Tambah Stok Buku Terlebih Dahulu");
						window.location.href="?page=transaksi&aksi=tambah";
					</script>
				<?php
			}else{

				$sql = mysqli_query($conn, "insert into transaksi (judul, nomor, nama, tanggal_pinjam, tanggal_kembali, status) values ('$judul', '$nomor', '$nama', '$tanggal_pinjam', '$tanggal_kembali', 'pinjam') ");

				$sql2 = mysqli_query($conn, "update buku set jumlah_buku=(jumlah_buku-1) where id='$id' ");

				?>
					<script type="text/javascript">
						alert("Simpan Data Berhasil");
						window.location.href="?page=transaksi";
					</script>
				<?php
			}
		}
	}

?>