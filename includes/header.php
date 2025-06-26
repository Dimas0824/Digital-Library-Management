<?php
/**
 * Header Component untuk Digital Library Management System
 * File: includes/header.php
 * 
 * Komponen header yang scalable dan mudah dikustomisasi
 * Usage: include 'includes/header.php';
 */

// Start session jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Konfigurasi Header - Bisa dipindah ke config/header_config.php
$header_config = [
    'site' => [
        'name' => 'Digital Library',
        'icon' => 'bi bi-book-fill',
        'base_url' => '/LatihanVSGA/Digital-Library-Management/',
        'tagline' => 'Perpustakaan Digital Modern'
    ],
    'navigation' => [
        'public' => [
            ['label' => 'Home', 'url' => 'index.php', 'icon' => 'bi bi-house-door-fill', 'id' => 'home'],
            ['label' => 'Buku', 'url' => 'index.php#book-list', 'icon' => 'bi bi-journal-bookmark-fill', 'id' => 'book-list'],
            ['label' => 'About', 'url' => 'index.php#about', 'icon' => 'bi bi-info-circle-fill', 'id' => 'about'],
            ['label' => 'Kontak', 'url' => 'index.php#contact', 'icon' => 'bi bi-telephone-fill', 'id' => 'contact']
        ],
        'authenticated' => [
            ['label' => 'Peminjaman', 'url' => /*'pages/user/peminjaman.php',*/'includes/components/segeraHadir.php', 'icon' => 'bi bi-arrow-down-circle-fill', 'id' => 'peminjaman'],
            ['label' => 'Pengembalian', 'url' => /*'pages/user/pengembalian.php'*/'includes/components/segeraHadir.php', 'icon' => 'bi bi-arrow-up-circle-fill', 'id' => 'pengembalian'],
            ['label' => 'Riwayat', 'url' => /*'pages/user/history.php'*/'includes/components/segeraHadir.php', 'icon' => 'bi bi-clock-history', 'id' => 'history']
        ],
        'admin' => [
            ['label' => 'Admin Panel', 'url' => 'pages/admin/dashboard.php', 'icon' => 'bi bi-gear-fill', 'id' => 'dashboard'],
            ['label' => 'Kelola Buku', 'url' => 'pages/admin/books.php', 'icon' => 'bi bi-book', 'id' => 'books'],
            ['label' => 'Kelola User', 'url' => 'pages/admin/users.php', 'icon' => 'bi bi-people', 'id' => 'users'],
            ['label' => 'Laporan', 'url' => 'pages/admin/reports.php', 'icon' => 'bi bi-file-earmark-text', 'id' => 'reports']
        ]
    ],
    'auth' => [
        'login_url' => 'pages/user/login.php',
        'register_url' => 'pages/user/register.php',
        'logout_url' => 'process/logout.php'
    ],
    'user_roles' => [
        'admin' => 'admin',
        'user' => 'user'
    ]
];

// Function untuk determine active page berdasarkan URL
function getCurrentPage() {
    $current_url = $_SERVER['REQUEST_URI'];
    $filename = basename(parse_url($current_url, PHP_URL_PATH));
    
    // Remove extension
    $page = str_replace('.php', '', $filename);
    
    // Handle fragment/hash URLs for single page sections
    if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], '#') !== false) {
        $fragment = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_FRAGMENT);
        if ($fragment) {
            return $fragment;
        }
    }
    
    // Map common pages
    $page_mapping = [
        'index' => 'home',
        'peminjaman' => 'peminjaman',
        'pengembalian' => 'pengembalian',
        'history' => 'history',
        'dashboard' => 'dashboard',
        'books' => 'books',
        'users' => 'users',
        'reports' => 'reports',
        'login' => 'login',
        'register' => 'register',
        'profile' => 'profile'
    ];
    
    return $page_mapping[$page] ?? $page;
}

