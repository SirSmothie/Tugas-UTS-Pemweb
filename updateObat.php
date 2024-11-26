<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$code_obat = $_POST['code_obat'];
$namaObat = $_POST['namaObat'];
$dosis = $_POST['dosis'];
$code_pabrik = $_POST['code_pabrik'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE obat SET namaObat = '$namaObat', dosis = '$dosis', code_pabrik = '$code_pabrik' WHERE code_obat = '$code_obat'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($koneksi->query($query)) {
    //redirect ke halaman tampil.php 
    header("location: tampilObat.php");} 
else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>