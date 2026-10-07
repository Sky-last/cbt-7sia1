<div align="center">

<h1>🖥️ CBT-SIA</h1>
<p><strong>Computer Based Test — Sistem Informasi Akademik</strong></p>

<p>
  <img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/Filament-3.x-FFA500?style=for-the-badge&logo=filament&logoColor=white" alt="Filament">
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
</p>

<p>Platform ujian online berbasis web untuk sekolah, dibangun dengan Laravel & Filament.</p>

</div>

---

## 📋 Tentang Proyek

**CBT-SIA** adalah sistem ujian berbasis komputer (Computer Based Test) yang dirancang untuk mempermudah pelaksanaan ujian secara digital di lingkungan sekolah. Sistem ini memiliki dua panel utama:

- **Panel Admin** (`/admin`) — untuk pengelolaan data oleh guru/staf
- **Panel Siswa** (`/Ujian`) — untuk siswa mengikuti ujian

---

## ✨ Fitur Utama

### 👨‍💼 Panel Admin
- Manajemen **Siswa**, **Guru**, **Mata Pelajaran**, dan **Kelas**
- Manajemen **Bank Soal** dengan pilihan ganda dan kunci jawaban
- Pembuatan **Sesi Ujian** dengan konfigurasi waktu, durasi, dan passing grade
- Dukungan mode **Exact Time** (waktu tepat) dan **Flexible** (batas expired)
- Rekap dan laporan **Hasil Ujian** seluruh siswa
- Analisis histori nilai per mata pelajaran

### 👨‍🎓 Panel Siswa
- Dashboard ujian yang menampilkan **sesi aktif** secara real-time
- Antarmuka pengerjaan soal yang bersih dan fokus
- Timer ujian otomatis sesuai durasi yang ditetapkan
- Rekap **histori ujian** lengkap dengan skor dan status kelulusan
- Histori nilai per **mata pelajaran**

---

## 🏗️ Teknologi

| Komponen | Teknologi |
|---|---|
| Backend Framework | Laravel 12.x |
| Admin Panel | Filament 3.x |
| Database | MySQL |
| Frontend | Blade + Tailwind CSS |
| Server | PHP 8.2+ |

---

## ⚙️ Instalasi

### Prasyarat
- PHP >= 8.2
- Composer
- MySQL
- Node.js & NPM

### Langkah Instalasi

```bash
# 1. Clone repository
git clone <repository-url> cbt-sia1
cd cbt-sia1

# 2. Install dependencies PHP
composer install

# 3. Install dependencies Node
npm install

# 4. Salin file environment
cp .env.example .env

# 5. Generate application key
php artisan key:generate
```

### Konfigurasi Database

Edit file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cbt_sia
DB_USERNAME=root
DB_PASSWORD=
```

### Setup Database & Data Awal

```bash
# Jalankan migrasi dan seeder
php artisan migrate --seed

# Build aset frontend
npm run build
```

### Jalankan Aplikasi

```bash
php artisan serve
```

Akses aplikasi di `http://localhost:8000`

---

## 🗂️ Struktur Panel

### Admin Panel — `/admin`
Login sebagai administrator/guru untuk mengelola seluruh data akademik dan ujian.

### Siswa Panel — `/Ujian`
Login sebagai siswa untuk melihat sesi ujian aktif dan mengikuti ujian.

---

## 📊 Alur Ujian

```
Admin buat sesi ujian
        ↓
Siswa login → Dashboard ujian
        ↓
Siswa klik "Mulai" → Halaman pengerjaan soal
        ↓
Jawab soal → Submit ujian
        ↓
Sistem kalkulasi skor → Simpan hasil
        ↓
Siswa lihat rekap & histori nilai
```

---

## 🔒 Aturan Tampil Sesi Ujian

Sesi ujian hanya ditampilkan di dashboard siswa apabila memenuhi kondisi berikut:

| Mode | Kondisi Tampil |
|---|---|
| **Exact Time** | Sudah melewati `started_at` dan belum habis durasi |
| **Flexible** + ada `expired_at` | Belum melewati tanggal `expired_at` |
| **Flexible** + tanpa `expired_at` | Selalu tampil (tidak ada batas waktu) |

---

## 📁 Struktur Direktori Penting

```
app/
├── Filament/
│   ├── Resources/          # Admin panel resources
│   │   ├── ExamResource
│   │   ├── StudentResource
│   │   ├── SubjectResource
│   │   └── ...
│   └── Test/               # Student panel resources
│       ├── Resources/
│       │   ├── ExamResource
│       │   └── ExamHistoryResource
│       └── Pages/
│           └── StudentSubjectHistory
├── Models/
│   ├── Exam.php
│   ├── Student.php
│   ├── Subject.php
│   ├── Question.php
│   ├── ExamResult.php
│   └── ExamResultDetail.php
database/
├── migrations/
└── seeders/
resources/
└── views/filament/
```

---

## 📄 Lisensi

Proyek ini dikembangkan untuk keperluan akademik.

