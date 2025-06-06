<?php
require_once '../config.php';

$id = $_POST['id_obat'];
$nama = $_POST['nama_obat'];
$stok = $_POST['stok'];
$harga = $_POST['harga'];

if ($id) {
    $stmt = $conn->prepare("UPDATE obat SET nama_obat=?, stok=?, harga=? WHERE id_obat=?");
    $stmt->bind_param("sidi", $nama, $stok, $harga, $id);
} else {
    $stmt = $conn->prepare("INSERT INTO obat (nama_obat, stok, harga) VALUES (?, ?, ?)");
    $stmt->bind_param("sid", $nama, $stok, $harga);
}

if ($stmt->execute()) {
    header("Location: ../obat.php");
} else {
    echo "Gagal simpan data";
}
