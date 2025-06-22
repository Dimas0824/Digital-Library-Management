<?php
// Perbaikan path untuk conn.php
require_once __DIR__ . '/../includes/conn.php';

// Fungsi untuk mengambil data dashboard
function getDashboardData($conn)
{
    $dashboardData = array();

    try {
        // Query untuk menghitung total buku
        $sql_books = "SELECT COUNT(*) as total FROM books";
        $result_books = $conn->query($sql_books);
        $dashboardData['total_books'] = $result_books ? $result_books->fetch_assoc()['total'] : 0;

        // Query untuk menghitung total pengguna
        $sql_users = "SELECT COUNT(*) as total FROM users";
        $result_users = $conn->query($sql_users);
        $dashboardData['total_users'] = $result_users ? $result_users->fetch_assoc()['total'] : 0;

        // Query untuk menghitung total transaksi/peminjaman
        $sql_transactions = "SELECT COUNT(*) as total FROM transactions";
        $result_transactions = $conn->query($sql_transactions);
        $dashboardData['total_transactions'] = $result_transactions ? $result_transactions->fetch_assoc()['total'] : 0;

    } catch (Exception $e) {
        // Jika terjadi error, set nilai default
        $dashboardData['total_books'] = 0;
        $dashboardData['total_users'] = 0;
        $dashboardData['total_transactions'] = 0;

        // Log error (opsional)
        error_log("Dashboard Error: " . $e->getMessage());
    }

    return $dashboardData;
}

// Cek apakah koneksi database tersedia
if (isset($conn)) {
    $dashboardData = getDashboardData($conn);
} else {
    // Jika koneksi tidak tersedia, set nilai default
    $dashboardData = array(
        'total_books' => 0,
        'total_users' => 0,
        'total_transactions' => 0
    );
}
?>