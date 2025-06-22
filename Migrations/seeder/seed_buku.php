<?php
if (!isset($conn)) {
    require_once __DIR__ . '/../../includes/conn.php';
}

echo "Seeding data untuk tabel 'buku'...\n";

// Kumpulan data buku yang lebih banyak dan bervariasi
$daftar_buku = [
    // Pemrograman & Teknologi
    ['judul' => 'Belajar PHP Dasar', 'pengarang' => 'Andi Nugroho', 'penerbit' => 'Informatika', 'tahun_terbit' => 2021, 'kategori' => 'Pemrograman', 'deskripsi' => 'Buku komprehensif untuk memulai belajar pemrograman PHP dari nol.', 'stok' => 8],
    ['judul' => 'Dasar-Dasar MySQL', 'pengarang' => 'Rina Kusuma', 'penerbit' => 'Elex Media Komputindo', 'tahun_terbit' => 2020, 'kategori' => 'Database', 'deskripsi' => 'Panduan praktis untuk mengelola database dengan MySQL.', 'stok' => 5],
    ['judul' => 'Python untuk Sains Data', 'pengarang' => 'Budi Hartono', 'penerbit' => 'Penerbit Andi', 'tahun_terbit' => 2022, 'kategori' => 'Pemrograman', 'deskripsi' => 'Implementasi Python dalam analisis dan visualisasi data.', 'stok' => 6],
    ['judul' => 'Jaringan Komputer Modern', 'pengarang' => 'Citra Lestari', 'penerbit' => 'Graha Ilmu', 'tahun_terbit' => 2023, 'kategori' => 'Jaringan', 'deskripsi' => 'Konsep dan praktik terbaru dalam dunia jaringan komputer.', 'stok' => 4],
    ['judul' => 'Algoritma dan Struktur Data', 'pengarang' => 'Prof. Dr. Ir. Adi Wijaya', 'penerbit' => 'Gramedia Pustaka Utama', 'tahun_terbit' => 2019, 'kategori' => 'Pemrograman', 'deskripsi' => 'Fondasi penting dalam ilmu komputer yang disajikan secara sistematis.', 'stok' => 7],
    ['judul' => 'Belajar JavaScript Lanjutan', 'pengarang' => 'Dewi Anggraini', 'penerbit' => 'Informatika', 'tahun_terbit' => 2024, 'kategori' => 'Pemrograman', 'deskripsi' => 'Membahas konsep asynchronous, ES6+, dan framework modern.', 'stok' => 9],

    // Fiksi & Sastra
    ['judul' => 'Laskar Pelangi', 'pengarang' => 'Andrea Hirata', 'penerbit' => 'Bentang Pustaka', 'tahun_terbit' => 2005, 'kategori' => 'Fiksi', 'deskripsi' => 'Kisah inspiratif tentang perjuangan anak-anak Belitung untuk bersekolah.', 'stok' => 12],
    ['judul' => 'Bumi Manusia', 'pengarang' => 'Pramoedya Ananta Toer', 'penerbit' => 'Hasta Mitra', 'tahun_terbit' => 1980, 'kategori' => 'Fiksi Sejarah', 'deskripsi' => 'Bagian pertama dari Tetralogi Buru, berlatar belakang era kolonial.', 'stok' => 5],
    ['judul' => 'Cantik Itu Luka', 'pengarang' => 'Eka Kurniawan', 'penerbit' => 'Gramedia Pustaka Utama', 'tahun_terbit' => 2002, 'kategori' => 'Fiksi', 'deskripsi' => 'Sebuah epik keluarga dengan latar sejarah Indonesia yang kompleks.', 'stok' => 3],
    ['judul' => 'Norwegian Wood', 'pengarang' => 'Haruki Murakami', 'penerbit' => 'Kepustakaan Populer Gramedia', 'tahun_terbit' => 1987, 'kategori' => 'Fiksi', 'deskripsi' => 'Kisah nostalgia tentang cinta, kehilangan, dan pendewasaan di Tokyo tahun 60-an.', 'stok' => 4],

    // Non-Fiksi & Pengembangan Diri
    ['judul' => 'Filosofi Teras', 'pengarang' => 'Henry Manampiring', 'penerbit' => 'Penerbit Buku Kompas', 'tahun_terbit' => 2018, 'kategori' => 'Pengembangan Diri', 'deskripsi' => 'Mengadaptasi filsafat Stoisisme untuk mengatasi emosi negatif di era modern.', 'stok' => 15],
    ['judul' => 'Sapiens: Riwayat Singkat Umat Manusia', 'pengarang' => 'Yuval Noah Harari', 'penerbit' => 'Kepustakaan Populer Gramedia', 'tahun_terbit' => 2011, 'kategori' => 'Sains', 'deskripsi' => 'Menjelajahi sejarah umat manusia dari Zaman Batu hingga Abad ke-21.', 'stok' => 7],
    ['judul' => 'Atomic Habits', 'pengarang' => 'James Clear', 'penerbit' => 'Gramedia Pustaka Utama', 'tahun_terbit' => 2018, 'kategori' => 'Pengembangan Diri', 'deskripsi' => 'Cara mudah dan terbukti untuk membangun kebiasaan baik & menghilangkan kebiasaan buruk.', 'stok' => 11],
    ['judul' => 'Sebuah Seni untuk Bersikap Bodo Amat', 'pengarang' => 'Mark Manson', 'penerbit' => 'Grasindo', 'tahun_terbit' => 2016, 'kategori' => 'Pengembangan Diri', 'deskripsi' => 'Pendekatan yang tidak biasa untuk menjalani kehidupan yang lebih baik.', 'stok' => 10],

    // Bisnis & Keuangan
    ['judul' => 'Rich Dad Poor Dad', 'pengarang' => 'Robert T. Kiyosaki', 'penerbit' => 'Gramedia Pustaka Utama', 'tahun_terbit' => 1997, 'kategori' => 'Bisnis', 'deskripsi' => 'Apa yang diajarkan orang kaya pada anak-anak mereka tentang uang.', 'stok' => 8],
    ['judul' => 'The Intelligent Investor', 'pengarang' => 'Benjamin Graham', 'penerbit' => 'Serambi Ilmu Semesta', 'tahun_terbit' => 1949, 'kategori' => 'Investasi', 'deskripsi' => 'Buku klasik tentang strategi investasi "value investing".', 'stok' => 3],
    ['judul' => 'Start with Why', 'pengarang' => 'Simon Sinek', 'penerbit' => 'Elex Media Komputindo', 'tahun_terbit' => 2009, 'kategori' => 'Bisnis', 'deskripsi' => 'Bagaimana para pemimpin hebat menginspirasi semua orang untuk bertindak.', 'stok' => 5],

    // Sejarah & Biografi
    ['judul' => 'Madilog', 'pengarang' => 'Tan Malaka', 'penerbit' => 'Narasi', 'tahun_terbit' => 1943, 'kategori' => 'Filsafat', 'deskripsi' => 'Materialisme, Dialektika, dan Logika. Sebuah magnum opus pemikiran Tan Malaka.', 'stok' => 2],
    ['judul' => 'Catatan Seorang Demonstran', 'pengarang' => 'Soe Hok Gie', 'penerbit' => 'LP3ES', 'tahun_terbit' => 1983, 'kategori' => 'Biografi', 'deskripsi' => 'Kumpulan catatan harian seorang aktivis dan mahasiswa sejarah.', 'stok' => 6],
];

