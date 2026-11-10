# ADVOKITA — Whistleblowing & Legal Aid System
**Tugas Besar Pemrograman Web 2026 — Kelompok 24**

ADVOKITA adalah portal pengaduan dan bantuan hukum mahasiswa berbasis web. Sistem ini memungkinkan mahasiswa membuat akun, mengajukan laporan secara transparan maupun anonim, mengunggah bukti dokumen/foto, dan memantau status perkembangan penanganan kasus. Di sisi pengelola, admin kampus dapat meninjau kronologi laporan, memberikan catatan keputusan (menyetujui/menolak), serta mempublikasikan pengumuman resmi.

Aplikasi dibangun menggunakan **PHP Native (8.2+)**, **PostgreSQL (PDO_PGSQL)**, dan antarmuka **HTML + Bootstrap 5 CSS-only (100% tanpa JavaScript)** sesuai standar keamanan dan aksesibilitas kampus.

---

## 👥 Tim Pengembang (Kelompok 24)

| No | Nama Anggota | NPM | Peran Utama |
|---|---|---|---|
| 1 | **Billie Abyan Afif** | 2415061007 | Project Lead & Core Backend Architecture |
| 2 | **Ichtiari Khoirunnisa** | 2415061038 | Fullstack: Modul Administrasi & Pengumuman |
| 3 | **Muhammad Akbar Prayuga** | 2415061017 | Fullstack: Modul Pelaporan Pengaduan & Unggah Berkas |
| 4 | **Natasya Surya Ramadhani** | 2455061002 | Fullstack: Modul Dashboard Mahasiswa & Riwayat Kasus |
| 5 | **Rizky Ahmad Fahrezi** | 2415061031 | Fullstack: Modul Autentikasi, UI Layout & Styling |

---

## 🛠️ Pembagian Jobdesk & Berkas yang Dikerjakan

### 1. Billie Abyan Afif (2415061007)
- **Fokus:** *Core Backend Architecture, Database Design & Cloud Deployment*
- **Rincian Pekerjaan:**
  - Merancang arsitektur backend, manajemen sesi aman (`advokita_sid`), proteksi token CSRF, dan konfigurasi koneksi `PDO` PostgreSQL (dengan dukungan SSL/TLS untuk database lokal maupun cloud).
  - Merancang skema basis data relasional, aturan constraint, sequence nomor kasus otomatis, dan indeks performa pencarian.
  - Mengonfigurasi otomatisasi deployment kontainer Docker dan runner environment server.
- **Berkas yang Dibuat / Dikelola:**
  - `app/bootstrap.php` *(Koneksi database PDO, inisialisasi sesi, proteksi CSRF, helper keamanan)*
  - `database/schema.sql` *(Struktur tabel users, reports, report_attachments, announcements, auth_attempts)*
  - `Dockerfile` & `.dockerignore` *(Konfigurasi kontainer PHP 8.2 Alpine & ekstensi pdo_pgsql)*
  - `composer.json` *(Deklarasi dependensi PHP & platform extensions)*
  - `bin/setup-database.php` & `bin/create-admin.php` *(CLI migrasi tabel & pembuatan akun admin)*
  - `scripts/setup-local-db.ps1` *(Skrip otomasi konfigurasi role/database PostgreSQL lokal)*

---

### 2. Ichtiari Khoirunnisa (2415061038)
- **Fokus:** *Backend & Frontend: Modul Moderasi Admin & Pengumuman Resmi*
- **Rincian Pekerjaan:**
  - Mengembangkan antarmuka dan logika backend untuk panel administrasi penanganan kasus.
  - Mengimplementasikan alur moderasi laporan: peninjauan laporan pending, pengisian catatan pertimbangan hukum, dan pembaruan status laporan (Disetujui/Ditolak).
  - Mengembangkan sistem CRUD publikasi pengumuman informasi kampus untuk ditampilkan pada beranda mahasiswa.
- **Berkas yang Dibuat / Dikelola:**
  - `templates/pages/admin.php` *(Antarmuka dashboard admin, tabel rekap laporan, modal keputusan, form pengumuman)*
  - `public/index.php` *(Controller logika POST action: `decision`, `announcement-create`, `announcement-toggle`, `announcement-delete`)*

---

### 3. Muhammad Akbar Prayuga (2415061017)
- **Fokus:** *Backend & Frontend: Modul Formulir Pengaduan & Penanganan Berkas Bukti*
- **Rincian Pekerjaan:**
  - Merancang antarmuka formulir pengaduan hukum dengan input dinamis (kategori kasus, tanggal insiden, kronologi kejadian, dan saklar privasi anonim).
  - Mengembangkan logika pemrosesan upload lampiran bukti: validasi tipe konten MIME di sisi server (PDF, JPG, PNG), pembatasan ukuran berkas (maksimal 10 MB), dan penyimpanan bukti terenkripsi secara privat di luar document root.
