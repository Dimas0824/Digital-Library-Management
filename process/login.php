<?php
session_start();
require_once '../includes/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    // Bersihkan input dari spasi dan karakter tak perlu
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password']; // Password tidak disanitasi karena akan digunakan dalam hash check

    // Validasi input kosong
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Email dan password tidak boleh kosong.";
        header("Location: ../pages/user/login.php");
        exit();
    }

    // Validasi format email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Format email tidak valid.";
        header("Location: ../pages/user/login.php");
        exit();
    }

    $stmt = $conn->prepare("SELECT * FROM pengguna WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Login berhasil
            $_SESSION['user_id'] = (int) $user['id'];
            $_SESSION['user_name'] = htmlspecialchars($user['nama'], ENT_QUOTES, 'UTF-8');
            $_SESSION['user_email'] = htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8');
            $_SESSION['user_peran'] = $user['peran'];

            unset($_SESSION['error']);

            // Redirect berdasarkan peran
            if ($user['peran'] === 'admin') {
                header("Location: ../pages/admin/dashboard.php");
            } else {
                header("Location: ../index.php");
            }
            exit();
        }
    }

    // Cek apakah email ditemukan atau password salah
    $_SESSION['error'] = ($result->num_rows === 0)
        ? "Email belum terdaftar. Silakan daftar terlebih dahulu."
        : "Password salah.";
    header("Location: ../pages/user/login.php");
    exit();
}

// Jika tidak ada POST data, redirect ke halaman login
header("Location: ../pages/user/login.php");
exit();
?>