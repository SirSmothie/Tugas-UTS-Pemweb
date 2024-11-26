<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$code_pabrik = $_POST['code_pabrik'];
$NamaPabrik = $_POST['NamaPabrik'];
$alamat = $_POST['alamat'];
$noTelp = $_POST['noTelp'];

// menginput data ke database
mysqli_query($koneksi,"insert into pabrikobat (code_pabrik, NamaPabrik, alamat, noTelp) values ('$code_pabrik','$NamaPabrik','$alamat','$noTelp')");
 
// mengalihkan halaman kembali ke index.php
header("location:tampilPabrik.php");
 
?>