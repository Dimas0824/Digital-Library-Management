<?php
require_once '../../includes/conn.php';
require_once '../../includes/header.php';

if (isset($_GET['id'])) {
    $id_buku = intval($_GET['id']);
    $sql = "SELECT id_buku as id, judul, pengarang, stok, deskripsi, foto FROM buku WHERE id_buku = $id_buku";
    $result = $conn->query($sql);
    $buku = $result->fetch_assoc();
} else {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku - <?= $buku ? htmlspecialchars($buku['judul']) : 'Tidak Ditemukan' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">
    <main class="container my-5">

        <?php if ($buku): ?>
            <!-- Book Detail Card -->
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="card shadow-lg border-0">
                        <div class="card-header bg-primary text-white">
                            <h2 class="card-title mb-0">
                                <i class="bi bi-book me-2"></i>Detail Buku
                            </h2>
                        </div>

                        <div class="card-body p-4">
                            <div class="row">
                                <!-- Book Cover -->
                                <div class="col-md-4 text-center mb-4 mb-md-0">
                                    <?php if (!empty($buku['foto'])): ?>
                                        <div class="position-relative">
                                            <img src="../../uploads/<?= htmlspecialchars($buku['foto']) ?>"
                                                alt="Cover buku <?= htmlspecialchars($buku['judul']) ?>"
                                                class="img-fluid rounded shadow border"
                                                style="max-height: 400px; object-fit: cover;">
                                            <div class="mt-2">
                                                <small class="text-muted">
                                                    <i class="bi bi-image me-1"></i>Cover Buku
                                                </small>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="d-flex align-items-center justify-content-center bg-light rounded shadow border"
                                            style="height: 300px; max-width: 200px; margin: 0 auto;">
                                            <div class="text-center text-muted">
                                                <i class="bi bi-image display-1 mb-2"></i>
                                                <p class="mb-0">Belum ada cover</p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Book Information -->
                                <div class="col-md-8">
                                    <header class="mb-4">
                                        <h1 class="display-6 fw-bold text-primary mb-3">
                                            <?= htmlspecialchars($buku['judul']) ?>
                                        </h1>
                                    </header>

                                    <section>
                                        <div class="row g-3">
                                            <!-- Author Information -->
                                            <div class="col-12">
                                                <div class="card bg-light border-0">
                                                    <div class="card-body">
                                                        <h6 class="card-subtitle mb-2 text-muted">
                                                            <i class="bi bi-person-fill me-2"></i>Pengarang
                                                        </h6>
                                                        <p class="card-text fs-5 fw-semibold mb-0">
                                                            <?= htmlspecialchars($buku['pengarang']) ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Description -->
                                            <div class="col-12">
                                                <div class="card bg-light border-0">
                                                    <div class="card-body">
                                                        <h6 class="card-subtitle mb-2 text-muted">
                                                            <i class="bi bi-info-circle me-2"></i>Deskripsi
                                                        </h6>
                                                        <?php if (!empty($buku['deskripsi'])): ?>
                                                            <p class="card-text mb-0">
                                                                <?= nl2br(htmlspecialchars($buku['deskripsi'])) ?>
                                                            </p>
                                                        <?php else: ?>
                                                            <p class="card-text mb-0">
                                                                <em class="text-muted">Deskripsi buku belum tersedia.</em>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Stock Availability -->
                                            <div class="col-12">
                                                <div class="card bg-light border-0">
                                                    <div class="card-body">
                                                        <h6 class="card-subtitle mb-2 text-muted">
                                                            <i class="bi bi-stack me-2"></i>Ketersediaan Stok
                                                        </h6>
                                                        <p class="card-text mb-0">
                                                            <span
                                                                class="badge <?= $buku['stok'] > 0 ? 'bg-success' : 'bg-danger' ?> fs-6 px-3 py-2">
                                                                <?= htmlspecialchars($buku['stok']) ?> buku
                                                                <?php if ($buku['stok'] > 0): ?>
                                                                    <i class="bi bi-check-circle ms-1"></i>
                                                                <?php else: ?>
                                                                    <i class="bi bi-x-circle ms-1"></i>
                                                                <?php endif; ?>
                                                            </span>
                                                        </p>
                                                        <small class="text-muted mt-2 d-block">
                                                            <?= $buku['stok'] > 0 ? 'Tersedia untuk dipinjam' : 'Stok habis' ?>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>

                        <!-- Card Footer with Actions -->
                        <div class="card-footer bg-white border-top">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="javascript:history.back()" class="btn btn-outline-secondary">
                                        <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Buku
                                    </a>
                                </div>
                                <div class="col-md-6 text-md-end mt-2 mt-md-0">
                                    <?php if ($buku['stok'] > 0): ?>
                                        <a href="../../peminjaman.php?book_id=<?= $buku['id'] ?>" class="btn btn-primary me-2">
                                            <i class="bi bi-download me-2"></i>Pinjam Buku
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php else: ?>
            <!-- Book Not Found Card -->
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow border-0">
                        <div class="card-body text-center py-5">
                            <div class="mb-4">
                                <i class="bi bi-exclamation-triangle display-1 text-warning"></i>
                            </div>
                            <h3 class="card-title text-muted mb-3">Buku Tidak Ditemukan</h3>
                            <p class="card-text text-muted mb-4">
                                Maaf, buku yang Anda cari tidak dapat ditemukan dalam database kami.
                            </p>
                            <a href="index.php" class="btn btn-primary">
                                <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Buku
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </main>

    <?php include_once '../../includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>