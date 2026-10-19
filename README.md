# Seraye Moments

Sistem Informasi Terintegrasi Layanan Fotografi — proyek Laravel (frontend sudah terpasang).

Frontend: Blade + Tailwind CSS v4 + Alpine.js, dibangun dengan Vite.

## Menjalankan

Syarat: PHP 8.3+, Composer, Node 20+.

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite   # DB bawaan: SQLite (bisa diganti di .env)
php artisan migrate

npm install
npm run dev          # terminal 1
php artisan serve    # terminal 2 → http://127.0.0.1:8000
```

## Halaman (frontend)

| URL | View | Status |
|---|---|---|
| `/` | `pages/home.blade.php` | selesai (desktop + mobile) |
| `/layanan` | `pages/services.blade.php` | selesai (desktop + mobile) |
| `/booking` | `pages/booking.blade.php` | selesai (desktop + mobile), kalender & sesi interaktif |
| `/portal` | `pages/portal.blade.php` | selesai (desktop + mobile), data masih contoh |
| `/portofolio` | `pages/portfolio.blade.php` | kerangka kosong — belum ada desain Figma |

Route ada di `routes/web.php` (nama route dipakai header/footer, jangan diganti sembarangan).
Layout dan komponen: `resources/views/layouts`, `resources/views/partials`. Versi mobile tiap halaman ada di `resources/views/pages/mobile/` (tampil di bawah 1024px, lengkap dengan tab navigasi bawah).
Token warna & komponen CSS: `resources/css/app.css`. Komponen Alpine `booking`: `resources/js/app.js`.

## Foto

Letakkan di `public/images/` (semua sudah ada, hasil export Figma; `keepsake-gulungan` dan `photobooth-1..3` aslinya tangkapan layar yang di-crop, resolusi rendah). Bila file hilang, tampil placeholder bertuliskan nama file:

`hero-wisuda.jpg`, `keepsake-gulungan.jpg`, `photobooth-1.jpg`, `photobooth-2.jpg`, `photobooth-3.jpg`,
`layanan-wisuda.jpg`, `layanan-event.jpg`, `paket-balairung.jpg`, `portal-balairung.jpg`,
`portal-memo-lensa.jpg`, `portal-memo-cahaya.jpg`

## Untuk tim backend

- Data di `portal.blade.php` (klien, invoice, milestone) dan slot jam di `resources/js/app.js` (`Alpine.data('booking')`) masih contoh statis — ganti dengan data dari controller/API.
- Form booking mengirim `tanggal` (YYYY-MM-DD) dan `jam` (HH:MM) lewat input hidden; `action="#"` perlu diganti dengan route penyimpanan.
- Login, dashboard admin, dan dashboard fotografer belum ada (belum ada desain Figma).
- Tautan WhatsApp studio: isi `SERAYE_WHATSAPP_URL` di `.env`.

## Belum dicocokkan dengan Figma

- Warna bertanda `≈` di `app.css` tinggal `olive-deep` dan `clay-deep` (hover, tidak ada di Figma).
- Teks kutipan dan keterangan foto hero di Home (ditandai `TODO`).
- Tata letak mobile sudah mengikuti Page 2 Figma; belum dicek di perangkat nyata. Teks Photo Booth (Home) dan chip ke-3 anchor bar (Services) terpotong di Figma.
- Teks Figma desktop vs mobile tidak selalu sama (mis. "420+ wisudawan" vs "320+ wisudawan UGM, UNY, UII").
