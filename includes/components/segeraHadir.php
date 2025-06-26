<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segera Hadir - Digital Library</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<?php include_once '../../includes/header.php'; ?>

<body class="bg-light">
    <div class="container-fluid vh-100 d-flex align-items-center justify-content-center">
        <div class="row w-100">
            <div class="col-12 col-md-8 col-lg-6 mx-auto">
                <div class="card shadow border-0">
                    <div class="card-body text-center p-5">
                        <!-- Icon -->
                        <div class="mb-4">
                            <i class="bi bi-tools text-warning" style="font-size: 4rem;"></i>
                        </div>

                        <!-- Title -->
                        <h1 class="display-6 fw-bold text-primary mb-3">Segera Hadir</h1>

                        <!-- Description -->
                        <p class="lead text-muted mb-4">
                            Fitur ini sedang dalam tahap pengembangan dan akan segera hadir.
                            Silakan kembali lagi nanti untuk menikmati fitur terbaru kami.
                        </p>

                        <!-- Progress indicator -->
                        <div class="mb-4">
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                    role="progressbar" style="width: 75%"></div>
                            </div>
                            <small class="text-muted mt-2 d-block">Dalam Pengembangan (75%)</small>
                        </div>

                        <!-- Back button -->
                        <div class="d-grid gap-2 d-md-block">
                            <a href="../../index.php" class="btn btn-primary btn-lg">
                                <i class="bi bi-house-door-fill me-2"></i>Kembali ke Beranda
                            </a>
                        </div>

                        <!-- Additional info -->
                        <div class="mt-4 pt-3 border-top">
                            <small class="text-muted">
                                <i class="bi bi-info-circle me-1"></i>
                                Untuk informasi lebih lanjut, hubungi administrator sistem.
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <?php
    // Include footer if exists
    if (file_exists('../../includes/footer.php')) {
        include '../../includes/footer.php';
    }
    ?>
</body>

</html>