<?php 
session_start();
include 'koneksi.php'; // Koneksi ke database

// Cek apakah user sudah login
if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
    $redirectPage = isset($_SESSION['last_visited']) ? $_SESSION['last_visited'] : 'dashboard.php';
    header("Location: $redirectPage");
    exit();
}

// Cek apakah form login sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Ambil data dari database
    $query = "SELECT * FROM auth_login WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);
    $user = mysqli_fetch_assoc($result);

    // Jika user ditemukan di database
    if ($user) {
        // Simpan data ke session
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['status'] = "login";
        
        // Redirect ke halaman terakhir dikunjungi atau dashboard
        $redirectPage = isset($_SESSION['last_visited']) ? $_SESSION['last_visited'] : 'dashboard.php';
        header("Location: $redirectPage");
        exit();
    } else {
        // Jika login gagal
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form with Light Button</title>
    <style>
        /* Full height untuk memastikan background gradient mencakup seluruh layar */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: linear-gradient(#141e30, #2a6c56);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Styling box login */
        .login-box {
            width: 400px;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            border-radius: 8px;
            color: white;
            text-align: center;
        }

        /* Styling input field */
        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
        }

        /* Placeholder color */
        .login-box input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        /* Styling tombol login */
        .login-box button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background: #ffffff;
            color: #2a6c56;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        /* Hover efek untuk tombol login */
        .login-box button:hover {
            background: #e0e0e0;
        }

        /* Styling judul */
        .login-box h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #ffffff;
        }

        /* Styling pesan error */
        .error {
            color: #ff4d4d;
            margin-top: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="login-box">
        <h2>Login</h2>
        <form action="formlogin.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <?php if (isset($error)): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
        </form>
    </div>

</body>
</html>
