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
                <img src="foto1.jpg" alt="Avatar" class="w-16 h-16 rounded-full border-4 border-gray-200 mr-4">
                <h1 class="text-2xl font-bold">Apotik</h1>
            </div>
        </div>

        <!-- Form Update Data -->
        <?php
        include 'koneksi.php';
        $code_resep = $_GET['code_resep'];
        $data = mysqli_query($koneksi, "SELECT * FROM resep WHERE code_resep='$code_resep'");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <div class="bg-gray-800 p-8 rounded-lg shadow-lg max-w-lg mx-auto">
                <h3 class="text-3xl font-semibold mb-4">Update Data Resep</h3>
                <form method="post" action="updateResep.php">
                    <!-- Hidden input for code_resep -->
                    <input type="hidden" name="code_resep" value="<?php echo htmlspecialchars($d['code_resep']); ?>">

                    <div class="mb-4">
                        <label for="tglPembuatan" class="block text-lg font-medium mb-2">Tanggal Pembuatan</label>
                        <input type="date" id="tglPembuatan" name="tglPembuatan" value="<?php echo htmlspecialchars($d['tglPembuatan']); ?>" required class="w-full p-2 rounded bg-gray-700 text-gray-200 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div class="mb-4">
                        <label for="deskripsi" class="block text-lg font-medium mb-2">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" rows="5" required class="w-full p-2 rounded bg-gray-700 text-gray-200 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500"><?php echo htmlspecialchars($d['deskripsi']); ?></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="code_dokter" class="block text-lg font-medium mb-2">Dokter</label>
                        <select name="code_dokter" id="code_dokter" required class="w-full p-2 rounded bg-gray-700 text-gray-200 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="">Pilih Dokter</option>
                            <?php
                            $dokter_result = mysqli_query($koneksi, "SELECT code_dokter, namaDokter FROM dokter");
                            while ($dokter = mysqli_fetch_assoc($dokter_result)) {
                                // Set selected option if code_dokter matches
                                $selected = ($dokter['code_dokter'] == $d['code_dokter']) ? 'selected' : '';
                                echo "<option value='{$dokter['code_dokter']}' $selected>{$dokter['namaDokter']}</option>";
                            }
                            ?>
                        </select>                    
                    </div>

                    <div class="mb-4">
                        <label for="code_obat" class="block text-lg font-medium mb-2">Obat</label>
                            <select name="code_obat" id="code_obat" required class="w-full p-2 rounded bg-gray-700 text-gray-200 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="">Pilih Obat</option>
                            <?php
                            $obat_result = mysqli_query($koneksi, "SELECT code_obat, namaObat FROM obat");
                            while ($obat = mysqli_fetch_assoc($obat_result)) {
                                // Set selected option if code_obat matches
                                $selected = ($obat['code_obat'] == $d['code_obat']) ? 'selected' : '';
                                echo "<option value='{$obat['code_obat']}' $selected>{$obat['namaObat']}</option>";
                            }
                            ?>
                        </select>                    
                    </div>

                    <div class="mb-4">
                        <label for="code_apoteker" class="block text-lg font-medium mb-2">Apoteker</label>
                            <select name="code_apoteker" id="code_apoteker" required class="w-full p-2 rounded bg-gray-700 text-gray-200 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="">Pilih Apoteker</option>
                            <?php
                            $apoteker_result = mysqli_query($koneksi, "SELECT code_apoteker, namaApoteker FROM apoteker");
                            while ($apoteker = mysqli_fetch_assoc($apoteker_result)) {
                                // Set selected option if code_apoteker matches
                                $selected = ($apoteker['code_apoteker'] == $d['code_apoteker']) ? 'selected' : '';
                                echo "<option value='{$apoteker['code_apoteker']}' $selected>{$apoteker['namaApoteker']}</option>";
                            }
                            ?>
                        </select>                    
                    </div>

                    <div class="mb-4">
                        <label for="code_pasien" class="block text-lg font-medium mb-2">Pasien</label>
                            <select name="code_pasien" id="code_pasien" required class="w-full p-2 rounded bg-gray-700 text-gray-200 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="">Pilih Pasien</option>
                            <?php
                            $pasien_result = mysqli_query($koneksi, "SELECT code_pasien, namaPasien FROM pasien");
                            while ($pasien = mysqli_fetch_assoc($pasien_result)) {
                                // Set selected option if code_pasien matches
                                $selected = ($pasien['code_pasien'] == $d['code_pasien']) ? 'selected' : '';
                                echo "<option value='{$pasien['code_pasien']}' $selected>{$pasien['namaPasien']}</option>";
                            }
                            ?>
                        </select>                    
                    </div>
                    <!-- Button -->
                    <div class="text-center mt-6">                        
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded shadow">Simpan</button>
                        <a href="tampilResep.php" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded shadow">Kembali</a>
                    </div>
                </form>
            </div>
        <?php 
        }
        ?>
    </div>
</body>
</html>
