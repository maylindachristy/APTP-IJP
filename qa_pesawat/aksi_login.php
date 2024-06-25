<?php
session_start();

// Koneksi ke database
$servername = "localhost"; // Sesuaikan dengan konfigurasi database Anda
$db_username = "root"; // Sesuaikan dengan username database Anda
$db_password = ""; // Sesuaikan dengan password database Anda
$dbname = "qa_tiketpesawat"; // Sesuaikan dengan nama database Anda

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Periksa apakah login dengan username dan password admin default
if ($username == "admin" && $password == "admin") {
    $_SESSION['username'] = $username;
    $_SESSION['role'] = "admin";
    header('Location: index.php');
    exit();
}

// Query untuk mendapatkan data user berdasarkan username atau email
$sql = "SELECT * FROM tbl_users WHERE username='$username' OR email='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Verifikasi password
    if (password_verify($password, $user['password'])) {
        // Set session
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Redirect berdasarkan role
        if ($user['role'] == 'admin') {
            header('Location: index.php');
        } else {
            header('Location: jadwal.php');
        }
        exit();
    } else {
        header('Location: login.php?login_error=1');
    }
} else {
    header('Location: login.php?login_error=1');
}

$conn->close();
?>
