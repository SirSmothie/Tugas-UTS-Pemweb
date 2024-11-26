<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$code_pabrik = $_POST['code_pabrik'];
$NamaPabrik = $_POST['NamaPabrik'];
$alamat = $_POST['alamat'];
$noTelp = $_POST['noTelp'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE pabrikobat SET NamaPabrik = '$NamaPabrik', alamat = '$alamat', noTelp = '$noTelp' WHERE code_pabrik = '$code_pabrik'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($koneksi->query($query)) {
    //redirect ke halaman tampil.php 
    header("location: tampilPabrik.php");} 
else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>