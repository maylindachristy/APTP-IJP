<?php
// Koneksi ke database
$servername = "localhost"; // Sesuaikan dengan konfigurasi database Anda
$username = "root"; // Sesuaikan dengan username database Anda
$password = ""; // Sesuaikan dengan password database Anda
$dbname = "qa_tiketpesawat"; // Sesuaikan dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Enkripsi password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert data ke database
$sql = "INSERT INTO tbl_users (username, password, role) VALUES ('$username', '$hashed_password', 'user')";

if ($conn->query($sql) === TRUE) {
    echo "Pendaftaran berhasil. Silakan <a href='login.php'>login</a>.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
