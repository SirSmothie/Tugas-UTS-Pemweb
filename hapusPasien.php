<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$code_pasien = $_GET['code_pasien'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from pasien where code_pasien='$code_pasien'");

 
// mengalihkan halaman kembali ke index.php
header("location:tampilPasien.php");
 
?>