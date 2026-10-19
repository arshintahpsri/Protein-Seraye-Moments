# Seraye Moments — konteks proyek untuk Claude Code

Pemilik repo: Fadhlan (Informatika Telkom). Balas dalam **bahasa Indonesia**.
Peran Fadhlan di tim: **frontend**. Backend (database, auth, booking, admin, fotografer) dikerjakan anggota tim lain.

## Tentang proyek

**Seraye Moments** — Sistem Informasi Terintegrasi Layanan Fotografi (web saja).
Peran pengguna: **pelanggan**, **admin**, **fotografer**.
Tim sepakat memakai **Laravel**.

## Stack

- Laravel 13 (PHP 8.3+), SQLite bawaan (bisa diganti di `.env`)
- Blade + **Tailwind CSS v4** (token di `@theme`, plugin `@tailwindcss/vite`) + **Alpine.js 3**
- Vite (`laravel-vite-plugin`)
- Font lewat npm: `@fontsource-variable/outfit` (sans) dan `@fontsource-variable/playfair-display` (serif)

Menjalankan: `composer install`, `cp .env.example .env`, `php artisan key:generate`, `touch database/database.sqlite`, `php artisan migrate`, `npm install`, lalu `npm run dev` + `php artisan serve`.

## Struktur frontend

| Lokasi | Isi |
|---|---|
| `routes/web.php` | Route bernama: `home`, `services`, `booking`, `portfolio`, `portal`, `about` (redirect ke `/#pilar`). Dipakai header/footer — jangan ganti nama sembarangan |
| `resources/views/layouts/app.blade.php` | Layout dasar |
| `resources/views/partials/` | `header` (desktop + mobile), `bottom-nav` (tab bawah, mobile), `footer` (desktop saja), `icon` (SVG inline, ~56 ikon), `photo` (foto + placeholder bila file belum ada) |
| `resources/views/pages/` | `home`, `services`, `booking`, `portal` (desktop, tampil ≥ lg), `portfolio` (kerangka kosong) |
| `resources/views/pages/mobile/` | Versi mobile tiap halaman (tampil < lg), di-`@include` dari halaman desktop. Desain mobile punya teks/susunan sendiri, jadi dibuat terpisah, bukan sekadar responsif |
| `resources/css/app.css` | Token warna/font/bayangan + kelas `.page`, `.btn(-primary/-soft/-light/-clay)`, `.eyebrow`, `.chip`, `.photo-placeholder` |
| `resources/js/app.js` | Alpine + komponen `booking` (kalender & pilihan sesi) |
| `config/seraye.php` | `whatsapp_url` dari `SERAYE_WHATSAPP_URL` |
| `public/images/` | Foto (lihat daftar di bawah) |

Ikon dipanggil: `@include('partials.icon', ['name' => 'check', 'class' => 'size-4'])`. Tambah ikon baru di array `$icons` pada `partials/icon.blade.php`.
Foto dipanggil: `@include('partials.photo', ['src' => 'nama.jpg', 'alt' => '...', 'class' => '...'])`.

## Desain (Figma)

File: https://www.figma.com/design/P7o4pfDtxQ4W5p9kEMVXJd/Untitled?node-id=0-1
Page 1 = desktop, Page 2 = mobile (390px): Home, Services & Packages, Booking & Schedule, Client Portal & Invoice. Keduanya sudah dibangun.
Mobile: header 64px (logo "Seraye", tombol BOOK, hamburger, avatar), tab bawah 4 menu (Studio/Services/Portfolio/Portal), footer tidak ada (di Services diganti tanda tangan "Seraye Moments · Est. 2022"). Booking mobile: header tombol kembali + judul, stepper, bar CTA melayang di bawah, tanpa tab bawah. Portal mobile: tab "Digital Invoice" / "Live Tracker" (Alpine).

Token (di `app.css`): paper `#FBF9F6`, sand `#F5F3F0`, mist `#E4E2DF`, ink `#1B1C1A`, ink-soft `#44483F`, olive `#435A34`, clay `#7F5252`, moss `#5B734A`, chip leaf `#D0EBB9`/`#0C2002`, rose `#FFDAD9`/`#321112`, honey `#FFE088`/`#241A00` (sudah dicocokkan dengan panel Properties Figma).
Tanda `≈` di `app.css` tinggal `olive-deep` dan `clay-deep` (warna hover; tidak digambar di Figma).
Figma memakai **Montserrat** (600, 10–11px, kapital) untuk label/chip/tab, sedangkan kode memakai Outfit untuk semuanya — belum diputuskan apakah Montserrat ditambahkan.
Spesifikasi Portal mobile dari Figma: H1 Playfair 500 28/36 tanpa tracking, kartu sambutan padding 16, nama klien Outfit 500 18/26, judul seksi Playfair 600 22/30. Halaman mobile lain belum diaudit dengan cara ini (kemungkinan masih memakai H1 32px/600).
H1: Playfair Display 600, 56/64, tracking -0.02em. Body: Outfit. Eyebrow: 11px kapital, tracking 0.12em.
Header sticky 80px, container maks 1360px (px 24 → 48), footer `#F5F3F0`.
Teks di views diambil persis dari Figma (bahasa campuran Indonesia/Inggris) — jangan "diperbaiki" tanpa cek Figma.

