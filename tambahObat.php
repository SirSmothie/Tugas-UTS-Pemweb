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
    <title>Tambah Data Obat</title>
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
        </div>

        <!-- Form Container -->
        <div class="bg-gray-800 p-8 rounded-lg shadow-lg max-w-lg mx-auto">
            <h3 class="text-3xl font-semibold text-center mb-6">Tambah Data Obat</h3>
            <form method="post" action="inputuserObat.php" class="space-y-4">
                <div>
                    <label for="code_obat" class="block text-sm font-medium text-gray-300 mb-2">Code Obat</label>
                    <input type="text" name="code_obat" id="code_obat" required class="w-full p-3 rounded bg-gray-700 text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label for="namaObat" class="block text-sm font-medium text-gray-300 mb-2">Nama Obat</label>
                    <input type="text" name="namaObat" id="namaObat" required class="w-full p-3 rounded bg-gray-700 text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label for="dosis" class="block text-sm font-medium text-gray-300 mb-2">Dosis</label>
                    <input type="text" name="dosis" id="dosis" required class="w-full p-3 rounded bg-gray-700 text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label for="code_pabrik" class="block text-sm font-medium text-gray-300 mb-2">Pabrik</label>
                    <select name="code_pabrik" id="code_pabrik" required class="w-full p-3 rounded bg-gray-700 text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">Pilih Pabrik</option>
                        <?php
                        include 'koneksi.php';
                        $result = mysqli_query($koneksi, "SELECT code_pabrik, NamaPabrik FROM pabrikobat");
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['code_pabrik']}'>{$row['NamaPabrik']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="text-center mt-6">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded shadow">Simpan</button>
                    <a href="tampilObat.php" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded shadow">Kembali</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
