<?php

require "function.php";


if (isset($_POST['register'])) {

	if (register($_POST) > 0) {
		echo "
					<script>
						alert ('Register Berhasil Silahkan Login');
						window.location.href='login.php';
					</script>
				";
	} else {
		echo "
					<script>
						alert ('Register Gagal Sabar Ya Cuy');
						window.location.href='register.php';
					</script>
				";
	}
}


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Aplikasi Perpustakaan</title>
	<!-- BOOTSTRAP STYLES-->
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	<!-- FONTAWESOME STYLES-->
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	<!-- CUSTOM STYLES-->
	<link href="assets/css/custom.css" rel="stylesheet" />
	<!-- GOOGLE FONTS-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<style type="text/css">
		body {
			padding: 0px;
			margin: 0px;
			background-image: url(assets/img/wall.JPG);
			background-size: 50%;
		}
	</style>

</head>

<body>
	<div class="container">
		<div class="row text-center ">
			<div class="col-md-12">
				<br /><br /><br><br>

				<br />
			</div>
		</div>
		<div class="row ">

			<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<center>
							<i style="font-family: Georgia, 'Times New Roman', Times, serif; font-size: 30px; ">
								REGISTER
							</i><br>
						</center>
					</div>
					<div class="panel-body">
						<form role="form" action="" method="post">
							<br />

							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag"></i></span>
								<input type="text" name="username" class="form-control" placeholder="Your Username " />
							</div>

							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" name="password" class="form-control" placeholder="Your Password" />
							</div>

							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" name="password2" class="form-control" placeholder="Your Confirm Password" />
							</div>

							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag"></i></span>
								<input type="text" name="nama_lengkap" class="form-control" placeholder="Your Name " />
							</div>

							<input class="btn btn-primary" type="submit" name="register" value="Register Now">
							<hr />
							Login ? <a href="login.php">click here </a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
	<!-- JQUERY SCRIPTS -->
	<script src="assets/js/jquery-1.10.2.js"></script>
	<!-- BOOTSTRAP SCRIPTS -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- METISMENU SCRIPTS -->
	<script src="assets/js/jquery.metisMenu.js"></script>
	<!-- CUSTOM SCRIPTS -->
	<script src="assets/js/custom.js"></script>

</body>

</html>