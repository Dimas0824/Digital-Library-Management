# Digital Library Management System

Proyek sistem manajemen perpustakaan digital yang dibuat untuk keperluan belajar dan persiapan sertifikasi VSGA Junior Web Developer (JWD).

## 📋 Deskripsi Project

Sistem manajemen perpustakaan digital ini merupakan aplikasi web berbasis PHP yang memungkinkan pengelolaan koleksi buku, peminjaman, pengembalian, dan manajemen pengguna perpustakaan secara digital.

## 🎯 Tujuan Pembelajaran

- Memahami konsep dasar pengembangan web dengan PHP
- Implementasi database MySQL dengan migrasi
- Praktik CRUD (Create, Read, Update, Delete) operations
- Pengelolaan struktur project yang terorganisir
- Persiapan untuk sertifikasi VSGA Junior Web Developer

## 📁 Struktur Project

```
DIGITAL LIBRARY MANAGEMENT/
├── assets/                 # File statis (CSS, JS, images)
├── includes/              # File konfigurasi dan utilitas
│   └── conn.php          # Koneksi database
├── Migrations/           # File migrasi database
│   ├── migration/        # Folder migrasi utama
│   │   ├── create_table_buku.php
│   │   ├── create_table_peminjaman.php
│   │   ├── create_table_pengembalian.php
│   │   └── create_table_pengguna.php
│   ├── seeder/          # Data dummy untuk testing
│   │    ├── seed_buku.php
│   │    └── seed_pengguna.php
│   └── setup.php
├── pages/               # Halaman utama aplikasi
└── process/            # File pemrosesan logika bisnis
```

## 🗄️ Database Schema

### Tabel Utama:
1. **buku** - Menyimpan data koleksi buku
2. **peminjaman** - Mencatat transaksi peminjaman
3. **pengembalian** - Mencatat transaksi pengembalian
4. **pengguna** - Data pengguna/anggota perpustakaan

## 🚀 Cara Menjalankan Project

### Prerequisites
- XAMPP/WAMP/LAMP stack
- PHP 8.2 atau lebih baru
- MySQL 5.7 atau lebih baru
- Web browser

### Langkah Instalasi

1. **Clone atau download project**
   ```bash
   git clone [repository-url]
   ```

2. **Konfigurasi koneksi database**
   - Edit file `includes/conn.php`
   - Sesuaikan parameter database (host, username, password, database name)

3. **Setup database**
   - Buat database baru di phpMyAdmin
   - Jalankan file setup untuk melakukan Migrasi dan seeding.

4. **Akses aplikasi**
   - Buka browser dan akses `localhost/[nama-folder-project]`

## 📚 Fitur Aplikasi

- **Manajemen Buku**: Tambah, edit, hapus, dan lihat koleksi buku
- **Manajemen Pengguna**: Registrasi dan kelola data anggota
- **Peminjaman**: Catat transaksi peminjaman buku
- **Pengembalian**: Proses pengembalian dan perhitungan denda
- **Laporan**: Statistik peminjaman dan pengembalian

## 🛠️ Teknologi yang Digunakan

- **Backend**: PHP (Native)
- **Database**: MySQL
- **Frontend**: HTML5, CSS3, JavaScript
- **Server**: Apache (XAMPP)

## 📖 Referensi Belajar

- [PHP Manual](https://www.php.net/manual/en/)
- [MySQL Documentation](https://dev.mysql.com/doc/)
- [W3Schools PHP Tutorial](https://www.w3schools.com/php/)

## 🎓 Kompetensi VSGA JWD yang Dipraktikkan

1. **Dasar Pemrograman Web**
   - HTML, CSS, JavaScript
   - Responsive web design

2. **PHP Programming**
   - Syntax dasar PHP
   - Form handling
   - Session management
   - File upload

3. **Database Management**
   - Design database
   - SQL queries
   - PHP-MySQL integration

4. **Web Security**
   - Input validation
   - SQL injection prevention
   - XSS protection

## 📝 Catatan Pengembangan

- Project ini dibuat untuk keperluan edukasi
- Cocok untuk pemula yang ingin memahami full-stack web development
- Dapat dikembangkan lebih lanjut dengan framework modern

## 📞 Kontak

Jika ada pertanyaan mengenai project ini, silakan hubungi:
- Email: [2341270088@student.polinema.ac.id]

---

**Happy Learning! 🚀**

*Project ini merupakan bagian dari persiapan sertifikasi VSGA Junior Web Developer*