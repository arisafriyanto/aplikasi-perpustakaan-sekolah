<?php

session_start();

require "function.php";

if (!isset($_SESSION['login'])) {
    header("location: login.php");
    exit();
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
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Perpustakaan</a>
            </div>

            <div style=" color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">Date :
                <?php

                date_default_timezone_set("Asia/Jakarta");

                echo date("d M Y"); ?>
                <a href="logout.php" class="btn btn-danger square-btn-adjust ">Logout</a>
            </div>

        </nav>

        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive" />
                    </li>

                    <li>
                        <a href="index.php"><i class="fa fa-home fa-2x"></i> Dashboard</a>
                    </li>

                    <li>
                        <a href="?page=siswa"><i class="fa fa-laptop fa-2x"></i> Data Siswa</a>
                    </li>

                    <li>
                        <a href="?page=buku"><i class="fa fa-calendar fa-2x"></i> Data Buku</a>
                    </li>

                    <li>
                        <a href="?page=transaksi"><i class="fa fa-edit fa-2x"></i> Transaksi</a>
                    </li>

                    <li>
                        <a href="?page=data_buku"><i class="fa fa-book fa-2x"></i> Data Buku Masuk</a>
                    </li>

                    <li>
                        <a href="?page=user"><i class="fa fa-user fa-2x"></i>Management User</a>
                    </li>
                </ul>
            </div>
        </nav>


        <!-- NAV SIDE -->


        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php

                        @$page = $_GET['page'];
                        @$aksi = $_GET['aksi'];

                        if ($page == "buku") {
                            if ($aksi == "") {
                                include "page/buku/buku.php";
                            } else if ($aksi == "tambah") {
                                include "page/buku/tambah.php";
                            } else if ($aksi == "edit") {
                                include "page/buku/edit.php";
                            } else if ($aksi == "hapus") {
                                include "page/buku/hapus.php";
                            }
                        } else if ($page == "siswa") {
                            if ($aksi == "") {
                                include "page/siswa/siswa.php";
                            } else if ($aksi == "tambah") {
                                include "page/siswa/tambah.php";
                            } else if ($aksi == "edit") {
                                include "page/siswa/edit.php";
                            } else if ($aksi == "hapus") {
                                include "page/siswa/hapus.php";
                            }
                        } else if ($page == "transaksi") {
                            if ($aksi == "") {
                                include "page/transaksi/transaksi.php";
                            } else if ($aksi == "tambah") {
                                include "page/transaksi/tambah.php";
                            } else if ($aksi == "kembali") {
                                include "page/transaksi/kembali.php";
                            } else if ($aksi == "perpanjang") {
                                include "page/transaksi/perpanjang.php";
                            }
                        } else if ($page == "") {
                            include "home.php";
                        } else if ($page == "data_buku") {
                            if ($aksi == "") {
                                include "page/data_buku/data_buku.php";
                            } else if ($aksi == "tambah") {
                                include "page/data_buku/tambah.php";
                            } else if ($aksi == "edit") {
                                include "page/data_buku/edit.php";
                            } else if ($aksi == "hapus") {
                                include "page/data_buku/hapus.php";
                            }
                        } else if ($page == "user") {
                            if ($aksi == "") {
                                include "page/user/user.php";
                            }
                        }

                        ?>

                    </div>
                </div>
                <hr>
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
    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
        });
    </script>

    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>

</html>