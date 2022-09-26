<?php 

	@$id = $_GET['id'];
	if(isset($_GET['id'])) {
		$sql = mysqli_query($conn, "DELETE FROM cetak_buku WHERE id= ".$id);
		?> 
			<script type="text/javascript">
				alert ("Yakin Akan Menghapus Data??");
				window.location.href="?page=data_buku";
			</script>
		<?php
	}

?>