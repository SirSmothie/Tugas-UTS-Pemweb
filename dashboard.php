<?php 
session_start();

// Cek status login
$_SESSION['last_visited'] = $_SERVER['REQUEST_URI'];
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("Location: formlogin.php");
    exit();
}

// Mengambil nama pengguna dan role dari session
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'guest';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Apotik</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-200 font-sans leading-normal tracking-normal">

    <?php
    // Koneksi ke database
    include 'koneksi.php';

    // Query untuk menghitung jumlah item di setiap tabel
    $totalApoteker = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM apoteker"))['total'];
    $totalDokter = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM dokter"))['total'];
    $totalKasir = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM kasir"))['total'];
    $totalObat = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM obat"))['total'];
    $totalPabrik = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM pabrikobat"))['total'];
    $totalPasien = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM pasien"))['total'];
    $totalResep = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM resep"))['total'];
    $totalTransaksi = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM transaksi"))['total'];
    ?>

    <!-- Wrapper -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-1/4 bg-gray-800 p-6">
            <h1 class="text-2xl font-bold mb-8 text-center text-gray-200">APOTIK</h1>
            <ul class="space-y-4">
                <?php if ($role == 'admin'): ?>
                    <li><a href="tampilApoteker.php" class="text-gray-300 hover:text-white">Apoteker</a></li>
                    <li><a href="tampilDokter.php" class="text-gray-300 hover:text-white">Dokter</a></li>
                    <li><a href="tampilKasir.php" class="text-gray-300 hover:text-white">Kasir</a></li>
                    <li><a href="tampilObat.php" class="text-gray-300 hover:text-white">Obat</a></li>
                    <li><a href="tampilPabrik.php" class="text-gray-300 hover:text-white">Pabrik Obat</a></li>
                    <li><a href="tampilPasien.php" class="text-gray-300 hover:text-white">Pasien</a></li>
                    <li><a href="tampilResep.php" class="text-gray-300 hover:text-white">Resep</a></li>
                    <li><a href="tampilTransaksi.php" class="text-gray-300 hover:text-white">Transaksi</a></li>
                <?php elseif ($role == 'kasir'): ?>
                    <li><a href="tampilTransaksi.php" class="text-gray-300 hover:text-white">Transaksi</a></li>
                <?php elseif ($role == 'apoteker'): ?>
                    <li><a href="tampilObat.php" class="text-gray-300 hover:text-white">Obat</a></li>
                    <li><a href="tampilPabrik.php" class="text-gray-300 hover:text-white">Pabrik Obat</a></li>
                <?php endif; ?>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="w-3/4 p-6">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-gray-200">DASHBOARD</h2>
                <!-- User Profile -->
                <div class="relative">
                    <button class="flex items-center space-x-2">
                        <span><?php echo htmlspecialchars($username); ?></span>
                        <div class="w-10 h-10 rounded-full bg-gray-300"></div>
                    </button>
                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 mt-2 w-48 bg-gray-800 rounded-md shadow-lg py-1 hidden">
                        <a href="#" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">Setting</a>
                        <a href="logout.php" class="block px-4 py-2 text-gray-300 hover:bg-gray-700">Logout</a>
                    </div>
                </div>
            </div>

            <!-- Grid Menu -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-gray-800 shadow-lg rounded-lg p-8 flex items-center justify-center text-center">
                    <div>
                        <span class="text-xl font-semibold text-gray-300">APOTEKER</span>
                        <p class="text-2xl font-bold text-gray-100"><?php echo $totalApoteker; ?></p>
                    </div>
                </div>

                <div class="bg-gray-800 shadow-lg rounded-lg p-8 flex items-center justify-center text-center">
                    <div>
                        <span class="text-xl font-semibold text-gray-300">DOKTER</span>
                        <p class="text-2xl font-bold text-gray-100"><?php echo $totalDokter; ?></p>
                    </div>
                </div>

                <div class="bg-gray-800 shadow-lg rounded-lg p-8 flex items-center justify-center text-center">
                    <div>
                        <span class="text-xl font-semibold text-gray-300">KASIR</span>
                        <p class="text-2xl font-bold text-gray-100"><?php echo $totalKasir; ?></p>
                    </div>
                </div>

                <div class="bg-gray-800 shadow-lg rounded-lg p-8 flex items-center justify-center text-center">
                    <div>
                        <span class="text-xl font-semibold text-gray-300">OBAT</span>
                        <p class="text-2xl font-bold text-gray-100"><?php echo $totalObat; ?></p>
                    </div>
                </div>

                <div class="bg-gray-800 shadow-lg rounded-lg p-8 flex items-center justify-center text-center">
                    <div>
                        <span class="text-xl font-semibold text-gray-300">PABRIK OBAT</span>
                        <p class="text-2xl font-bold text-gray-100"><?php echo $totalPabrik; ?></p>
                    </div>
                </div>

                <div class="bg-gray-800 shadow-lg rounded-lg p-8 flex items-center justify-center text-center">
                    <div>
                        <span class="text-xl font-semibold text-gray-300">PASIEN</span>
                        <p class="text-2xl font-bold text-gray-100"><?php echo $totalPasien; ?></p>
                    </div>
                </div>

                <div class="bg-gray-800 shadow-lg rounded-lg p-8 flex items-center justify-center text-center">
                    <div>
                        <span class="text-xl font-semibold text-gray-300">RESEP</span>
                        <p class="text-2xl font-bold text-gray-100"><?php echo $totalResep; ?></p>
                    </div>
                </div>

                <div class="bg-gray-800 shadow-lg rounded-lg p-8 flex items-center justify-center text-center">
                    <div>
                        <span class="text-xl font-semibold text-gray-300">TRANSAKSI</span>
                        <p class="text-2xl font-bold text-gray-100"><?php echo $totalTransaksi; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle dropdown menu visibility on click
        const profileButton = document.querySelector('button');
        const dropdownMenu = document.querySelector('.absolute');

        profileButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
