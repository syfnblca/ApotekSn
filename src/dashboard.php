<?php
session_start();
require_once 'config.php';
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

// Ambil data statistik
$total_obat = $conn->query("SELECT COUNT(*) AS total FROM obat")->fetch_assoc()['total'];
$total_stok = $conn->query("SELECT SUM(stok) AS total FROM obat")->fetch_assoc()['total'];
$total_transaksi = $conn->query("SELECT COUNT(*) AS total FROM transaksi")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <a href="dashboard.php" class="logo">ApotekKu</a>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="obat.php">Kelola Obat</a></li>
            <li><a href="transaksi.php">Transaksi</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="container">
        <h2>Selamat datang, <?= $_SESSION['username'] ?></h2>

        <div class="stats-container">
            <div class="stat-box">
                <p><strong>Total Jenis Obat:</strong> <?= $total_obat ?></p>
            </div>
            <div class="stat-box">
                <p><strong>Total Stok Obat:</strong> <?= $total_stok ?></p>
            </div>
            <div class="stat-box">
                <p><strong>Total Transaksi:</strong> <?= $total_transaksi ?></p>
            </div>
        </div>

    </div>
</body>
</html>
