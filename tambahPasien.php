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
    <title>Tambah Data Pasien</title>
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
            <h3 class="text-3xl font-semibold text-center mb-6">Tambah Data Pasien</h3>
            <form method="post" action="inputuserPasien.php" class="space-y-4">
                <div>
                    <label for="code_pasien" class="block text-sm font-medium text-gray-300 mb-2">Code Pasien</label>
                    <input type="text" name="code_pasien" id="code_pasien" required class="w-full p-3 rounded bg-gray-700 text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label for="namaPasien" class="block text-sm font-medium text-gray-300 mb-2">Nama Pasien</label>
                    <input type="text" name="namaPasien" id="namaPasien" required class="w-full p-3 rounded bg-gray-700 text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-300 mb-2">Jenis Kelamin</label>
                    <select name="gender" id="gender" required class="w-full p-3 rounded bg-gray-700 text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div>
                    <label for="noTelp" class="block text-sm font-medium text-gray-300 mb-2">No Telephone</label>
                    <input type="text" name="noTelp" id="noTelp" required class="w-full p-3 rounded bg-gray-700 text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                    <input type="email" name="email" id="email" required class="w-full p-3 rounded bg-gray-700 text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label for="usia" class="block text-sm font-medium text-gray-300 mb-2">Usia</label>
                    <input type="text" name="usia" id="usia" required class="w-full p-3 rounded bg-gray-700 text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div class="text-center mt-6">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded shadow">Simpan</button>
                    <a href="tampilPasien.php" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded shadow">Kembali</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
