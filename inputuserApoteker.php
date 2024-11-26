<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$code_apoteker = $_POST['code_apoteker'];
$namaApoteker = $_POST['namaApoteker'];
$email = $_POST['email'];
$noTelp = $_POST['noTelp'];

// menginput data ke database
mysqli_query($koneksi,"insert into apoteker (code_apoteker, namaApoteker, email, noTelp) values ('$code_apoteker','$namaApoteker','$email','$noTelp')");
 
// mengalihkan halaman kembali ke index.php
header("location:tampilApoteker.php");
 
?>