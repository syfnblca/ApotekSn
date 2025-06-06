<?php
require_once '../config.php';

$id_obat = $_POST['id_obat'];
$jumlah = $_POST['jumlah'];

// Cek harga dan stok
$obat = $conn->query("SELECT * FROM obat WHERE id_obat = $id_obat")->fetch_assoc();
$harga = $obat['harga'];
$stok = $obat['stok'];

if ($jumlah > $stok) {
    echo "Stok tidak mencukupi!";
    exit;
}

$total = $harga * $jumlah;
$tanggal = date("Y-m-d H:i:s");

// Simpan transaksi
$stmt = $conn->prepare("INSERT INTO transaksi (id_obat, jumlah, total_harga, tanggal) VALUES (?, ?, ?, ?)");
$stmt->bind_param("iids", $id_obat, $jumlah, $total, $tanggal);
$stmt->execute();

// Update stok
$conn->query("UPDATE obat SET stok = stok - $jumlah WHERE id_obat = $id_obat");

header("Location: ../transaksi.php");
