<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$code_resep = $_POST['code_resep'];
$tglPembuatan = $_POST['tglPembuatan'];
$deskripsi = $_POST['deskripsi'];
$code_dokter = $_POST['code_dokter'];
$code_obat = $_POST['code_obat'];
$code_apoteker = $_POST['code_apoteker'];
$code_pasien = $_POST['code_pasien'];

// menginput data ke database
mysqli_query($koneksi,"insert into resep (code_resep, tglPembuatan, deskripsi, code_dokter, code_obat, code_apoteker, code_pasien) values ('$code_resep','$tglPembuatan','$deskripsi','$code_dokter','$code_obat','$code_apoteker','$code_pasien')");
 
// mengalihkan halaman kembali ke index.php
header("location:tampilResep.php");
 
?>