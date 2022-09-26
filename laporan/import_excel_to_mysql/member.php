<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Import Excel To Mysql</title>
	   <!-- BOOTSTRAP STYLES-->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
    <link href="../../assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../../assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link href="../../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

</head>
<body>
	<center>
		<h1>Import Excel To Mysql</h1><br><br>
	</center>

		<div class="container">
			<div class="col-md-12">
				<div class="panel panel-success">
					<div class="panel-heading">
					    Import Excel To Mysql
					</div><br>

			<div class="panel-body">



				<form method="POST" action="import_member.php" enctype="multipart/form-data">
					<table>
						<tr valign="top">
							<td width="120">Pilih File Import</td>
							<td width="10">:</td>
							<td><input type="file" name="filename" style="width: 300px;" required></td>
						</tr>
						<tr>
							<td colspan="3"><br>
								<button type="submit" name="submit"  class="btn btn-success">IMPORT</button>
							</td>
						</tr>
					</table>	
				</form>


			 	
			</div>


			<div class="panel-footer">
				Copyright @ 2019 - <?= date('Y'); ?> arisafriyanto1933
			</div>

		</div>
	</div>
	</div>



 <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../../assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../../assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="../../assets/js/custom.js"></script>

</body>
</html>
