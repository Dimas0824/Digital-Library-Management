<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content="Digital Library - Perpustakaan digital modern dengan koleksi buku berkualitas tinggi">
    <meta name="keywords" content="perpustakaan digital, buku online, e-book, library, digital books">
    <title>Digital Library - Modern & Elegan</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/global.css" />
</head>

<body>
    <?php include_once 'includes/header.php'; ?>

    <!-- Hero Section -->
    <section id="home" class="hero-section text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Animated Icon -->
                    <div class="hero-icon mb-4">
                        <i class="bi bi-book-half display-1 text-primary"></i>
                        <div class="floating-books">
                            <i class="bi bi-book floating-book-1"></i>
                            <i class="bi bi-journal floating-book-2"></i>
                            <i class="bi bi-newspaper floating-book-3"></i>
                        </div>
                    </div>

                    <!-- Main Heading -->
                    <h1 class="display-3 fw-bold mb-4 hero-title">
                        Selamat Datang di <span class="text-primary">Digital Library</span>
                    </h1>

                    <!-- Subtitle -->
                    <p class="lead section-subtitle mb-5">
                        Jelajahi dunia pengetahuan tanpa batas dengan koleksi buku digital terlengkap.
                        Temukan, baca, dan nikmati pengalaman membaca yang tak terlupakan.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="hero-buttons">
                        <a href="#book-list" class="btn btn-primary btn-lg me-3 mb-3">
                            <i class="bi bi-collection me-2"></i>Jelajahi Koleksi
                        </a>
                        <a href="#about" class="btn btn-outline-primary btn-lg mb-3">
                            <i class="bi bi-info-circle me-2"></i>Pelajari Lebih Lanjut
                        </a>
                    </div>

                    <!-- Stats Section -->
                    <div class="row mt-5 hero-stats">
                        <div class="col-md-4">
                            <div class="stat-item">
                                <h3 class="stat-number">1000+</h3>
                                <p class="stat-label">Buku Digital</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="stat-item">
                                <h3 class="stat-number">50+</h3>
                                <p class="stat-label">Kategori</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="stat-item">
                                <h3 class="stat-number">24/7</h3>
                                <p class="stat-label">Akses</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="scroll-indicator">
            <a href="#book-list" class="scroll-down">
                <i class="bi bi-chevron-down"></i>
            </a>
        </div>
    </section>

    <!-- Search & Book List Section -->
    <section id="book-list" class="book-section">
        <div class="container">
            <!-- Search Header -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-10">
                    <div class="search-header text-center mb-5">
                        <h2 class="section-title">Temukan Buku Favorit Anda</h2>
                        <p class="section-subtitle">
                            Gunakan pencarian cerdas kami untuk menemukan buku berdasarkan judul,
                            pengarang, atau kata kunci lainnya.
                        </p>
                    </div>

                    <!-- Enhanced Search Form -->
                    <form action="buku.php" method="get" class="search-form">
                        <div class="search-container">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" name="cari" class="form-control search-input"
                                    placeholder="Masukkan judul buku, nama pengarang, atau kata kunci..."
                                    autocomplete="off" required>
                                <button type="submit" class="btn btn-primary search-btn">
                                    <i class="bi bi-search me-2"></i>Cari Buku
                                </button>
                            </div>

                            <!-- Search Suggestions (could be populated with JavaScript) -->
                            <div class="search-suggestions d-none">
                                <div class="suggestion-item">
                                    <i class="bi bi-clock-history me-2"></i>Laskar Pelangi
                                </div>
                                <div class="suggestion-item">
                                    <i class="bi bi-clock-history me-2"></i>Harry Potter
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Book Cards Grid -->
            <div class="books-grid">
                <div class="row g-4">
                    <!-- Book Cards (Enhanced with more details) -->
                    <!-- Example book cards with dummy data -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 book-card">
                            <div class="card-body">
                                <div class="book-meta mb-2">
                                    <span class="badge bg-primary">Novel</span>
                                    <span class="rating ms-2">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <span class="rating-text">4.8</span>
                                    </span>
                                </div>
                                <h5 class="card-title">Laskar Pelangi</h5>
                                <p class="card-text author">
                                    <i class="bi bi-person-fill me-2"></i>Andrea Hirata
                                </p>
                                <p class="card-description">
                                    Novel inspiratif tentang perjuangan anak-anak di Belitung untuk mendapatkan
                                    pendidikan...
                                </p>
                                <div class="book-stats">
                                    <small class="text-muted">
                                        <i class="bi bi-eye me-1"></i>1,234 views
                                        <i class="bi bi-calendar ms-3 me-1"></i>2023
                                    </small>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex gap-2">
                                    <a href="#" class="btn btn-outline-primary btn-sm flex-fill">
                                        <i class="bi bi-eye me-1"></i>Detail
                                    </a>
                                    <a href="#" class="btn btn-primary btn-sm flex-fill">
                                        <i class="bi bi-book-open me-1"></i>Baca
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 book-card">
                            <div class="card-body">
                                <div class="book-meta mb-2">
                                    <span class="badge bg-success">Teknologi</span>
                                    <span class="rating ms-2">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <span class="rating-text">4.5</span>
                                    </span>
                                </div>
                                <h5 class="card-title">Belajar Programming</h5>
                                <p class="card-text author">
                                    <i class="bi bi-person-fill me-2"></i>John Doe
                                </p>
                                <p class="card-description">
                                    Panduan lengkap untuk memulai karir sebagai programmer dari nol hingga mahir...
                                </p>
                                <div class="book-stats">
                                    <small class="text-muted">
                                        <i class="bi bi-eye me-1"></i>856 views
                                        <i class="bi bi-calendar ms-3 me-1"></i>2024
                                    </small>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex gap-2">
                                    <a href="#" class="btn btn-outline-primary btn-sm flex-fill">
                                        <i class="bi bi-eye me-1"></i>Detail
                                    </a>
                                    <a href="#" class="btn btn-primary btn-sm flex-fill">
                                        <i class="bi bi-book-open me-1"></i>Baca
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 book-card">
                            <div class="card-body">
                                <div class="book-meta mb-2">
                                    <span class="badge bg-info">Sejarah</span>
                                    <span class="rating ms-2">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <span class="rating-text">4.7</span>
                                    </span>
                                </div>
                                <h5 class="card-title">Sejarah Indonesia</h5>
                                <p class="card-text author">
                                    <i class="bi bi-person-fill me-2"></i>Dr. Sartono
                                </p>
                                <p class="card-description">
                                    Perjalanan panjang bangsa Indonesia dari masa pra-sejarah hingga era modern...
                                </p>
                                <div class="book-stats">
                                    <small class="text-muted">
                                        <i class="bi bi-eye me-1"></i>2,145 views
                                        <i class="bi bi-calendar ms-3 me-1"></i>2023
                                    </small>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex gap-2">
                                    <a href="#" class="btn btn-outline-primary btn-sm flex-fill">
                                        <i class="bi bi-eye me-1"></i>Detail
                                    </a>
                                    <a href="#" class="btn btn-primary btn-sm flex-fill">
                                        <i class="bi bi-book-open me-1"></i>Baca
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Load More Button -->
                <div class="text-center mt-5">
                    <button class="btn btn-outline-primary btn-lg" onclick="loadMoreBooks()">
                        <i class="bi bi-arrow-down-circle me-2"></i>Muat Lebih Banyak
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Features/About Section -->
    <section id="about" class="features-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="section-title">Mengapa Memilih Digital Library?</h2>
                    <p class="section-subtitle">
                        Kami menghadirkan inovasi terdepan dalam dunia perpustakaan digital
                        untuk memberikan pengalaman membaca yang tak terlupakan.
                    </p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card text-center">
                        <div class="feature-icon">
                            <i class="bi bi-lightning-charge-fill"></i>
                        </div>
                        <h5 class="feature-title">Akses Instan</h5>
                        <p class="feature-description">
                            Temukan dan akses buku dalam hitungan detik dengan teknologi pencarian canggih kami.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="feature-card text-center">
                        <div class="feature-icon">
                            <i class="bi bi-devices"></i>
                        </div>
                        <h5 class="feature-title">Multi Platform</h5>
                        <p class="feature-description">
                            Nikmati pengalaman membaca yang konsisten di desktop, tablet, dan smartphone Anda.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="feature-card text-center">
                        <div class="feature-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h5 class="feature-title">Terpercaya</h5>
                        <p class="feature-description">
                            Koleksi buku berkualitas tinggi yang telah diverifikasi dan dipilih secara selektif.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="feature-card text-center">
                        <div class="feature-icon">
                            <i class="bi bi-bookmark-heart"></i>
                        </div>
                        <h5 class="feature-title">Personal Library</h5>
                        <p class="feature-description">
                            Simpan buku favorit dan buat koleksi pribadi Anda sendiri dengan mudah.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="feature-card text-center">
                        <div class="feature-icon">
                            <i class="bi bi-chat-dots"></i>
                        </div>
                        <h5 class="feature-title">Komunitas</h5>
                        <p class="feature-description">
                            Bergabung dengan komunitas pembaca dan diskusikan buku favorit Anda.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="feature-card text-center">
                        <div class="feature-icon">
                            <i class="bi bi-arrow-clockwise"></i>
                        </div>
                        <h5 class="feature-title">Update Berkala</h5>
                        <p class="feature-description">
                            Koleksi buku terbaru ditambahkan secara rutin untuk memperkaya pilihan Anda.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section id="cta" class="cta-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="cta-content">
                        <h3 class="cta-title">Mulai Petualangan Membaca Anda!</h3>
                        <p class="cta-subtitle">
                            Bergabunglah dengan ribuan pembaca yang telah merasakan pengalaman
                            membaca digital yang revolusioner. Akses unlimited, kapan saja, di mana saja.
                        </p>

                        <div class="cta-buttons">
                            <a href="#book-list" class="btn btn-primary btn-lg me-3 mb-3">
                                <i class="bi bi-rocket-takeoff me-2"></i>Mulai Sekarang
                            </a>
                            <a href="#contact" class="btn btn-outline-light btn-lg mb-3">
                                <i class="bi bi-envelope me-2"></i>Hubungi Kami
                            </a>
                        </div>

                        <!-- Social Proof -->
                        <div class="social-proof mt-4">
                            <p class="mb-2"><small>Dipercaya oleh:</small></p>
                            <div class="d-flex justify-content-center align-items-center gap-4">
                                <span class="social-stat">
                                    <strong>10k+</strong> Pembaca Aktif
                                </span>
                                <span class="social-stat">
                                    <strong>50k+</strong> Buku Dibaca
                                </span>
                                <span class="social-stat">
                                    <strong>4.9★</strong> Rating
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="section-title">Hubungi Kami</h2>
                    <p class="section-subtitle mb-5">
                        Ada pertanyaan atau saran? Kami siap membantu Anda.
                    </p>

                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="contact-item">
                                <i class="bi bi-envelope-fill"></i>
                                <h6>Email</h6>
                                <p>info@digitallibrary.com</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="contact-item">
                                <i class="bi bi-telephone-fill"></i>
                                <h6>Telepon</h6>
                                <p>+62 123 456 789</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="contact-item">
                                <i class="bi bi-clock-fill"></i>
                                <h6>Jam Layanan</h6>
                                <p>24/7 Online</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php include_once 'includes/footer.php'; ?>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/landingPage.js"></script>
</body>

</html>