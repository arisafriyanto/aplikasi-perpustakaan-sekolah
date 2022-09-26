<?php

@$id = $_GET['id'];
@$judul = $_GET['judul'];
if (isset($_GET['id']) && $_GET['judul']) {
	$sql = mysqli_query($conn, "DELETE FROM buku WHERE id= " . $id);
	$sqlTransaksi = mysqli_query($conn, "DELETE FROM transaksi WHERE judul='$judul'");
?>
	<script type="text/javascript">
		alert("Data Berhasil Dihapus");
		window.location.href = "?page=buku";
	</script>
<?php
}

?>