<?php

@$id = $_GET['id'];
@$nomor = $_GET['nomor'];
if (isset($_GET['id']) && $_GET['nomor']) {
	$sql = mysqli_query($conn, "DELETE FROM siswa WHERE id= " . $id);
	$sqlTransaksi = mysqli_query($conn, "DELETE FROM transaksi WHERE nomor= '$nomor'");
?>
	<script type="text/javascript">
		alert("Data Berhasil Dihapus!");
		window.location.href = "?page=siswa";
	</script>
<?php
}

?>