// Function untuk generate header
function renderHeader($config, $page_title = 'Digital Library', $current_page = '') {
    $user_logged_in = isset($_SESSION['user_id']);
    $user_role = $_SESSION['role'] ?? 'user';
    $username = $_SESSION['username'] ?? '';
    $user_avatar = $_SESSION['avatar'] ?? '';
    
    // Auto-detect current page if not provided
    if (empty($current_page)) {
        $current_page = getCurrentPage();
    }
    ?>
    
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php echo $config['site']['tagline']; ?>">
        <meta name="keywords" content="perpustakaan, digital, buku, peminjaman, online">
        <meta name="author" content="<?php echo $config['site']['name']; ?>">
        
        <title><?php echo $page_title; ?> - <?php echo $config['site']['name']; ?></title>
        
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="<?php echo $config['site']['base_url']; ?>assets/img/favicon.ico">
        
        <!-- Bootstrap CSS CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Bootstrap Icons CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
        
        <!-- Custom Header Styles -->
        <style>
            :root {
                --primary-color: #2c5aa0;
                --primary-hover: #1e3f73;
                --secondary-color: #f8f9fa;
                --shadow-light: 0 2px 10px rgba(0,0,0,0.1);
                --shadow-medium: 0 4px 20px rgba(0,0,0,0.15);
                --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }
            
            body {
                padding-top: 85px;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
            
            html {
                scroll-behavior: smooth;
            }
            
            section[id] {
                scroll-margin-top: 85px;
            }
            
            /* Navbar Styling */
            .navbar-custom {
                background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%) !important;
                backdrop-filter: blur(10px);
                border-bottom: 1px solid rgba(0,0,0,0.1);
                box-shadow: var(--shadow-light);
                transition: var(--transition-smooth);
                min-height: 80px;
            }
            
            .navbar-brand {
                font-weight: 700 !important;
                font-size: 1.5rem !important;
                color: var(--primary-color) !important;
                transition: var(--transition-smooth);
                text-decoration: none;
            }
            
            .navbar-brand:hover {
                color: var(--primary-hover) !important;
                transform: translateY(-1px);
            }
            
            .navbar-brand i {
                margin-right: 8px;
                font-size: 1.3rem;
            }
            
            /* Navigation Links */
            .navbar-nav .nav-link {
                font-weight: 600 !important;
                color: #495057 !important;
                margin: 0 5px;
                padding: 8px 16px !important;
                border-radius: 8px;
                transition: var(--transition-smooth);
                position: relative;
                overflow: hidden;
            }
            
            .navbar-nav .nav-link:hover {
                color: var(--primary-color) !important;
                background: linear-gradient(45deg, rgba(44,90,160,0.1), rgba(44,90,160,0.05));
                transform: translateY(-2px);
            }
            
            .navbar-nav .nav-link.active {
                color: var(--primary-color) !important;
                background: linear-gradient(45deg, rgba(44,90,160,0.15), rgba(44,90,160,0.08));
                font-weight: 700 !important;
            }
            
            .navbar-nav .nav-link::before {
                content: '';
                position: absolute;
                bottom: 0;
                left: 50%;
                width: 0;
                height: 2px;
                background: linear-gradient(90deg, var(--primary-color), #4facfe);
                transition: var(--transition-smooth);
                transform: translateX(-50%);
            }
            
            .navbar-nav .nav-link:hover::before,
            .navbar-nav .nav-link.active::before {
                width: 80%;
            }
            
            .navbar-nav .nav-link i {
                margin-right: 6px;
                font-size: 0.9rem;
            }
            
            /* Dropdown Styling */
            .dropdown-menu {
                border: none;
                box-shadow: var(--shadow-medium);
                border-radius: 12px;
                padding: 10px 0;
                margin-top: 8px;
                background: rgba(255,255,255,0.98);
                backdrop-filter: blur(10px);
            }
            
            .dropdown-item {
                padding: 10px 20px;
                font-weight: 500;
                transition: var(--transition-smooth);
                border-radius: 0;
            }
            
            .dropdown-item:hover {
                background: linear-gradient(45deg, rgba(44,90,160,0.1), rgba(44,90,160,0.05));
                color: var(--primary-color);
                transform: translateX(5px);
            }
            
            .dropdown-item i {
                margin-right: 8px;
                width: 16px;
                text-align: center;
            }
            
            /* Button Styling */
            .btn-custom-outline {
                border: 2px solid var(--primary-color);
                color: var(--primary-color);
                font-weight: 600;
                padding: 8px 20px;
                border-radius: 25px;
                transition: var(--transition-smooth);
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                margin-right: 10px;
            }
            
            .btn-custom-outline:hover {
                background: var(--primary-color);
                color: white;
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(44,90,160,0.3);
            }
            
            .btn-custom-primary {
                background: linear-gradient(45deg, var(--primary-color), #4facfe);
                border: none;
                color: white;
                font-weight: 600;
                padding: 8px 20px;
                border-radius: 25px;
                transition: var(--transition-smooth);
                text-decoration: none;
                display: inline-flex;
                align-items: center;
            }
            
            .btn-custom-primary:hover {
                background: linear-gradient(45deg, var(--primary-hover), #00c6ff);
                color: white;
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(44,90,160,0.4);
            }
            
            .btn i {
                margin-right: 6px;
                font-size: 0.9rem;
            }
            
            /* User Avatar */
            .user-avatar {
                width: 35px;
                height: 35px;
                border-radius: 50%;
                object-fit: cover;
                border: 2px solid var(--primary-color);
                margin-right: 8px;
            }
            
            .user-info {
                display: flex;
                align-items: center;
                padding: 8px 16px;
                color: #495057;
                font-weight: 600;
                text-decoration: none;
                border-radius: 25px;
                transition: var(--transition-smooth);
            }
            
            .user-info:hover {
                background: rgba(44,90,160,0.1);
                color: var(--primary-color);
            }
            
            /* Mobile Responsive */
            @media (max-width: 991px) {
                .navbar-nav {
                    padding: 20px 0;
                }
                
                .navbar-nav .nav-link {
                    margin: 2px 0;
                    text-align: left;
                }
                
                .btn-custom-outline,
                .btn-custom-primary {
                    margin: 5px 0;
                    justify-content: center;
                }
                
                body {
                    padding-top: 70px;
                }
            }
            
            /* Navbar Toggler Animation */
            .navbar-toggler {
                border: none;
                padding: 6px 8px;
                border-radius: 8px;
                transition: var(--transition-smooth);
            }
            
            .navbar-toggler:focus {
                box-shadow: none;
                background: rgba(44,90,160,0.1);
            }
            
            .navbar-toggler-icon {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%2844, 90, 160, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
            }
            
            /* Notification Badge */
            .notification-badge {
                position: absolute;
                top: -5px;
                right: -5px;
                background: #dc3545;
                color: white;
                border-radius: 50%;
                width: 18px;
                height: 18px;
                font-size: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: bold;
            }
        </style>
    </head>
    
    <body>
        <!-- Navigation Header -->
        <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
            <div class="container">
                <!-- Brand -->
                <a class="navbar-brand" href="<?php echo $config['site']['base_url']; ?>index.php">
                    <i class="<?php echo $config['site']['icon']; ?>"></i>
                    <?php echo $config['site']['name']; ?>
                </a>
                
                <!-- Mobile Toggle Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <!-- Navigation Menu -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- Main Navigation -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php foreach ($config['navigation']['public'] as $nav): ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo ($current_page === $nav['id']) ? 'active' : ''; ?>" 
                                   href="<?php echo $config['site']['base_url'] . $nav['url']; ?>">
                                    <i class="<?php echo $nav['icon']; ?>"></i>
                                    <?php echo $nav['label']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                        
                        <?php if ($user_logged_in): ?>
                            <?php 
                            $user_nav = ($user_role === 'admin') ? 
                                array_merge($config['navigation']['authenticated'], $config['navigation']['admin']) : 
                                $config['navigation']['authenticated'];
                            ?>
                            <?php foreach ($user_nav as $nav): ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo ($current_page === $nav['id']) ? 'active' : ''; ?>" 
                                       href="<?php echo $config['site']['base_url'] . $nav['url']; ?>">
                                        <i class="<?php echo $nav['icon']; ?>"></i>
                                        <?php echo $nav['label']; ?>
                                        <?php if ($nav['label'] === 'Peminjaman'): ?>
                                            <span class="notification-badge">3</span>
                                        <?php endif; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                    
                    <!-- User Authentication -->
                    <ul class="navbar-nav ms-auto">
                        <?php if ($user_logged_in): ?>
                            <!-- User Dropdown -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle user-info" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php if (!empty($user_avatar)): ?>
                                        <img src="<?php echo $config['site']['base_url'] . 'assets/img/avatars/' . $user_avatar; ?>" 
                                             alt="Avatar" class="user-avatar">
                                    <?php else: ?>
                                        <i class="bi bi-person-circle me-2"></i>
                                    <?php endif; ?>
                                    <span class="d-none d-lg-inline"><?php echo htmlspecialchars($username); ?></span>
                                    <?php if ($user_role === 'admin'): ?>
                                        <span class="badge bg-warning text-dark ms-2">Admin</span>
                                    <?php endif; ?>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <h6 class="dropdown-header">
                                            <i class="bi bi-person-circle me-2"></i>
                                            <?php echo htmlspecialchars($username); ?>
                                        </h6>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="<?php echo $config['site']['base_url']; ?>pages/user/profile.php">
                                            <i class="bi bi-person-gear"></i>Profil Saya
                                        </a>
                                    </li>
                                    <?php if ($user_role === 'admin'): ?>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <a class="dropdown-item" href="<?php echo $config['site']['base_url']; ?>pages/admin/dashboard.php">
                                                <i class="bi bi-speedometer2"></i>Admin Dashboard
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form action="<?php echo $config['site']['base_url'] . $config['auth']['logout_url']; ?>" 
                                              method="post" style="margin: 0;">
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="bi bi-box-arrow-right"></i>Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php else: ?>
                            <!-- Login/Register Buttons -->
                            <li class="nav-item me-2">
                                <a class="btn-custom-outline" 
                                   href="<?php echo $config['site']['base_url'] . $config['auth']['login_url']; ?>">
                                    <i class="bi bi-box-arrow-in-right"></i>Login
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="btn-custom-primary" 
                                   href="<?php echo $config['site']['base_url'] . $config['auth']['register_url']; ?>">
                                    <i class="bi bi-person-plus-fill"></i>Register
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        
    <?php
}

// Function untuk close HTML (dipanggil di footer atau akhir halaman)
function closeHTML() {
    ?>
        <!-- Bootstrap JS CDN -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
    <?php
}

// Auto render header jika file ini di-include
if (!defined('HEADER_INCLUDED')) {
    define('HEADER_INCLUDED', true);
    $page_title = $page_title ?? 'Digital Library';
    $current_page = $current_page ?? '';
    renderHeader($header_config, $page_title, $current_page);
}
?>