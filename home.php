<?php

$conn = mysqli_connect("localhost", "root", "", "aplikasi_perpustakaan_sekolah");

?>
<div class="row">
    <div class="col-md-12">
        <h2>Aplikasi Perpustakaan</h2>
        <h5>
            <marquee><i>Selamat Datang, DiSistem Aplikasi Perpustakaan</i></marquee>
        </h5>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-red set-icon">
                <i class="fa fa-laptop"></i>
            </span>
            <div class="text-box">
                <p class="main-text">Data Siswa</p>
                <p><a href="?page=siswa"><i>selengkapnya =&raquo;</i></a></p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-green set-icon">
                <i class="fa fa-calendar"></i>
            </span>
            <div class="text-box">
                <p class="main-text">Data Buku</p>
                <p><a href="?page=buku"><i>selengkapnya =&raquo;</i></a></p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-blue set-icon">
                <i class="fa fa-edit"></i>
            </span>
            <div class="text-box">
                <p class="main-text">Transaksi</p>
                <p><a href="?page=transaksi"><i>selengkapnya =&raquo;</i></a></p>
            </div>
        </div>
    </div>