## Foto yang diharapkan di `public/images/`

`hero-wisuda.jpg`, `keepsake-gulungan.jpg`, `photobooth-1.jpg`, `photobooth-2.jpg`, `photobooth-3.jpg`,
`layanan-wisuda.jpg`, `layanan-event.jpg`, `paket-balairung.jpg`, `portal-balairung.jpg`, `portal-memo-lensa.jpg`, `portal-memo-cahaya.jpg`.
Sudah ada (di-export dari Figma, JPEG 2x/4x). Catatan: `keepsake-gulungan` dan `photobooth-1..3` di Figma berupa tangkapan layar halaman (ada header/teks/rotasi), jadi di-crop manual dan resolusinya rendah — ganti dengan foto asli bila ada. `portal-balairung` (636×224) juga kecil untuk desktop. Bila file hilang tampil placeholder bertuliskan nama file.

## Status

**Selesai (desktop + mobile):** Home, Services & Packages, Booking & Schedule (interaktif), Client Portal & Invoice.
Cek overflow horizontal lolos di lebar 360–1440. Sudah dijalankan di Laravel sungguhan (5 halaman 200, tanpa error console, tanpa overflow horizontal di 390 & 1280).

## Yang belum / perlu dikerjakan

1. ~~Jalankan proyek~~ — selesai.
2. Bandingkan hasil mobile dengan Figma Page 2 secara visual di perangkat nyata (sudah dicek di 390/360px, tetapi tidak di Laravel sungguhan). Kalender Booking mobile menampilkan satu bulan penuh; di Figma hanya terlihat dua baris (minggu 19–25 dan 26–2).
3. ~~Cocokkan warna `≈`~~ — selesai kecuali olive-deep/clay-deep (hover). Audit tipografi/spacing Home, Services, Booking mobile terhadap Figma (Portal sudah).
4. Home desktop: teks kutipan dan atribusi masih `TODO` di `home.blade.php`. Keterangan foto hero sudah terkonfirmasi dari Figma mobile ("Archive No. 248 / Wisuda Renjana / 35mm Warm Tone"). Mobile: teks Photo Booth terpotong di Figma, chip anchor ke-3 di Services terpotong ("KONS…") — keduanya `TODO`.
5. Portfolio: belum ada desain Figma (halaman masih kerangka).
6. Brand Guidelines.pdf belum pernah dibaca — minta file-nya ke Fadhlan untuk cek warna/font.
7. Layar untuk **login, dashboard admin, dan dashboard fotografer (upload hasil foto)** belum ada desainnya, padahal ada di SRS.

## Untuk backend (data masih statis)

- `portal.blade.php`: data klien/invoice/milestone ada di blok `@php` di atas — ganti dengan data dari controller.
- `resources/js/app.js` → `Alpine.data('booking')`: array `slots` masih contoh. Ganti dengan data server (mis. fetch per tanggal).
- Form booking mengirim `tanggal` (YYYY-MM-DD) dan `jam` (HH:MM) lewat input hidden; `action="#"` perlu route penyimpanan. Ada `@csrf`.
- Tombol "Download Invoice PDF" dan "Lihat Vault Foto" masih `href="#"`.

## Ketidaksesuaian Figma vs SRS (bahas dengan tim sebelum backend)

- Paket dan harga di Figma berbeda dengan SRS.
- Figma menyebut pembayaran QRIS, Virtual Account (BCA, Mandiri), dan kartu kredit; SRS hanya QRIS.
- Kota/lokasi di Figma (Depok, Yogyakarta) berbeda dengan SRS.
- Figma desktop dan mobile saling berbeda: Services desktop memakai 3 paket dengan harga 450k/750k/1.250k, mobile juga 450.000/750.000/1.250.000 tetapi teks fitur berbeda; testimoni desktop "420+ wisudawan", mobile "320+ wisudawan UGM, UNY, UII"; Booking desktop memakai lokasi Balairung UI Depok, Services menyebut Yogyakarta. Minta tim desain menyamakan.

## Aturan kerja

- Ikuti gaya yang sudah ada: kelas utilitas Tailwind di Blade, komponen kecil lewat partial; jangan tambah library UI baru tanpa alasan.
- Interaktivitas pakai Alpine; hindari `@click`-style shorthand yang bentrok dengan Blade — pakai `x-on:click` / `x-bind:`.
- Jaga aksesibilitas: label form, `aria-*` pada stepper/kalender, fokus terlihat, dukung `prefers-reduced-motion`.
- Setiap perubahan tampilan: cek di lebar 390 dan 1280, pastikan tidak ada scroll horizontal.
- Laravel Boost (bawaan skeleton, lihat `AGENTS.md`) opsional; boleh dipasang bila Fadhlan mau.
