<?php
session_start();
require_once '../includes/conn.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM pengguna WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nama'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_peran'] = $user['peran'];
            unset($_SESSION['error']);

            if ($user['peran'] === 'admin') {
                header("Location: ../pages/admin/dashboard.php");
            } else {
                header("Location: ../index.php");
            }
            exit();
        }
    }

    // Wrong password or email
    $_SESSION['error'] = "Email atau password salah.";
    header("Location: ../login.php");
    exit();
}
