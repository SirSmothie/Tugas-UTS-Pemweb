<?php 
session_start();
include 'koneksi.php';

// Cek status login
$_SESSION['last_visited'] = $_SERVER['REQUEST_URI'];
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("Location: formlogin.php");
    exit();
}

// Retrieve user session information
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'guest';

// Retrieve patient or medicine code
$code_pasien = isset($_GET['code_pasien']) ? $_GET['code_pasien'] : null;
$code_obat = isset($_GET['code_obat']) ? $_GET['code_obat'] : null;

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code_pasien = $_POST['code_pasien'] ?? null;
    $code_obat = $_POST['code_obat'] ?? null;
    $rating = $_POST['rating'];
    $review_text = $_POST['review_text'];
    $tglreview = date('Y-m-d');

    // Insert the review
    $stmt = $koneksi->prepare("INSERT INTO reviews (code_pasien, code_obat, rating, review_text, tglreview) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $code_pasien, $code_obat, $rating, $review_text, $tglreview);
    if ($stmt->execute()) {
        echo "<script>alert('Thank you for your review!'); window.location.href = 'dashboard.php';</script>";
    } else {
        echo "<script>alert('Failed to submit review. Please try again.');</script>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Review</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-gray-200 font-sans">
    <div class="container mx-auto max-w-lg p-8">
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold text-center mb-6 text-indigo-400">Customer Feedback</h2>

            <!-- Review Form -->
            <form action="" method="post">
                <input type="hidden" name="code_pasien" value="<?php echo htmlspecialchars($code_pasien); ?>">
                <input type="hidden" name="code_obat" value="<?php echo htmlspecialchars($code_obat); ?>">

                <!-- Rating Section -->
                <div class="mb-6">
                    <label for="rating" class="block text-lg font-medium mb-3 text-gray-300">Rating</label>
                    <div class="flex justify-center space-x-2">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <label class="cursor-pointer">
                                <input type="radio" name="rating" value="<?php echo $i; ?>" required class="hidden">
                                <span class="text-3xl text-yellow-400 hover:text-yellow-500">&#9733;</span>
                            </label>
                        <?php endfor; ?>
                    </div>
                </div>

                <!-- Review Text Section -->
                <div class="mb-6">
                    <label for="review_text" class="block text-lg font-medium mb-2 text-gray-300">Review</label>
                    <textarea name="review_text" id="review_text" rows="4" required class="w-full p-4 rounded bg-gray-700 text-gray-200 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Write your feedback here..."></textarea>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-between items-center">
                    <a href="dashboard.php" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-6 rounded-lg shadow">Cancel</a>
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-lg shadow">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
