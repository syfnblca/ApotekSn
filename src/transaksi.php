<?php
session_start();
require_once 'config.php';
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$obat = $conn->query("SELECT * FROM obat");
$transaksi = $conn->query("SELECT t.*, o.nama_obat FROM transaksi t JOIN obat o ON t.id_obat = o.id_obat ORDER BY t.tanggal DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transaksi</title>
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
        <h2>Form Transaksi</h2>
        <form method="POST" action="proses/transaksi_proses.php">
            <label>Nama Obat:</label><br>
            <select name="id_obat" required>
                <?php while ($o = $obat->fetch_assoc()): ?>
                    <option value="<?= $o['id_obat'] ?>"><?= $o['nama_obat'] ?> (Stok: <?= $o['stok'] ?>)</option>
                <?php endwhile; ?>
            </select><br><br>

            <label>Jumlah:</label><br>
            <input type="number" name="jumlah" min="1" required><br><br>
            
            <button type="submit">Simpan Transaksi</button>
        </form>

        <h2>Riwayat Transaksi</h2>
        <table border="1" cellpadding="5">
            <tr><th>Tanggal</th><th>Obat</th><th>Jumlah</th><th>Total Harga</th></tr>
            <?php while ($t = $transaksi->fetch_assoc()): ?>
                <tr>
                    <td><?= $t['tanggal'] ?></td>
                    <td><?= $t['nama_obat'] ?></td>
                    <td><?= $t['jumlah'] ?></td>
                    <td><?= $t['total_harga'] ?></td>
                </tr>
            <?php endwhile; ?>
        </table>

    </div>
</body>
</html>
