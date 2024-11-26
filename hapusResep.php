<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$code_resep = $_GET['code_resep'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from resep where code_resep='$code_resep'");

 
// mengalihkan halaman kembali ke index.php
header("location:tampilResep.php");
 
?>