if (empty($daftar_buku)) {
    echo "Tidak ada data buku untuk di-seed.\n";
    return;
}

// Menyiapkan query massal
$values = [];
foreach ($daftar_buku as $buku) {
    // Ambil setiap nilai dan pastikan aman untuk dimasukkan ke query
    $judul = mysqli_real_escape_string($conn, $buku['judul']);
    $pengarang = mysqli_real_escape_string($conn, $buku['pengarang']);
    $penerbit = mysqli_real_escape_string($conn, $buku['penerbit']);
    $tahun_terbit = (int) $buku['tahun_terbit']; // Pastikan ini integer
    $kategori = mysqli_real_escape_string($conn, $buku['kategori']);
    $deskripsi = mysqli_real_escape_string($conn, $buku['deskripsi']);
    $stok = (int) $buku['stok']; // Pastikan ini integer

    // Format menjadi baris VALUES untuk SQL
    $values[] = "('$judul', '$pengarang', '$penerbit', $tahun_terbit, '$kategori', '$deskripsi', $stok)";
}

// Gabungkan semua baris menjadi satu string, dipisahkan koma
$values_sql = implode(",\n", $values);

// Buat query INSERT lengkap
$sql = "INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit, kategori, deskripsi, stok) VALUES 
$values_sql
ON DUPLICATE KEY UPDATE judul=judul;";


// Eksekusi query
if (mysqli_query($conn, $sql)) {
    // Ambil jumlah baris yang terpengaruh (disisipkan atau diperbarui)
    $affected_rows = mysqli_affected_rows($conn);
    echo "✔️  Berhasil seeding data 'buku'. Jumlah baris yang terpengaruh: $affected_rows\n";
} else {
    // Tampilkan pesan error jika query gagal
    die("❌ Gagal seeding data 'buku': " . mysqli_error($conn) . "\n");
}