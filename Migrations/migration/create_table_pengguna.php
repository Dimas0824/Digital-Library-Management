<?php
require_once __DIR__ . '/../../includes/conn.php';

$sql = "CREATE TABLE IF NOT EXISTS pengguna (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    peran ENUM('admin', 'user') DEFAULT 'user',
    tanggal_daftar DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;";

if (mysqli_query($conn, $sql)) {
    echo "✔️ Table 'pengguna' created.\n";
} else {
    echo "❌ Gagal membuat table 'pengguna': " . mysqli_error($conn) . "\n";
}
