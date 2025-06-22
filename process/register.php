<?php
include_once __DIR__ . '/../includes/conn.php';

if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password === $confirm_password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Simpan data pengguna baru ke database
        $sql = "INSERT INTO pengguna (nama, email, peran, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $peran = 'user'; // Set default role
        $stmt->bind_param("ssss", $nama, $email, $peran, $hashed_password);

        if ($stmt->execute()) {
            // Pendaftaran berhasil
            header("Location: ../index.php");
            exit();
        } else {
            // Pendaftaran gagal
            $error = "Terjadi kesalahan. Silakan coba lagi.";
        }
    } else {
        $error = "Konfirmasi password tidak cocok.";
    }
}