<?php
session_start();
require_once '../config.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Langsung bandingkan karena password tidak di-hash
    if ($user['password'] === $password) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: ../dashboard.php");
        exit;
    } else {
        $_SESSION['error'] = "Password salah.";
        header("Location: ../index.php");
        exit;
    }
} else {
    $_SESSION['error'] = "Username tidak ditemukan.";
    header("Location: ../index.php");
    exit;
}
