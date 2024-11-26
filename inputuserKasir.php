<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$code_kasir = $_POST['code_kasir'];
$namaKasir = $_POST['namaKasir'];
$email = $_POST['email'];
$noTelp = $_POST['noTelp'];
$gender = $_POST['gender'];

// menginput data ke database
mysqli_query($koneksi,"insert into kasir (code_kasir, namaKasir, email, noTelp, gender) values ('$code_kasir','$namaKasir','$email','$noTelp','$gender')");
 
// mengalihkan halaman kembali ke index.php
header("location:tampilKasir.php");
 
?>