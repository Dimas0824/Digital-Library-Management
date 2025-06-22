<?php
// setup.php - Versi Sederhana

// Path setup
define('BASE_DIR', dirname(__DIR__));
define('MIGRATION_DIR', __DIR__ . '/migration');
define('SEEDER_DIR', __DIR__ . '/seeder');
define('INCLUDES_DIR', BASE_DIR . '/includes');

// Include database connection
require_once INCLUDES_DIR . '/conn.php';

// Jalankan migrasi
function runMigrations()
{
    global $conn;

    $files = [
        'create_table_pengguna.php',
        'create_table_buku.php',
        'create_table_peminjaman.php',
        'create_table_pengembalian.php'
    ];

    echo "📦 Menjalankan Migrasi:\n";

    foreach ($files as $file) {
        $path = MIGRATION_DIR . '/' . $file;
        if (file_exists($path)) {
            echo "  🔧 $file ";
            require $path;
            echo "✅\n";
        } else {
            echo "  ❌ $file tidak ditemukan\n";
        }
    }
}

// Jalankan seeder
function runSeeders()
{
    global $conn;

    $files = [
        'seed_pengguna.php',
        'seed_buku.php'
    ];

    echo "🌱 Menjalankan Seeder:\n";

    foreach ($files as $file) {
        $path = SEEDER_DIR . '/' . $file;
        if (file_exists($path)) {
            echo "  🔧 $file ";
            require $path;
            echo "✅\n";
        } else {
            echo "  ❌ $file tidak ditemukan\n";
        }
    }
}

// Reset database
function resetDatabase()
{
    global $conn;

    echo "🗑️ Menghapus semua tabel...\n";

    // Nonaktifkan foreign key check
    mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 0");

    // Hapus tabel
    $tables = ['pengembalian', 'peminjaman', 'buku', 'pengguna'];
    foreach ($tables as $table) {
        mysqli_query($conn, "DROP TABLE IF EXISTS $table");
        echo "  ✅ Tabel $table dihapus\n";
    }

    // Aktifkan kembali foreign key check
    mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 1");

    echo "🗑️ Reset selesai\n";
}

// Cek koneksi
function checkConnection()
{
    global $conn;

    if (!$conn) {
        echo "❌ Koneksi database gagal!\n";
        exit(1);
    }

    echo "✅ Koneksi database berhasil\n";
}

// Tampilkan info database
function showInfo()
{
    global $conn;

    $result = mysqli_query($conn, "SELECT DATABASE() as db_name");
    $row = mysqli_fetch_assoc($result);
    echo "📊 Database: " . $row['db_name'] . "\n";

    $result = mysqli_query($conn, "SHOW TABLES");
    if (mysqli_num_rows($result) > 0) {
        echo "📋 Tabel:\n";
        while ($row = mysqli_fetch_array($result)) {
            echo "  - " . $row[0] . "\n";
        }
    } else {
        echo "📋 Belum ada tabel\n";
    }
}

// Cek apakah dijalankan via CLI
if (php_sapi_name() !== 'cli') {
    echo "⛔ Hanya bisa dijalankan via terminal: php setup.php\n";
    exit;
}

// Cek koneksi
checkConnection();

// Menu utama
while (true) {
    echo "\n========================================\n";
    echo "🔧 Setup Database - Digital Library\n";
    echo "========================================\n";
    echo "[1] Migrasi\n";
    echo "[2] Seeder\n";
    echo "[3] Setup Lengkap (Reset + Migrasi + Seeder)\n";
    echo "[4] Info Database\n";
    echo "[5] Reset Database\n";
    echo "[0] Keluar\n";
    echo "========================================\n";
    echo "Pilih: ";

    $pilihan = trim(fgets(STDIN));

    switch ($pilihan) {
        case '1':
            runMigrations();
            break;

        case '2':
            runSeeders();
            break;

        case '3':
            resetDatabase();
            runMigrations();
            runSeeders();
            echo "🎉 Setup lengkap selesai!\n";
            break;

        case '4':
            showInfo();
            break;

        case '5':
            echo "⚠️ Yakin ingin reset database? (ketik 'ya'): ";
            $confirm = trim(fgets(STDIN));
            if ($confirm === 'ya') {
                resetDatabase();
            } else {
                echo "❌ Reset dibatalkan\n";
            }
            break;

        case '0':
            echo "👋 Selesai\n";
            exit;

        default:
            echo "❌ Pilihan tidak valid\n";
    }

    echo "\nTekan Enter untuk lanjut...";
    fgets(STDIN);
}
?>