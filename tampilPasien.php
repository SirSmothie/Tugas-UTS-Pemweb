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
    <title>Tampil Data - Pasien</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-200 font-sans p-6">

    <div class="container mx-auto">
        <!-- Header -->
        <div class="bg-gray-800 p-4 rounded-lg flex justify-between items-center shadow-md mb-6">
            <div class="flex items-center">
                <img src="foto1.jpg" alt="Avatar" class="w-16 h-16 rounded-full border-4 border-gray-200 mr-4">
                <h1 class="text-2xl font-bold">Apotik</h1>
            </div>
            <button id="menuToggle" class="text-gray-200 text-2xl focus:outline-none">&#9776;</button>
        </div>

        <!-- Navbar (collapsible for mobile) -->
        <div id="navbar" class="bg-gray-800 p-4 mt-2 rounded-lg hidden">
            <ul class="space-y-2">
                <li><a href="Dashboard.php" class="text-gray-300 hover:text-white">Dashboard</a></li>
                <li><a href="tampilApoteker.php" class="text-gray-300 hover:text-white">Apoteker</a></li>
                <li><a href="tampilDokter.php" class="text-gray-300 hover:text-white">Dokter</a></li>
                <li><a href="tampilKasir.php" class="text-gray-300 hover:text-white">Kasir</a></li>
                <li><a href="tampilObat.php" class="text-gray-300 hover:text-white">Obat</a></li>
                <li><a href="tampilPabrik.php" class="text-gray-300 hover:text-white">Pabrik</a></li>
                <li><a href="tampilPasien.php" class="text-gray-300 hover:text-white">Pasien</a></li>
                <li><a href="tampilResep.php" class="text-gray-300 hover:text-white">Resep</a></li>
                <li><a href="tampilTransaksi.php" class="text-gray-300 hover:text-white">Transaksi</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <h2 class="text-3xl font-semibold text-center mt-8">Data Pasien</h2>

        <!-- Add Button -->
        <div class="text-center my-4">
            <form method="POST" action="tambahPasien.php" class="inline">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded shadow">Tambah</button>
            </form>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto rounded-lg shadow-lg">
            <table class="min-w-full bg-gray-800 text-gray-200 border-collapse">
                <thead>
                    <tr>
                        <th class="px-4 py-2 bg-indigo-500 text-gray-100 border border-gray-700">No</th>
                        <th class="px-4 py-2 bg-indigo-500 text-gray-100 border border-gray-700">Code Pasien</th>
                        <th class="px-4 py-2 bg-indigo-500 text-gray-100 border border-gray-700">Nama Pasien</th>
                        <th class="px-4 py-2 bg-indigo-500 text-gray-100 border border-gray-700">Jenis Kelamin</th>
                        <th class="px-4 py-2 bg-indigo-500 text-gray-100 border border-gray-700">No Telephone</th>
                        <th class="px-4 py-2 bg-indigo-500 text-gray-100 border border-gray-700">Email</th>
                        <th class="px-4 py-2 bg-indigo-500 text-gray-100 border border-gray-700">Usia</th>
                        <th class="px-4 py-2 bg-indigo-500 text-gray-100 border border-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include 'koneksi.php';
                    $no = 1;
                    $data = mysqli_query($koneksi, "SELECT * FROM pasien");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <tr class="hover:bg-gray-700 hover:text-white">
                            <td class="border px-4 py-2"><?php echo $no++; ?></td>
                            <td class="border px-4 py-2"><?php echo htmlspecialchars($d['code_pasien']); ?></td>
                            <td class="border px-4 py-2"><?php echo htmlspecialchars($d['namaPasien']); ?></td>
                            <td class="border px-4 py-2"><?php echo htmlspecialchars($d['gender']); ?></td>
                            <td class="border px-4 py-2"><?php echo htmlspecialchars($d['noTelp']); ?></td>
                            <td class="border px-4 py-2"><?php echo htmlspecialchars($d['email']); ?></td>
                            <td class="border px-4 py-2"><?php echo htmlspecialchars($d['usia']); ?></td>
                            <td class="border px-4 py-2">
                                <a href="ubahPasien.php?code_pasien=<?php echo $d['code_pasien']; ?>" class="bg-yellow-600 hover:bg-yellow-700 text-white py-1 px-3 rounded shadow">Ubah</a>
                                <a href="hapusPasien.php?code_pasien=<?php echo $d['code_pasien']; ?>" class="bg-red-600 hover:bg-red-700 text-white py-1 px-3 rounded shadow">Hapus</a>
                            </td>
                        </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById('menuToggle').addEventListener('click', function () {
            const navbar = document.getElementById('navbar');
            navbar.classList.toggle('hidden');
        });
    </script>

</body>
</html>