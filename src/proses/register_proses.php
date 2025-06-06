<?php
require_once '../config.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$nama_lengkap = $_POST['nama_lengkap'];
$jabatan = $_POST['jabatan'];
$nomor_telepon = $_POST['nomor_telepon'];

// Validasi sederhana: username unik
$cek = $conn->prepare("SELECT * FROM user WHERE username = ?");
$cek->bind_param("s", $username);
$cek->execute();
$result = $cek->get_result();

if ($result->num_rows > 0) {
    echo "Username sudah digunakan.";
    exit;
}

// Insert user
$sql = "INSERT INTO user (username, password, email, nama_lengkap, jabatan, nomor_telepon) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $username, $password, $email, $nama_lengkap, $jabatan, $nomor_telepon);
if ($stmt->execute()) {
    echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href = '../index.php';</script>";
    exit;
} else {
    echo "Gagal registrasi: " . $stmt->error;
}
