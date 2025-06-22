<?php
require_once __DIR__ . '/../../includes/conn.php';

$password = password_hash("admin123", PASSWORD_DEFAULT);

$sql = "INSERT INTO pengguna (nama, email, password, peran, tanggal_daftar) VALUES
    ('Admin', 'admin@local.com', '$password', 'admin', CURDATE()),
    ('User1', 'user1@local.com', '$password', 'user', CURDATE())
    ON DUPLICATE KEY UPDATE email=email;";

if (mysqli_query($conn, $sql)) {
    echo "✔️ Seeder 'pengguna' berhasil.\n";
} else {
    echo "❌ Gagal seeding 'pengguna': " . mysqli_error($conn) . "\n";
}
