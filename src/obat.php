<?php
session_start();
require_once 'config.php';
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

// CRUD Delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM obat WHERE id_obat = $id");
    header("Location: obat.php");
    exit;
}

// Ambil data obat
$data = $conn->query("SELECT * FROM obat");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Obat</title>
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
        <h2>Data Obat</h2>

        <table border="1" cellpadding="5">
            <tr><th>ID</th><th>Nama</th><th>Stok</th><th>Harga</th><th>Aksi</th></tr>
            <?php while ($row = $data->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id_obat'] ?></td>
                    <td><?= $row['nama_obat'] ?></td>
                    <td><?= $row['stok'] ?></td>
                    <td><?= $row['harga'] ?></td>
                    <td>
                <a href="obat.php?edit=<?= $row['id_obat'] ?>" class="button">Edit</a>
                <a href="obat.php?delete=<?= $row['id_obat'] ?>" class="button" onclick="return confirm('Hapus data?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>

        <hr>
        <?php
        // Form Tambah/Edit
        $edit_data = ['nama_obat' => '', 'stok' => '', 'harga' => ''];
        if (isset($_GET['edit'])) {
            $id = intval($_GET['edit']);
            $res = $conn->query("SELECT * FROM obat WHERE id_obat = $id");
            $edit_data = $res->fetch_assoc();
        }
        ?>

        <h3><?= isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Obat</h3>
        <form method="POST" action="proses/obat_proses.php">
            <input type="hidden" name="id_obat" value="<?= $_GET['edit'] ?? '' ?>">
            <label>Nama:</label><br>
            <input type="text" name="nama_obat" value="<?= $edit_data['nama_obat'] ?>" required><br>
            <label>Stok:</label><br>
            <input type="number" name="stok" value="<?= $edit_data['stok'] ?>" required><br>
            <label>Harga:</label><br>
            <input type="number" name="harga" value="<?= $edit_data['harga'] ?>" required><br><br>
            <button type="submit"><?= isset($_GET['edit']) ? 'Update' : 'Tambah' ?></button>
        </form>

    </div>
</body>
</html>
