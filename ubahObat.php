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
        $code_obat = $_GET['code_obat'];
        $data = mysqli_query($koneksi, "SELECT * FROM obat WHERE code_obat='$code_obat'");
        $d = mysqli_fetch_array($data);
        ?>
        
        <div class="bg-gray-800 p-8 rounded-lg shadow-lg max-w-lg mx-auto">
            <h3 class="text-3xl font-semibold mb-4">Update Data Obat</h3>
            <form method="post" action="updateObat.php">
                <!-- Hidden input for code_obat -->
                <input type="hidden" name="code_obat" value="<?php echo htmlspecialchars($d['code_obat']); ?>">

                <!-- Nama Obat -->
                <div class="mb-4">
                    <label for="namaObat" class="block text-lg font-medium mb-2">Nama Obat</label>
                    <input type="text" id="namaObat" name="namaObat" value="<?php echo htmlspecialchars($d['namaObat']); ?>" required class="w-full p-2 rounded bg-gray-700 text-gray-200 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Dosis -->
                <div class="mb-4">
                    <label for="dosis" class="block text-lg font-medium mb-2">Dosis</label>
                    <input type="text" id="dosis" name="dosis" value="<?php echo htmlspecialchars($d['dosis']); ?>" required class="w-full p-2 rounded bg-gray-700 text-gray-200 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Pabrik Dropdown -->
                <div class="mb-4">
                    <label for="code_pabrik" class="block text-lg font-medium mb-2">Pabrik</label>
                    <select name="code_pabrik" id="code_pabrik" required class="w-full p-2 rounded bg-gray-700 text-gray-200 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">Pilih Pabrik</option>
                        <?php
                        $pabrik_result = mysqli_query($koneksi, "SELECT code_pabrik, NamaPabrik FROM pabrikobat");
                        while ($pabrik = mysqli_fetch_assoc($pabrik_result)) {
                            // Set selected option if code_pabrik matches
                            $selected = ($pabrik['code_pabrik'] == $d['code_pabrik']) ? 'selected' : '';
                            echo "<option value='{$pabrik['code_pabrik']}' $selected>{$pabrik['NamaPabrik']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="text-center mt-6">                        
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded shadow">Simpan</button>
                    <a href="tampilObat.php" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded shadow">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
