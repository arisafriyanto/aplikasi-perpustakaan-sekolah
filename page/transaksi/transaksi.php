<a href="?page=transaksi&aksi=tambah" class="btn btn-danger" style="margin-bottom: 5px;"><i class="fa fa-plus"> Tambah Data</i></a>

<div class="panel panel-danger">
    <div class="panel-heading">
    	Transaksi
    </div>
    <div class="panel-body">
    <div class="table-responsive">
    	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
           	<thead>
                <tr>
                	<th>No</th>
                	<th>Judul</th>
                	<th>Nomor</th>
                	<th>Nama</th>
                	<th style="text-align: center;">Tanggal Pinjam</th>
                	<th style="text-align: center;">Tanggal Kembali</th>
               	 	<th style="text-align: center;">Terlambat</th>
               	 	<th>Status</th>
               		<th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
            		<?php 

            			$no = 1;

            			$sql = mysqli_query($conn, "select * from transaksi where status='pinjam' ");

            			while ($data = mysqli_fetch_assoc($sql)) {

            		?>
            	<tr>
            		<td><?php echo $no++; ?></td>
            		<td align="center"><?php echo $data['judul']; ?></td>
            		<td><?php echo $data['nomor']; ?></td>
            		<td><?php echo $data['nama']; ?></td>
            		<td align="center"><?php echo date("d M Y", strtotime($data['tanggal_pinjam'])); ?></td>
            		<td align="center"><?php echo date("d M Y", strtotime($data['tanggal_kembali'])); ?></td>
            		<td>
            			<?php 

            				$denda = 1000;

            				$tanggal_dateline = $data['tanggal_kembali']; //tanggal yang ada dalam database
            				$tanggal_kembali = date("Y-m-d"); // tanggal kembali tanggal yang ada diwaktu kita saat ini

            				$lambat = terlambat($tanggal_dateline, $tanggal_kembali); //panggil function yang kita buat tadi dengan nama terlambat dan parameter function pertama kan tadi kita atur tanggal dateline yang ada dalam databse dan parameter ke 2 adalah tanggal kembali tanggal waktu kita saat ini kan kedua argumen dicari selisihnya harinya dengan strtotime dengan detik dan dikurangi satu jika tanggal dateline yang ada dalam database 29-09-2019 dan tanggal sekarang 30-09-2019 kan ada satu pengurangan akan kita kalikan dengan denda yang kita atur 1000 perhari jadi 1 dikali 1000 = 1000 jika dua hari 2 dikali 1000 = 2000

            				$denda = $lambat * $denda;

            				if($lambat > 0) {
            					echo "

            							<font color='red'>$lambat hari<br/>(Rp.$denda)</font>

            						";
            				}else{
            					echo $lambat. ' Hari';
            				}

            			?>
            		</td>
            		<td><?php echo $data['status']; ?></td>
            		<td align="center">
            			<a href="?page=transaksi&aksi=kembali&id=<?=$data['id']?>&judul=<?php echo $data['judul']; ?>" class="btn btn-default"><i class=" fa fa-refresh "></i> Kembali</a>


            			<a href="?page=transaksi&aksi=perpanjang&id=<?=$data['id']?>&judul=<?php echo $data['judul'] ?>&lambat=<?php echo $lambat ?>&tanggal_kembali=<?php echo $data['tanggal_kembali'] ?>" class="btn btn-danger"><i class=" fa fa-pencil "></i> Perpanjang</a>
            		</td>
            	</tr>
            	<?php 

            		}

            	?>
            </tbody>
    	</div>
	</div>
</div>