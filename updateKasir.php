<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$code_kasir = $_POST['code_kasir'];
$namaKasir = $_POST['namaKasir'];
$email = $_POST['email'];
$noTelp = $_POST['noTelp'];
$gender = $_POST['gender'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE kasir SET namaKasir = '$namaKasir', email = '$email', noTelp = '$noTelp', gender = '$gender' WHERE code_kasir = '$code_kasir'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($koneksi->query($query)) {
    //redirect ke halaman tampil.php 
    header("location: tampilKasir.php");} 
else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>