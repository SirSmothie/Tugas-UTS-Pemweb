<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$code_dokter = $_POST['code_dokter'];
$namaDokter = $_POST['namaDokter'];
$email = $_POST['email'];
$noTelp = $_POST['noTelp'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE dokter SET namaDokter = '$namaDokter', email = '$email', noTelp = '$noTelp' WHERE code_dokter = '$code_dokter'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($koneksi->query($query)) {
    //redirect ke halaman tampil.php 
    header("location: tampilDokter.php");} 
else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>