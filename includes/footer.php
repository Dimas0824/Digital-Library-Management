<?php
/**
 * Footer Component untuk Digital Library Management System
 * File: includes/footer.php
 * 
 * Komponen footer yang scalable dan mudah dikustomisasi
 * Usage: include 'includes/footer.php';
 */

$footer_config = [
    'company' => [
        'name' => 'Digital Library',
        'description' => 'Perpustakaan digital modern yang menghadirkan pengalaman membaca terbaik dengan teknologi terdepan.',
        'icon' => 'bi bi-book-half',
        'established' => '2024'
    ],
    'social_links' => [
        ['platform' => 'Facebook', 'url' => '#', 'icon' => 'bi bi-facebook'],
        ['platform' => 'Instagram', 'url' => '#', 'icon' => 'bi bi-instagram'],
        ['platform' => 'LinkedIn', 'url' => '#', 'icon' => 'bi bi-linkedin']
    ],
    'navigation' => [
        ['label' => 'Beranda', 'url' => 'index.php'],
        ['label' => 'Koleksi Buku', 'url' => 'pages/books.php'],
        ['label' => 'Tentang Kami', 'url' => 'pages/about.php'],
        ['label' => 'Kontak', 'url' => 'pages/contact.php']
    ],
    'categories' => [
        ['label' => 'Novel', 'url' => 'pages/category.php?cat=novel'],
        ['label' => 'Pendidikan', 'url' => 'pages/category.php?cat=pendidikan'],
        ['label' => 'Teknologi', 'url' => 'pages/category.php?cat=teknologi'],
        ['label' => 'Sejarah', 'url' => 'pages/category.php?cat=sejarah'],
        ['label' => 'Sains', 'url' => 'pages/category.php?cat=sains']
    ],
    'quick_links' => [
        ['label' => 'Cara Peminjaman', 'url' => 'pages/how-to-borrow.php'],
        ['label' => 'FAQ', 'url' => 'pages/faq.php'],
        ['label' => 'Bantuan', 'url' => 'pages/help.php'],
        ['label' => 'Syarat & Ketentuan', 'url' => 'pages/terms.php']
    ],
    'legal_links' => [
        ['label' => 'Kebijakan Privasi', 'url' => 'pages/privacy.php'],
        ['label' => 'Syarat Layanan', 'url' => 'pages/terms.php']
    ],
    'contact_info' => [
        'address' => 'Jl. Terusan Kembang Turi, Malang, Jawa Timur, Indonesia',
        'phone' => '+62 21 1234 5678',
        'email' => 'info@digitallibrary.com',
        'hours' => 'Senin - Jumat: 08:00 - 17:00'
    ]
];

