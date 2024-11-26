<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$code_resep = $_POST['code_resep'];
$tglPembuatan = $_POST['tglPembuatan'];
$deskripsi = $_POST['deskripsi'];
$code_dokter = $_POST['code_dokter'];
$code_obat = $_POST['code_obat'];
$code_apoteker = $_POST['code_apoteker'];
$code_pasien = $_POST['code_pasien'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE resep SET tglPembuatan = '$tglPembuatan', deskripsi = '$deskripsi', code_dokter = '$code_dokter', code_obat = '$code_obat', code_apoteker = '$code_apoteker', code_pasien = '$code_pasien' WHERE code_resep = '$code_resep'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($koneksi->query($query)) {
    //redirect ke halaman tampil.php 
    header("location: tampilResep.php");} 
else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>