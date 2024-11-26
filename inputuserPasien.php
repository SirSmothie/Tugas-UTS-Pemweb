<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$code_pasien = $_POST['code_pasien'];
$namaPasien = $_POST['namaPasien'];
$gender = $_POST['gender'];
$noTelp = $_POST['noTelp'];
$email = $_POST['email'];
$usia = $_POST['usia'];

// menginput data ke database
mysqli_query($koneksi,"insert into pasien (code_pasien, namaPasien, gender, noTelp, email, usia) values ('$code_pasien','$namaPasien','$gender','$noTelp','$email','$usia')");
 
// mengalihkan halaman kembali ke index.php
header("location:tampilPasien.php");
 
?>