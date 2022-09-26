<?php 

	session_start();
	session_destroy();

	setcookie('id', '', time() - 3600);
	setcookie('key', '', time() - 3600);

	header("location: login.php");

?>