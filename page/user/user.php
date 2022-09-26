<div class="panel panel-warning">
    <div class="panel-heading">
    	Data User
    </div>
    <div class="panel-body">
    <div class="table-responsive">
    	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
           	<thead>
                <tr>
                	<th>No</th>
                	<th>Username</th>
                	<th>Password</th>
                	<th style="text-align: center;">Nama Lengkap</th>
                </tr>
            </thead>
            <tbody>
            		<?php 

            			$no = 1;

            			$sql = mysqli_query($conn, "select * from login ");

            			while ($data = mysqli_fetch_assoc($sql)) {
            		?>
            	<tr>
            		<td><?php echo $no++; ?></td>
            		<td><?php echo $data['username']; ?></td>
            		<td><?php echo $data['password']; ?></td>
            		<td align="center"><?php echo $data['nama_lengkap']; ?></td>
            	</tr>
            	<?php 

            		}

            	?>
            </tbody>
        </table>
        </div>

        </div>
	</div>
</div>