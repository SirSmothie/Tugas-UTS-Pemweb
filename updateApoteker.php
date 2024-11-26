<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$code_apoteker = $_POST['code_apoteker'];
$namaApoteker = $_POST['namaApoteker'];
$email = $_POST['email'];
$noTelp = $_POST['noTelp'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE apoteker SET namaApoteker = '$namaApoteker', email = '$email', noTelp = '$noTelp' WHERE code_apoteker = '$code_apoteker'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($koneksi->query($query)) {
    //redirect ke halaman tampil.php 
    header("location: tampilApoteker.php");} 
else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>