# PT.Winnicode Garude Teknologi
#Finace

Aplikasi manajemen keuangan perusahaan — catat pemasukan, pengeluaran, dan ekspor laporan dengan mudah. Dibangun menggunakan Laravel, Blade, Tailwind CSS, dan Vite.

## Ringkasan

- Backend: Laravel 11 (PHP)
- Frontend: Blade + Tailwind CSS
- Database: MySQL
- Build: Vite
- Export: Laravel Excel (Maatwebsite) / CSV

## Fitur Utama

- Autentikasi pengguna (login)
- Dashboard ringkasan pemasukan/pengeluaran dan saldo
- Manajemen transaksi: tambah / edit / hapus
- Kategori transaksi (opsional)
- Filter dan pencarian transaksi (rentang tanggal, jenis, teks)
- Ekspor laporan ke CSV atau Excel
- UI responsif dan animasi SVG untuk grafik

## Persyaratan Sistem

- PHP >= 8.2
- Composer
- Node.js & npm
- MySQL
- (Opsional) XAMPP untuk pengembangan lokal

## Instalasi & Menjalankan (Development)

1. Clone repository:

```bash
git clone <your-repo-url> C:\xampp\htdocs\MagangWinnicode
cd C:\xampp\htdocs\MagangWinnicode
```

2. Install dependencies:

```bash
composer install
npm install
```

3. Konfigurasi environment:

```bash
copy .env.example .env
php artisan key:generate
```

Edit file `.env` untuk konfigurasi database:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=magangwinnicode
DB_USERNAME=root
DB_PASSWORD=
```

4. Migrasi dan seeder (akan mengosongkan db jika menggunakan `migrate:fresh`):

```bash
php artisan migrate --seed
```

5. Jalankan server:

```bash
# Laravel (development)
php artisan serve

# Vite (opsional untuk live reload frontend)
npm run dev
```

6. Build assets untuk produksi:

```bash
npm run build
```

Akses aplikasi di: http://localhost:8000 (atau port yang ditampilkan oleh `php artisan serve`).

## Default (Seeder)

Jika seeder disertakan, akun demo biasanya dibuat saat `--seed` dijalankan. Contoh kredensial (periksa `database/seeders` untuk yang benar):

- Email: demo@finance.com
- Password: password

## Struktur Database (ringkas)

- `users`: data pengguna
- `categories`: kategori transaksi (opsional)
- `transactions`: menyimpan transaksi (type: income/expense, amount, date, description, category_id)

## Testing

Project ini menggunakan Pest/PHPUnit untuk pengujian. Jalankan:

```bash
./vendor/bin/pest
# atau
php artisan test
```

## Pengembangan & Kontribusi

- Ikuti standar PSR, gunakan migrations dan seeders untuk perubahan DB.
- Buat branch fitur (`feature/xxx`) dan kirim pull request.

## Publish / Push ke GitHub

Contoh perintah singkat untuk commit dan push:

```bash
git add .
git commit -m "Update README.md — reflect major changes"
git push origin main
```

Ganti `main` dengan nama branch Anda jika berbeda.

## Lisensi

Dokumen ini dan kode proyek mengikuti lisensi MIT (periksa header/`composer.json` untuk konfirmasi).

---

File README ini telah diperbarui agar sesuai dengan perubahan total aplikasi.
