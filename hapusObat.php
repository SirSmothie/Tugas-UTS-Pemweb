<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$code_obat = $_GET['code_obat'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from obat where code_obat='$code_obat'");

 
// mengalihkan halaman kembali ke index.php
header("location:tampilObat.php");
 
?>