<?php


$conn = mysqli_connect("localhost", "root", "", "aplikasi_perpustakaan_sekolah");



function register($data)
{

	global $conn;

	$username 		= strtolower(stripcslashes($data['username']));
	$password 		= mysqli_real_escape_string($conn, $data['password']);
	$password2 		= mysqli_real_escape_string($conn, $data['password2']);
	$nama_lengkap 	= htmlspecialchars($data['nama_lengkap']);

	$result = mysqli_query($conn, "select username from login where username='$username' ");
	if (mysqli_fetch_assoc($result)) {
		echo "	<script>
						alert ('Username yang anda masukkan sudah ada');
						window.location.href='register.php';
					</script>
				";

		return false;
	}

	if ($password !== $password2) {
		echo "	<script>
						alert ('Konfirmasi Password Harus Sama');
						window.location.href='register.php';
					</script>
				";

		return false;
	}


	// enkripsi password

	$password = password_hash($password, PASSWORD_DEFAULT);

	$sql = mysqli_query($conn, "insert into login (id, username, password, nama_lengkap) values (null, '$username', '$password', '$nama_lengkap') ");

	return $conn;
}







function terlambat($tanggal_dateline, $tanggal_kembali)
{

	@$tanggal_dateline_pecah = explode("-", $tanggal_dateline);
	@$tanggal_dateline_pecah = $tanggal_dateline_pecah[2] . "-" . $tanggal_dateline_pecah[1] . "-" . $tanggal_dateline_pecah[0];

	//$tanggal_dateline = tanggal kembali yang ada dalam database

	@$tanggal_kembali_pecah = explode("-", $tanggal_kembali);
	@$tanggal_kembali_pecah = $tanggal_kembali_pecah[2] . "-" . $tanggal_kembali_pecah[1] . "-" . $tanggal_kembali_pecah[0];

	//$tanggal_kembali = tanggal saat ini

	@$selisih = strtotime($tanggal_kembali_pecah) - strtotime($tanggal_dateline_pecah);

	//strtotime menghitung detik jika tidak ditentukan menghitung dari tahun 01-01-1970 sampai detik sekarang 

	//di atas kita tentukan strtotime pertama kita atur tanggal dateline yaitu tanggal sekarang dan strtotime yang kedua kita atur tanggal yang ada dalam database jika tanggal sekarang = 30-09-2019 dan tanggal didatabase 29-09-2019 kan ada satu pengurangan detik yang sama dengan satu hari = 86400 detik jadi selisih sama dengan selisih dibagi 86400 detik jika bilangannya sama kan dibagi hasilnya satu nah jika waktu sekarang tanggal 01-10-2019 dan didatabase nya 29-09-2019 maka kan ada dua pengurangan 2 hari kita kalikan satu hari berapa detiknya kan satu hari 86400 detik dikali 2 sama dengan 172800 nah 172800 kan selisih detik dari 2 hari kita bagi 172800/86400 = 2 maka selisihnya 2 hari

	@$selisih = $selisih / 86400;

	if ($selisih >= 1) {
		$hasil_tanggal = floor($selisih);

		//floor untuk membulatkan nilai kurang kebawah ceil membulatkan nilai tambah ke atas jadi jika floor detiknya belum sampai 86400 maka tidak akan dibulatkan menjadi satu contohnya ada data 0,5 diceil akan dibulatkan menjadi satu dan floor akan dibulatkan menjadi 0 dan ada data 1,5 di ceil akan dibulatkan menjadi 2 dan di floor akan dibulatkan menjadi 1 jadi jika detiknya baru setelah dari 86400 kan baru setengah hari tidak akan dibulatkan menjadi satu
	} else {
		$hasil_tanggal = 0;
	}

	return $hasil_tanggal;
}
