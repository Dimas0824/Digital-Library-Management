<?php
require_once __DIR__ . '/../../includes/conn.php';

$sql = "CREATE TABLE IF NOT EXISTS peminjaman (
    id_peminjaman INT AUTO_INCREMENT PRIMARY KEY,
    id_pengguna INT,
    id_buku INT,
    tanggal_pinjam DATE,
    tanggal_kembali DATE,
    status ENUM('dipinjam', 'dikembalikan', 'terlambat') DEFAULT 'dipinjam',
    FOREIGN KEY (id_pengguna) REFERENCES pengguna(id),
    FOREIGN KEY (id_buku) REFERENCES buku(id_buku),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;";

mysqli_query($conn, $sql) or die("Gagal buat table peminjaman: " . mysqli_error($conn));
echo "✔️ Table 'peminjaman' created.<br>";
