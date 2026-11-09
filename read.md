# ADVOKITA

ADVOKITA adalah portal pengaduan dan bantuan hukum mahasiswa. Mahasiswa dapat membuat akun, mengirim laporan anonim atau dengan identitas, mengunggah bukti, dan memantau status laporan. Admin dapat meninjau laporan, memberikan keputusan dan catatan, serta menerbitkan dan mengelola pengumuman.

## Teknologi

- PHP 8.1+ untuk pemrosesan form, autentikasi, dan rendering HTML di server.
- PostgreSQL melalui ekstensi PHP `PDO_PGSQL`.
- HTML dan CSS (Bootstrap CSS-only) untuk tampilan.
- Tidak ada JavaScript di browser maupun server.

## Struktur proyek

```text
ADVOKITA/
├── app/
│   └── bootstrap.php              # Sesi, PDO, CSRF, validasi, dan akses data
├── bin/
│   ├── setup-database.php         # Menerapkan skema PostgreSQL
│   └── create-admin.php           # Membuat akun admin
├── database/
│   └── schema.sql                 # Tabel, batasan, indeks, dan pembatasan login
├── design/
│   └── design-system.md           # Panduan visual
├── public/
│   ├── index.php                  # Front controller halaman dan form
│   ├── favicon.svg
│   └── assets/
│       ├── css/
│       │   ├── styles.css         # Gaya utama
│       │   └── layout.css         # Layout responsif
│       └── ...                    # Ikon dan gambar
├── scripts/
│   └── setup-local-db.ps1         # Menyiapkan role/database di PostgreSQL lokal
├── storage/
│   └── uploads/                   # Bukti privat, di luar document root
├── templates/
│   ├── layout.php                 # Kerangka HTML bersama
│   └── pages/
│       ├── login.php              # Halaman masuk
│       ├── register.php           # Halaman pendaftaran
│       └── ...                    # Dashboard, pengaduan, riwayat, detail, dan admin
├── tests/
│   └── validation.php             # Pengujian aturan validasi PHP
├── .env.example                   # Contoh variabel lingkungan
├── AGENTS.md                      # Konvensi dan batasan kontribusi
└── read.md                        # Dokumentasi proyek
```

Server web harus memakai `public/` sebagai document root. Kredensial database disimpan di `.env` lokal, bukan di repositori. Direktori `storage/uploads/` berada di luar area yang dapat disajikan langsung oleh web server.

## Fitur dan alur

- **Akun mahasiswa/admin:** registrasi, login, logout, sesi, dan pengalihan berdasarkan peran.
- **Halaman autentikasi terpisah:** login di `index.php?page=login` dan pendaftaran di `index.php?page=register`.
- **Pengaduan:** judul, kategori, tanggal kejadian, kronologi, pilihan anonim, dan lampiran opsional.
- **Lampiran:** hanya PDF/JPG/PNG hingga 10 MB. PHP memeriksa MIME dari isi berkas; unduhan hanya tersedia bagi pemilik laporan atau admin.
- **Pemantauan laporan:** dashboard, riwayat, detail, status, dan catatan keputusan.
- **Administrasi:** admin menerima laporan, menyetujui/menolak laporan pending dengan catatan, dan mengelola pengumuman.
- **Tanpa JavaScript:** setiap aksi dikirim melalui form HTML biasa dan ditangani di server. Navigasi halaman, validasi, dan pembaruan konten tidak membutuhkan skrip browser.

## Persyaratan lokal

- PHP 8.1 atau lebih baru dengan ekstensi `PDO_PGSQL` (`pdo_pgsql`) dan `fileinfo`.
- PostgreSQL.
- Web server yang menjalankan PHP, atau PHP CLI untuk server pengembangan.

Pada Laragon, pilih versi PHP yang sesuai dan aktifkan `extension=pdo_pgsql` pada `php.ini` yang digunakan. Restart Laragon setelah perubahan ekstensi. Pastikan `php -m` menampilkan `PDO`, `pdo_pgsql`, dan `fileinfo`.

Agar batas lampiran aplikasi 10 MB dapat dipenuhi, konfigurasi PHP/web server harus mengizinkan `upload_max_filesize=10M` dan `post_max_size=12M`. Atur nilai tersebut pada `php.ini` atau konfigurasi PHP yang dipakai oleh web server, lalu restart server.

## Menyiapkan database

1. Salin `.env.example` sebagai `.env`.
2. Pada Windows/Laragon, buka PowerShell sebagai Administrator dan jalankan skrip lokal:

   ```powershell
   powershell -ExecutionPolicy Bypass -File .\scripts\setup-local-db.ps1
   ```

   Skrip membuat role/database hanya bila keduanya belum ada, membuat kata sandi lokal dan rahasia sesi, lalu menyimpannya pada `.env`. Skrip tidak menimpa role/database yang sudah ada.
3. Terapkan skema tabel:

   ```powershell
   php .\bin\setup-database.php
   ```

4. Buat akun admin pada terminal interaktif:

   ```powershell
   php .\bin\create-admin.php
   ```

## Menjalankan aplikasi

Jalankan server PHP bawaan dari direktori proyek:

```powershell
php -S 127.0.0.1:8000 -t public
```

Buka `http://127.0.0.1:8000`. Untuk penggunaan selain pengembangan, gunakan HTTPS dan web server PHP yang dikonfigurasi agar hanya `public/` dapat diakses.

## Pengujian

```powershell
php .\tests\validation.php
php -l .\public\index.php
```

Uji alur secara manual tanpa JavaScript: registrasi/login, pengajuan laporan dengan dan tanpa bukti, akses pemilik terhadap detail/lampiran, moderasi admin, serta pembuatan/publikasi/penghapusan pengumuman.

## Aturan keamanan dan pengembangan

- Semua perubahan data harus memakai POST dan token CSRF; gunakan redirect setelah aksi berhasil.
- Validasi semua data di PHP. Gunakan prepared statements PDO dan escape nilai keluaran HTML.
- Jangan menyimpan kata sandi mentah; gunakan `password_hash` dan `password_verify`.
- Periksa otorisasi dan kepemilikan laporan pada tiap operasi detail/unduh lampiran.
- Jangan menyajikan isi `storage/` sebagai berkas statis publik.
- Jangan menaruh rahasia di kode, dokumentasi, atau repositori. File `.env` tidak boleh dibagikan atau di-commit.
- Jangan menambahkan JavaScript, Node.js, npm/pnpm, Vite, atau dependensi yang memerlukan JavaScript.
