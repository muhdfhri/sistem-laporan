# Sistem Layanan Laporan Masyarakat

Sistem pengaduan masyarakat berbasis web yang dibangun dengan Laravel untuk memfasilitasi penyampaian aspirasi dan pengaduan dari masyarakat kepada instansi terkait.

## 🚀 Fitur Utama

### Untuk Masyarakat
- Pendaftaran dan autentikasi pengguna
- Pengajuan laporan/aspirasi dengan lampiran foto
- Melihat riwayat laporan
- Menerima notifikasi status laporan
- Melihat respon dari admin

### Untuk Admin
- Dashboard analitik laporan
- Manajemen laporan masyarakat
- Pembaruan status laporan
- Balasan dan tindak lanjut laporan
- Ekspor data laporan

### Status Laporan
- **Terkirim** - Laporan baru masuk
- **Diproses** - Sedang dalam penanganan
- **Selesai** - Telah diselesaikan
- **Ditolak** - Tidak memenuhi kriteria

## 🛠️ Persyaratan Sistem

- PHP 8.1 atau lebih tinggi
- Composer
- Database (MySQL 5.7+ / MariaDB 10.3+)
- Node.js & NPM (untuk aset frontend)
- Web Server (Apache/Nginx)

## 🚀 Panduan Instalasi

### 1. Clone Repository
```bash
git clone https://github.com/username/repository.git
cd nama-repo
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Konfigurasi Environment
Salin file .env.example ke .env:
```bash
cp .env.example .env
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Konfigurasi Database
Buka file .env dan sesuaikan dengan konfigurasi database Anda:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username
DB_PASSWORD=password
```

### 6. Migrasi Database
```bash
php artisan migrate --seed
```

### 7. Link Storage
```bash
php artisan storage:link
```

### 8. Kompilasi Aset
```bash
npm run dev


### 9. Jalankan Aplikasi
```bash
php artisan serve
```

Akses aplikasi di: http://localhost:8000

## 🔐 Akun Default
**Admin:**
- Email: admin@gmail.com
- Password: password

**User:**
- Email: user@gmail.com
- Password: password