// Function untuk generate footer
function renderFooter($config)
{
    $current_year = date('Y');
    ?>

    <!-- Footer Styles -->
    <style>
        .footer-section {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 60px 0 20px;
            margin-top: 80px;
            position: relative;
            overflow: hidden;
        }

        .footer-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        }

        .footer-content {
            position: relative;
            z-index: 2;
        }

        .footer-section h5 {
            color: #fff;
            font-weight: 700;
            margin-bottom: 25px;
            font-size: 1.3rem;
        }

        .footer-section h6 {
            color: #e8f4f8;
            font-weight: 600;
            margin-bottom: 20px;
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .footer-section p {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-section ul li {
            margin-bottom: 12px;
            transition: all 0.3s ease;
        }

        .footer-section ul li:hover {
            transform: translateX(5px);
        }

        .footer-section ul li a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            position: relative;
        }

        .footer-section ul li a:hover {
            color: #fff;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        .footer-section ul li a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background: linear-gradient(90deg, #4facfe, #00f2fe);
            transition: width 0.3s ease;
        }

        .footer-section ul li a:hover::after {
            width: 100%;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .social-links a:hover {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .newsletter-form {
            margin-top: 20px;
        }

        .newsletter-form .input-group {
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .newsletter-form .form-control {
            border: none;
            padding: 12px 20px;
            background: rgba(255, 255, 255, 0.95);
            color: #333;
        }

        .newsletter-form .form-control:focus {
            box-shadow: none;
            background: white;
        }

        .newsletter-form .btn {
            border: none;
            padding: 12px 25px;
            background: linear-gradient(45deg, #4facfe, #00f2fe);
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .newsletter-form .btn:hover {
            transform: translateX(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 40px;
            padding-top: 30px;
        }

        .footer-bottom p {
            margin: 0;
            color: rgba(255, 255, 255, 0.6);
        }

        .footer-bottom .legal-links {
            display: flex;
            gap: 20px;
            justify-content: flex-end;
            align-items: center;
        }

        .footer-bottom .legal-links a {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .footer-bottom .legal-links a:hover {
            color: #fff;
        }

        .contact-info {
            background: rgba(255, 255, 255, 0.05);
            padding: 25px;
            border-radius: 15px;
            margin-top: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .contact-info-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            color: rgba(255, 255, 255, 0.9);
        }

        .contact-info-item i {
            margin-right: 12px;
            width: 20px;
            color: #4facfe;
        }

        .contact-info-item:last-child {
            margin-bottom: 0;
        }

        @media (max-width: 768px) {
            .footer-section {
                padding: 40px 0 20px;
                text-align: center;
            }

            .footer-bottom .legal-links {
                justify-content: center;
                margin-top: 20px;
            }

            .social-links {
                justify-content: center;
            }
        }
    </style>

    <!-- Footer Section -->
    <footer class="footer-section">
        <div class="container">
            <div class="footer-content">
                <div class="row">
                    <!-- Company Info -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <h5>
                            <i class="<?php echo $config['company']['icon']; ?> me-2"></i>
                            <?php echo $config['company']['name']; ?>
                        </h5>
                        <p><?php echo $config['company']['description']; ?></p>

                        <!-- Social Links -->
                        <div class="social-links">
                            <?php foreach ($config['social_links'] as $social): ?>
                                <a href="<?php echo $social['url']; ?>" title="<?php echo $social['platform']; ?>"
                                    target="_blank" rel="noopener">
                                    <i class="<?php echo $social['icon']; ?>"></i>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <div class="col-lg-2 col-md-6 mb-4">
                        <h6>Navigasi</h6>
                        <ul>
                            <?php foreach ($config['navigation'] as $nav): ?>
                                <li>
                                    <a href="<?php echo $nav['url']; ?>"><?php echo $nav['label']; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Categories -->
                    <div class="col-lg-2 col-md-6 mb-4">
                        <h6>Kategori</h6>
                        <ul>
                            <?php foreach ($config['categories'] as $category): ?>
                                <li>
                                    <a href="<?php echo $category['url']; ?>"><?php echo $category['label']; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Newsletter & Contact -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <h6>Newsletter</h6>
                        <p class="small">Dapatkan info buku terbaru dan promo menarik langsung di email Anda.</p>

                        <form class="newsletter-form" method="POST" action="process/newsletter.php">
                            <div class="input-group">
                                <input type="email" class="form-control" name="email" placeholder="Masukkan email Anda"
                                    required>
                                <button class="btn btn-primary" type="submit">
                                    <i class="bi bi-send me-1"></i>Subscribe
                                </button>
                            </div>
                        </form>

                        <!-- Contact Info -->
                        <div class="contact-info">
                            <div class="contact-info-item">
                                <i class="bi bi-geo-alt-fill"></i>
                                <span><?php echo $config['contact_info']['address']; ?></span>
                            </div>
                            <div class="contact-info-item">
                                <i class="bi bi-telephone-fill"></i>
                                <span><?php echo $config['contact_info']['phone']; ?></span>
                            </div>
                            <div class="contact-info-item">
                                <i class="bi bi-envelope-fill"></i>
                                <span><?php echo $config['contact_info']['email']; ?></span>
                            </div>
                            <div class="contact-info-item">
                                <i class="bi bi-clock-fill"></i>
                                <span><?php echo $config['contact_info']['hours']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Bottom -->
                <div class="footer-bottom">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <p>
                                &copy; <?php echo $current_year; ?>     <?php echo $config['company']['name']; ?>.
                                Dibuat untuk pendidikan.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <div class="legal-links">
                                <?php foreach ($config['legal_links'] as $legal): ?>
                                    <a href="<?php echo $legal['url']; ?>"><?php echo $legal['label']; ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php
}

// Render footer dengan konfigurasi
renderFooter($footer_config);