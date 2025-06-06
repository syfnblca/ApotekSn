<?php
require_once '../config.php';

$email = $_POST['email'];

// Cek apakah email terdaftar
$sql = "SELECT * FROM user WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $token = bin2hex(random_bytes(16));
    $update = $conn->prepare("UPDATE user SET reset_token = ? WHERE email = ?");
    $update->bind_param("ss", $token, $email);
    $update->execute();

    // Untuk simulasi, tampilkan token langsung
    echo "Token reset password Anda (simulasi): <b>$token</b><br>";
    echo "<a href='../index.php'>Kembali</a>";
} else {
    echo "Email tidak ditemukan.";
}
