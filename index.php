<?php
require_once 'process/index.php';
require_once 'includes/header.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Digital Library - Modern & Elegan</title>
    <link rel="stylesheet" href="assets/css/global.css" />
</head>

<body>
    <section id="home" class="text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <i class="bi bi-book-half display-1 text-primary mb-4"></i>
                    <h1 class="display-4 fw-bold mb-3">
                        Selamat Datang di <span class="text-primary">Digital Library</span>
                    </h1>
                    <p class="lead section-subtitle mb-4">
                        Temukan dan baca buku digital favorit Anda dengan mudah dan cepat.
                    </p>
                    <a href="#book-list" class="btn btn-primary btn-lg">
                        <i class="bi bi-collection me-2"></i>Jelajahi Koleksi
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="book-list">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8">
                    <h2 class="section-title text-center">Cari Buku Favorit Anda</h2>
                    <p class="section-subtitle text-center mb-4">Gunakan judul atau nama pengarang untuk menemukan buku
                        yang Anda inginkan.</p>
                    <form action="buku.php" method="get" class="search-form">
                        <div class="input-group input-group-lg shadow-sm">
                            <span class="input-group-text bg-white">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" name="cari" class="form-control" placeholder="Contoh: Laskar Pelangi..."
                                required>
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <?php if (!empty($buku)): ?>
                    <?php foreach (array_slice($buku, 0, 6) as $item): // Menampilkan 6 buku saja untuk halaman utama ?>
                        <?php if (isset($item['id'], $item['judul'], $item['pengarang'])): ?>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100 book-card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-2"><?= htmlspecialchars($item['judul']) ?></h5>
                                        <p class="card-text text-muted">
                                            <i class="bi bi-person-fill me-2"></i><?= htmlspecialchars($item['pengarang']) ?>
                                        </p>
                                    </div>
                                    <div class="card-footer p-3">
                                        <a href="pages/user/detail_buku.php?id=<?= urlencode($item['id']) ?>"
                                            class="btn btn-outline-primary btn-sm btn-detail">
                                            <i class="bi bi-eye-fill me-2"></i>Lihat Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12">
                        <div class="card border-0">
                            <div class="card-body text-center py-5">
                                <i class="bi bi-journal-x display-3 text-muted mb-4"></i>
                                <h4 class="text-muted">Belum Ada Buku Tersedia</h4>
                                <p class="text-secondary">Silakan kembali lagi nanti untuk melihat koleksi terbaru kami.</p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section id="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="section-title">Tentang Digital Library</h2>
                    <p class="lead section-subtitle mb-5">
                        Kami berkomitmen untuk menyediakan akses mudah ke berbagai koleksi buku digital berkualitas
                        untuk semua kalangan.
                    </p>
                </div>
            </div>
            <div class="row g-4 text-center">
                <div class="col-md-4">
                    <div class="p-4">
                        <i class="bi bi-lightning-charge-fill display-4 text-primary mb-3"></i>
                        <h5 class="fw-bold">Akses Cepat</h5>
                        <p class="text-muted small">Temukan buku yang Anda cari dalam hitungan detik.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4">
                        <i class="bi bi-phone-fill display-4 text-primary mb-3"></i>
                        <h5 class="fw-bold">Desain Responsif</h5>
                        <p class="text-muted small">Akses perpustakaan dari desktop, tablet, maupun ponsel Anda.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4">
                        <i class="bi bi-bookmark-fill display-4 text-primary mb-3"></i>
                        <h5 class="fw-bold">Koleksi Terpercaya</h5>
                        <p class="text-muted small">Nikmati koleksi buku berkualitas yang terus kami perbarui.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="cta">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="card p-4 p-md-5">
                        <div class="card-body">
                            <h3 class="fw-bold text-primary mb-3">Mulai Membaca Sekarang!</h3>
                            <p class="text-secondary mb-4">Bergabunglah dengan ribuan pembaca lainnya dan nikmati
                                pengalaman membaca digital yang modern dan tak terlupakan.</p>
                            <a href="#book-list" class="btn btn-primary btn-lg">
                                Jelajahi Buku
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once 'includes/footer.php'; ?>
</body>

</html>