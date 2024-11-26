<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$code_dokter = $_GET['code_dokter'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from dokter where code_dokter='$code_dokter'");

 
// mengalihkan halaman kembali ke index.php
header("location:tampilDokter.php");
 
?>