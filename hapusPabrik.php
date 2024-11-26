<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$code_pabrik = $_GET['code_pabrik'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from pabrikobat where code_pabrik='$code_pabrik'");

 
// mengalihkan halaman kembali ke index.php
header("location:tampilPabrik.php");
 
?>