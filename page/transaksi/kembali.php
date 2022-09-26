<?php 

	$id = $_GET['id'];
	$judul = $_GET['judul'];

	$sql = mysqli_query($conn, "update transaksi set status='kembali' where id='$id' ");

	$sql = mysqli_query($conn, "update buku set jumlah_buku=(jumlah_buku+1) where judul='$judul' ");


?>
	<script type="text/javascript">
		alert("Proses Kembali Berhasil");
		window.location.href="?page=transaksi";
	</script>
<?php 

	

?>