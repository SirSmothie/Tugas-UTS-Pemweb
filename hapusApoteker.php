<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$code_apoteker = $_GET['code_apoteker'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from apoteker where code_apoteker='$code_apoteker'");

 
// mengalihkan halaman kembali ke index.php
header("location:tampilApoteker.php");
 
?>