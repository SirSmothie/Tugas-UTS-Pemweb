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
    <title>Update Data</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-200 font-sans p-6">
    <div class="container mx-auto">
        <!-- Header -->
        <div class="bg-gray-800 p-4 rounded-lg flex justify-between items-center shadow-md mb-6">
            <div class="flex items-center">
                <img src="foto1.jpg" alt="Avatar" class="w-16 h-16 rounded-full border-4 border-gray-200 mr-4"> <!-- Ganti URL avatar sesuai kebutuhan -->
                <h1 class="text-2xl font-bold">Apotik</h1>
            </div>
        </div>

        <!-- Form Update Data -->
        <?php
        include 'koneksi.php';
        $code_kasir = $_GET['code_kasir'];
        $data = mysqli_query($koneksi, "SELECT * FROM kasir WHERE code_kasir='$code_kasir'");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <div class="bg-gray-800 p-8 rounded-lg shadow-lg max-w-lg mx-auto">
                <h3 class="text-3xl font-semibold mb-4">Update Data Kasir</h3>
                <form method="post" action="updateKasir.php">
                    <!-- Hidden input for code_kasir -->
                    <input type="hidden" name="code_kasir" value="<?php echo htmlspecialchars($d['code_kasir']); ?>">

                    <!-- Nama -->
                    <div class="mb-4">
                        <label for="namaKasir" class="block text-lg font-medium mb-2">Nama</label>
                        <input type="text" id="namaKasir" name="namaKasir" value="<?php echo htmlspecialchars($d['namaKasir']); ?>" required class="w-full p-2 rounded bg-gray-700 text-gray-200 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-lg font-medium mb-2">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($d['email']); ?>" required class="w-full p-2 rounded bg-gray-700 text-gray-200 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <!-- No Telepon -->
                    <div class="mb-4">
                        <label for="noTelp" class="block text-lg font-medium mb-2">No Telepon</label>
                        <input type="text" id="noTelp" name="noTelp" value="<?php echo htmlspecialchars($d['noTelp']); ?>" required class="w-full p-2 rounded bg-gray-700 text-gray-200 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div class="mb-4">
                        <label for="gender" class="block text-lg font-medium mb-2">Gender</label>
                        <input type="text" id="gender" name="gender" value="<?php echo htmlspecialchars($d['gender']); ?>" required class="w-full p-2 rounded bg-gray-700 text-gray-200 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <!-- Button -->
                    <div class="text-center mt-6">                        
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded shadow">Simpan</button>
                        <a href="tampilKasir.php" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded shadow">Kembali</a>
                    </div>
                </form>
            </div>
        <?php 
        }
        ?>
    </div>
</body>
</html>