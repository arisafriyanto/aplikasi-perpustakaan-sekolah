# Aplikasi-perpustakaan-sekolah
Aplikasi perpustakaan sekolah

Aplikasi perpustakaan sekolah ini dibuat dengan Php native dan Bootstrap
kebutuhan utama aplikasi ini adalah untuk management buku dan peminjaman buku diperpustakaan sekolah.

Terdapat beberapa menu - menu utama dari aplikasi ini:
- Data Siswa
  Menu ini berisi CRUD management data siswa yang memuat nama, tgl lahir, jenis kelamin, jurusan dll.
  dan terdapat fitur export to pdf dengan library fpdf serta ada fitur export to excel.
- Data Buku
  Menu ini berisi CRUD management data buku yang memuat judul, penerbit, tahun terbit, isbn dll.
  tahun terbit diambil -29 tahun dari tahun sekarang.
  dan terdapat fitur import excel data buku to mysql.
- Transaksi
  Menu ini berisi management data transaksi yang memuat buku, peminjam, tanggal pinjam dan tanggal kembali serta denda jika terlambat
  tanggal pinjam dan tanggal kembali otomatis 7 hari dari awal tanggal pinjam dan ada action kembali dan perpanjang
  serta jika terlambat mengembalikan buku sesuai tanggal kembalinya akan ada denda 1000 per harinya.
- Data buku masuk
  Menu ini berisi CRUD management data buku masuk yang memuat judul, tanggal masuk, jumlah buku dll.
- Management user
  Menu ini melihat management data user yang terdaftar diaplikasi hanya ada 1 hak akses yaitu admin.

Cara penggunaan aplikasi:
- clone project
- simpan di htdocs jika menggunakan xampp
- buat database dengan nama aplikasi_perpustakaan_sekolah
- import file database yang ada di folder database/aplikasi_perpustakaan_sekolah.sql
- register/login aplikasi
