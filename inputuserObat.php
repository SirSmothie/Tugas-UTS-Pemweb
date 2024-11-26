<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$code_obat = $_POST['code_obat'];
$namaObat = $_POST['namaObat'];
$dosis = $_POST['dosis'];
$code_pabrik = $_POST['code_pabrik'];

// menginput data ke database
mysqli_query($koneksi,"insert into obat (code_obat, namaObat, dosis, code_pabrik) values ('$code_obat','$namaObat','$dosis','$code_pabrik')");
 
// mengalihkan halaman kembali ke index.php
header("location:tampilObat.php");
 
?>