- **Berkas yang Dibuat / Dikelola:**
  - `templates/pages/report.php` *(Antarmuka formulir pengaduan, pemilihan kategori, kronologi, saklar anonim)*
  - `public/index.php` *(Fungsi validasi `validate_report()`, fungsi pemrosesan berkas `save_uploaded_attachment()`, dan proteksi folder upload)*

---

### 4. Natasya Surya Ramadhani (2455061002)
- **Fokus:** *Backend & Frontend: Modul Dashboard Mahasiswa & Riwayat Kasus*
- **Rincian Pekerjaan:**
  - Mengembangkan halaman beranda (dashboard) mahasiswa untuk menampilkan status pelaporan terkini dan siaran pengumuman aktif dari tim hukum.
  - Mengembangkan halaman riwayat laporan terstruktur dengan filter nomor kasus serta halaman detail investigasi pengaduan.
  - Mengembangkan mekanisme unduhan berkas bukti privat yang aman dan terotorisasi hanya untuk pelapor dan tim admin.
- **Berkas yang Dibuat / Dikelola:**
  - `templates/pages/dashboard.php` *(Antarmuka beranda mahasiswa, banner informasi pengaduan, dan feed pengumuman)*
  - `templates/pages/history.php` *(Antarmuka daftar riwayat pengaduan mahasiswa beserta badge status)*
  - `templates/pages/detail.php` *(Antarmuka rincian kronologi laporan, catatan putusan admin, dan daftar bukti)*
  - `public/index.php` *(Controller query riwayat laporan `report_rows()`, detail kasus `find_report()`, dan fungsi pengiriman berkas `send_attachment()`)*

---

### 5. Rizky Ahmad Fahrezi (2415061031)
- **Fokus:** *Frontend & Backend: Modul Autentikasi, UI Layout & Styling Responsif*
- **Rincian Pekerjaan:**
  - Merancang kerangka layout aplikasi bersama (header desktop responsif, mobile bottom navigation bar, alert notifikasi).
  - Mengimplementasikan seluruh modul autentikasi pengguna: halaman pendaftaran akun mahasiswa, halaman login, hashing kata sandi (`bcrypt`), pembatasan percobaan login (rate limiting), dan rotasi sesi.
  - Mengembangkan sistem desain visual CSS murni (warna crimson tema kampus, tipografi, card elevation, dan formulir tanpa ketergantungan JavaScript).
- **Berkas yang Dibuat / Dikelola:**
  - `templates/layout.php` *(Kerangka HTML bersama, navbar desktop, bottom navigation mobile, container alert flash message)*
  - `templates/pages/login.php` & `templates/pages/register.php` *(Antarmuka login dan registrasi mahasiswa)*
  - `public/assets/css/styles.css`, `public/assets/css/core.css`, `public/assets/css/layout.css` *(Aturan CSS visual, layout responsif, tema warna)*
  - `public/index.php` *(Controller POST action: `login`, `register`, `logout`, dan fungsi rate limiting `auth_rate_limit()`)*
  - `tests/validation.php` *(Pengujian unit validasi formulir registrasi, format NPM, dan panjang password)*

---

## 🚀 Panduan Menjalankan Aplikasi Secara Lokal

### 1. Persyaratan Sistem
- **PHP 8.2+** dengan ekstensi `pdo_pgsql` dan `fileinfo` aktif.
- **PostgreSQL 14+**.
- Web server Apache/Nginx atau server PHP bawaan (*PHP Built-in Server*).

### 2. Konfigurasi Database
1. Salin berkas `.env.example` menjadi `.env`:
   ```bash
   cp .env.example .env
   ```
2. Sesuaikan kredensial PostgreSQL Anda pada berkas `.env`:
   ```env
   PGHOST=127.0.0.1
   PGPORT=5432
   PGDATABASE=advokita
   PGUSER=postgres
   PGPASSWORD=password_lokal_anda
   SESSION_SECRET=kunci_acak_minimal_32_karakter_untuk_keamanan_sesi
   ```
3. Eksekusi skema tabel database:
   ```bash
   php bin/setup-database.php
   ```
4. Buat akun Admin pertama:
   ```bash
   php bin/create-admin.php
   ```

### 3. Menjalankan Server
Jalankan server PHP bawaan dari direktori proyek:
```bash
php -S 127.0.0.1:8000 -t public
```
Buka browser dan akses: `http://127.0.0.1:8000`

### 4. Menjalankan Pengujian Validasi
Pastikan aturan validasi sistem lulus tanpa kendala:
```bash
php tests/validation.php
```
