<?php 

	if(!isset($_GET['id'])) {
		header("location: ?page=data_buku");
	}

	$id = $_GET['id'];

	$sql = mysqli_query($conn, "select * from cetak_buku where id= ".$id);

	if(mysqli_num_rows($sql) < 1) {
		header("location: ?page=data_buku");
	}

	$data = mysqli_fetch_assoc($sql);


	$tahun2 = $data['tanggal_masuk'];


?>
<div class="panel panel-info">
	<div class="panel-heading">
		Update Data
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
	   			<form role="form" action="" method="post">
	  				<div class="form-group">
	    				<label>Judul</label>
	    				<input class="form-control" name="judul" value="<?php echo $data['judul']; ?>" />
	    			</div>


	  				<div class="form-group">
	    				<label>Tanggal Masuk</label>
	    				<input class="form-control" type="date" name="tanggal_masuk" value="<?php echo $data['tanggal_masuk']; ?>" />
	    			</div>


	  				<div class="form-group">
	    				<label> Jumlah Buku</label>
	    				<input class="form-control" name="jumlah_buku" value="<?php echo $data['jumlah_buku']; ?>" />
	    			</div>


	    			<div>
	    				<input type="submit" name="update" value="Update Data" class="btn btn-info">
	    			</div>
	    		</form>

	    		<?php 

	    			if(isset($_POST['update'])) {
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

	    					$update = mysqli_query($conn, "UPDATE cetak_buku SET judul='$judul', tanggal_masuk='$tanggal_masuk', jumlah_buku='$jumlah_buku' WHERE id= ".$id);

	    					if($update) {
	    						?> 
	    							<script type="text/javascript">
	    								alert("Data Berhasil DiEdit");
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