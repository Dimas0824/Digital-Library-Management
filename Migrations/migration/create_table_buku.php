<?php
require_once __DIR__ . '/../../includes/conn.php';

$sql = "CREATE TABLE IF NOT EXISTS buku (
    id_buku INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255),
    pengarang VARCHAR(100),
    penerbit VARCHAR(100),
    tahun_terbit YEAR,
    kategori VARCHAR(100),
    deskripsi TEXT,
    foto VARCHAR(255),
    stok INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;";

mysqli_query($conn, $sql) or die("Gagal buat table buku: " . mysqli_error($conn));
echo "✔️ Table 'buku' created.<br>";
