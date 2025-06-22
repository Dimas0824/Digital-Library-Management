<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Library</title>

    <!-- ✅ Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ✅ Bootstrap Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        .navbar .btn {
            border-radius: 0.5rem;
        }

        body {
            padding-top: 80px;
        }

        html {
            scroll-behavior: smooth;
        }

        section[id] {
            scroll-margin-top: 80px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-white shadow-sm border-bottom fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4 text-primary" href="index.php">
                <i class="bi bi-book-fill me-2"></i>Digital Library
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fw-semibold text-body"
                            href="/LatihanVSGA/Digital Library Management/index.php">
                            <i class="bi bi-house-door-fill me-1"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold text-body"
                            href="/LatihanVSGA/Digital Library Management/index.php#book-list">
                            <i class="bi bi-journal-bookmark-fill me-1"></i>Buku
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold text-body"
                            href="/LatihanVSGA/Digital Library Management/index.php#about">
                            <i class="bi bi-info-circle-fill me-1"></i>About
                        </a>
                    </li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold text-body" href="peminjaman.php">
                                <i class="bi bi-arrow-down-circle-fill me-1"></i>Peminjaman
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold text-body" href="pengembalian.php">
                                <i class="bi bi-arrow-up-circle-fill me-1"></i>Pengembalian
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-semibold text-body" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle me-1"></i>Account
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="process/logout.php" method="post" style="margin: 0;">
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary btn-sm" href="pages/user/login.php">
                                <i class="bi bi-box-arrow-in-right me-1"></i>Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary btn-sm text-white fw-semibold" href="pages/user/register.php">
                                <i class="bi bi-person-plus-fill me-1"></i>Register
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ✅ Bootstrap JS CDN (di bagian bawah sebelum </body>) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>