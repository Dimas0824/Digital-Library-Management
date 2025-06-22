<?php
// sidebar.php - Admin Sidebar Component
?>
<nav class="bg-dark text-white vh-100 p-3 position-fixed" style="width: 250px; top: 0; left: 0; z-index: 1000;">
    <div class="d-flex flex-column h-100">
        <!-- Header -->
        <div class="text-center mb-4 pb-3 border-bottom border-secondary">
            <h2 class="fs-4 fw-bold mb-0">Admin Panel</h2>
        </div>

        <!-- Navigation Menu -->
        <ul class="nav flex-column flex-grow-1">
            <li class="nav-item mb-2">
                <a class="nav-link text-white px-3 py-2 rounded hover-bg-secondary d-flex align-items-center"
                    href="kelola_buku.php">
                    <i class="bi bi-book me-2"></i>
                    Pengelolaan Buku
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-white px-3 py-2 rounded hover-bg-secondary d-flex align-items-center"
                    href="kelola_pengguna.php">
                    <i class="bi bi-people me-2"></i>
                    Pengelolaan Pengguna
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-white px-3 py-2 rounded hover-bg-secondary d-flex align-items-center"
                    href="kelola_peminjaman.php">
                    <i class="bi bi-arrow-left-right me-2"></i>
                    Pengelolaan Peminjaman
                </a>
            </li>
        </ul>

        <!-- Logout Button -->
        <div class="mt-auto pt-3 border-top border-secondary">
            <form action="../../process/logout.php" method="post" class="m-0">
                <button type="submit" class="btn btn-danger w-100 d-flex align-items-center justify-content-center">
                    <i class="bi bi-box-arrow-right me-2"></i>
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>

<!-- Add Bootstrap Icons CDN if not already included -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

<style>
    /* Minimal hover effect using Bootstrap utilities */
    .hover-bg-secondary:hover {
        background-color: rgba(108, 117, 125, 0.2) !important;
        transition: background-color 0.2s ease;
    }
</style>