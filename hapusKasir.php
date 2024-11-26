<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$code_kasir = $_GET['code_kasir'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from kasir where code_kasir='$code_kasir'");

 
// mengalihkan halaman kembali ke index.php
header("location:tampilKasir.php");
 
?>