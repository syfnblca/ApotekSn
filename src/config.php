<?php
$host = 'db'; // karena dalam Docker Compose, nama servicenya 'db'
$user = 'root';
$pass = 'root';
$db = 'apotek';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
