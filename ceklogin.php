<?php 
session_start();
include 'koneksi.php';

// Menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Menggunakan prepared statement untuk mencegah SQL injection
$query = $koneksi->prepare("SELECT * FROM auth_login WHERE username = ?");
$query->bind_param("s", $username);
$query->execute();
$result = $query->get_result();
$user = $result->fetch_assoc();

if ($user) {
    // Jika password di database sudah di-hash, gunakan password_verify
    if (password_verify($password, $user['password'])) {
        // Jika login berhasil, simpan data user di session
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['status'] = "login";
        
        // Redirect ke dashboard
        header("location:dashboard.php");
    } else {
        // Jika password salah
        echo "<script> alert('Login gagal! Password tidak benar');</script>";
        echo "<script> window.location ='formlogin.php';</script>";
    }
} else {
    // Jika username tidak ditemukan
    echo "<script> alert('Login gagal! Username tidak ditemukan');</script>";
    echo "<script> window.location ='formlogin.php';</script>";
}
?>
