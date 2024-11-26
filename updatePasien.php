<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$code_pasien = $_POST['code_pasien'];
$namaPasien = $_POST['namaPasien'];
$gender = $_POST['gender'];
$noTelp = $_POST['noTelp'];
$email = $_POST['email'];
$usia = $_POST['usia'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE pasien SET namaPasien = '$namaPasien', gender = '$gender', noTelp = '$noTelp', email = '$email', usia = '$usia' WHERE code_pasien = '$code_pasien'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($koneksi->query($query)) {
    //redirect ke halaman tampil.php 
    header("location: tampilPasien.php");} 
else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>