<?php
require_once __DIR__ . '/../../includes/conn.php';

$sql = "CREATE TABLE IF NOT EXISTS pengembalian (
    id_pengembalian INT AUTO_INCREMENT PRIMARY KEY,
    id_peminjaman INT,
    tanggal_dikembalikan DATE,
    denda INT DEFAULT 0,
    FOREIGN KEY (id_peminjaman) REFERENCES peminjaman(id_peminjaman),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;";

mysqli_query($conn, $sql) or die("Gagal buat table pengembalian: " . mysqli_error($conn));
echo "✔️ Table 'pengembalian' created.<br>";
