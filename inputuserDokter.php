<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$code_dokter = $_POST['code_dokter'];
$namaDokter = $_POST['namaDokter'];
$email = $_POST['email'];
$noTelp = $_POST['noTelp'];

// menginput data ke database
mysqli_query($koneksi,"insert into dokter (code_dokter, namaDokter, email, noTelp) values ('$code_dokter','$namaDokter','$email','$noTelp')");
 
// mengalihkan halaman kembali ke index.php
header("location:tampilDokter.php");
 
?>