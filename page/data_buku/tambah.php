<div class="panel panel-info">
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
	    				<label>Tanggal Masuk</label>
	    				<input class="form-control" name="tanggal_masuk" type="date" />
	    			</div>


	  				<div class="form-group">
	    				<label>Jumlah Buku</label>
	    				<input class="form-control" name="jumlah_buku" />
	    			</div>

	    			<div>
	    				<input type="submit" name="tambah" value="Tambah Data" class="btn btn-info">
	    			</div>
	    		</form>

	    		<?php 

	    			if(isset($_POST['tambah'])) {
	    				$judul = ucwords($_POST['judul']);
	    				$tanggal_masuk = $_POST['tanggal_masuk'];
	    				$jumlah_buku = $_POST['jumlah_buku'];


	    				if(empty($judul)) {
	    					echo "Judul Harus Diisi";
	    				}else if(empty($tanggal_masuk)) {
	    					echo "Tanggal Masuk Harus Diisi";
	    				}else if(empty($jumlah_buku)) {
	    					echo "Jumlah Buku Harus Diisi";
	    				}else{

	    					$sql = mysqli_query($conn, "INSERT INTO cetak_buku (judul, tanggal_masuk, jumlah_buku) VALUES ('$judul', '$tanggal_masuk', '$jumlah_buku')");
								
							if($sql) {
	    						?> 
	    							<script type="text/javascript">
	    								alert("Data Berhasil Ditambah");
	    								window.location.href="?page=data_buku";
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