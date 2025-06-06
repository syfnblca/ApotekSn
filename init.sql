
-- Membuat database dan memilihnya
CREATE DATABASE IF NOT EXISTS apotek;
USE apotek;

-- Tabel user
CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(100),
    email VARCHAR(100),
    reset_token VARCHAR(100),
    nama_lengkap VARCHAR(100),
    jabatan VARCHAR(50),
    nomor_telepon VARCHAR(20)
);

INSERT INTO user (id, username, password, email, reset_token, nama_lengkap, jabatan, nomor_telepon) VALUES
(1, 'admin', 'admin', NULL, NULL, NULL, NULL, NULL),
(2, 'petugas1', '12345', 'petugas1@example.com', NULL, 'Budi Santoso', 'Petugas', '081234567890'),
(3, 'admin1', 'admin', 'ssyfnblca@gmail.com', NULL, 'Syafa Nabila', NULL, NULL);

-- Tabel obat
CREATE TABLE IF NOT EXISTS obat (
    id_obat INT AUTO_INCREMENT PRIMARY KEY,
    nama_obat VARCHAR(100),
    stok INT,
    harga DECIMAL(10,2)
);

INSERT INTO obat (id_obat, nama_obat, stok, harga) VALUES
(1, 'Paracetamol', 98, 5000),
(2, 'Ibuprofen', 50, 3000),
(3, 'Aspirin', 1000, 3000);

-- Tabel transaksi
CREATE TABLE IF NOT EXISTS transaksi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_obat INT,
    jumlah INT,
    total_harga DECIMAL(10,2),
    tanggal DATETIME
);

INSERT INTO transaksi (id, id_obat, jumlah, total_harga, tanggal) VALUES
(1, 1, 2, 10000, '2025-05-26 09:48:27'),
(2, 1, 2, 10000, '2025-05-26 10:20:12');
