<?php
require_once '../../process/dashboardAdmin.php';

// Include sidebar (pastikan path benar)
include_once '../../includes/sidebar.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Perpustakaan</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
</head>

<body class="bg-light">
    <div class="main-content" style="margin-left: 250px; min-height: 100vh;">
        <div class="container-fluid p-4">
            <!-- Header -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="h2 mb-0 text-dark">Dashboard Admin</h1>
                            <p class="text-muted mb-0">Selamat datang di panel administrasi perpustakaan</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="row g-4 mb-4">
                <!-- Total Buku -->
                <div class="col-xl-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 stats-card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="text-xs fw-bold text-primary text-uppercase mb-1">
                                        Total Buku
                                    </div>
                                    <div class="number-display text-primary">
                                        <?= number_format($dashboardData['total_books']); ?>
                                    </div>
                                    <p class="text-muted small mb-0">Koleksi buku perpustakaan</p>
                                </div>
                                <div class="col-auto">
                                    <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                                        <i class="bi bi-book fs-1 text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-primary bg-opacity-10 border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <small class="text-primary fw-bold">
                                        <i class="bi bi-arrow-right me-1"></i> Kelola Buku
                                    </small>
                                </div>
                                <div class="col-auto">
                                    <a href="kelola_buku.php" class="btn btn-sm btn-primary rounded-pill">
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Pengguna -->
                <div class="col-xl-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 stats-card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="text-xs fw-bold text-success text-uppercase mb-1">
                                        Total Pengguna
                                    </div>
                                    <div class="number-display text-success">
                                        <?= number_format($dashboardData['total_users']); ?>
                                    </div>
                                    <p class="text-muted small mb-0">Anggota terdaftar</p>
                                </div>
                                <div class="col-auto">
                                    <div class="bg-success bg-opacity-10 rounded-circle p-3">
                                        <i class="bi bi-people fs-1 text-success"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-success bg-opacity-10 border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <small class="text-success fw-bold">
                                        <i class="bi bi-arrow-right me-1"></i> Kelola Pengguna
                                    </small>
                                </div>
                                <div class="col-auto">
                                    <a href="kelola_pengguna.php" class="btn btn-sm btn-success rounded-pill">
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Transaksi -->
                <div class="col-xl-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 stats-card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="text-xs fw-bold text-warning text-uppercase mb-1">
                                        Total Transaksi
                                    </div>
                                    <div class="number-display text-warning">
                                        <?= number_format($dashboardData['total_transactions']); ?>
                                    </div>
                                    <p class="text-muted small mb-0">Peminjaman & pengembalian</p>
                                </div>
                                <div class="col-auto">
                                    <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                                        <i class="bi bi-arrow-left-right fs-1 text-warning"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-warning bg-opacity-10 border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <small class="text-warning fw-bold">
                                        <i class="bi bi-arrow-right me-1"></i> Kelola Peminjaman
                                    </small>
                                </div>
                                <div class="col-auto">
                                    <a href="kelola_peminjaman.php" class="btn btn-sm btn-warning rounded-pill">
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status Quick Info -->
            <?php if ($dashboardData['total_books'] > 0 || $dashboardData['total_users'] > 0 || $dashboardData['total_transactions'] > 0): ?>
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="alert alert-info border-0" role="alert">
                            <i class="bi bi-info-circle me-2"></i>
                            <strong>Status Sistem:</strong> Database berhasil terhubung dan data tersedia.
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="alert alert-warning border-0" role="alert">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            <strong>Perhatian:</strong> Tidak ada data atau koneksi database bermasalah.
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Aksi Cepat -->
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-0">
                            <h5 class="card-title mb-0">
                                <i class="bi bi-lightning-charge me-2 text-warning"></i>
                                Aksi Cepat
                            </h5>
                            <p class="text-muted small mb-0">Akses cepat ke fitur utama sistem</p>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-lg-3 col-md-6">
                                    <a href="kelola_buku.php"
                                        class="btn btn-outline-primary w-100 py-3 quick-action-btn">
                                        <i class="bi bi-plus-circle me-2"></i>
                                        <br>
                                        <strong>Tambah Buku</strong>
                                        <br>
                                        <small>Tambah koleksi baru</small>
                                    </a>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <a href="kelola_pengguna.php"
                                        class="btn btn-outline-success w-100 py-3 quick-action-btn">
                                        <i class="bi bi-person-plus me-2"></i>
                                        <br>
                                        <strong>Tambah Pengguna</strong>
                                        <br>
                                        <small>Daftarkan anggota baru</small>
                                    </a>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <a href="kelola_peminjaman.php"
                                        class="btn btn-outline-warning w-100 py-3 quick-action-btn">
                                        <i class="bi bi-clipboard-check me-2"></i>
                                        <br>
                                        <strong>Kelola Peminjaman</strong>
                                        <br>
                                        <small>Proses transaksi</small>
                                    </a>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <a href="laporan.php" class="btn btn-outline-info w-100 py-3 quick-action-btn">
                                        <i class="bi bi-file-earmark-text me-2"></i>
                                        <br>
                                        <strong>Laporan</strong>
                                        <br>
                                        <small>Lihat statistik detail</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>