@extends('layouts.app')

@section('title', 'Services & Packages — Seraye Moments')
@section('description', 'Pilihan paket dokumentasi wisuda dan event dari Seraye Moments: Graduation Intimate, Group & Story, dan Full Milestone Celebration.')

@section('content')

@include('pages.mobile.services')

<div class="hidden lg:block">

{{-- ===================== HERO KATALOG ===================== --}}
<section aria-labelledby="judul-katalog" class="page pb-12 pt-10 lg:pb-16">
    <div class="grid gap-10 lg:grid-cols-[minmax(0,1fr)_auto] lg:items-end">
        <div>
            <p class="chip bg-rose-100 text-ink">
                <span class="size-1.5 rounded-full bg-ink"></span>
                Atelier Katalog Seraye · 2025 Release
            </p>
            <h1 id="judul-katalog" class="mt-6 font-serif text-[40px] font-semibold leading-[1.14] tracking-[-0.02em] sm:text-5xl lg:text-[56px] lg:leading-[64px]">
                Pilihan Dokumentasi
                <span class="block font-normal italic text-olive">Terbaik &amp; Terkurasi.</span>
            </h1>
            <p class="mt-6 max-w-[620px] text-base leading-relaxed text-ink-soft">
                Sentuhan hangat, kurasi estetik, dan kenangan tak lekang waktu untuk setiap tonggak perjalanan hidupmu di Yogyakarta &amp; sekitarnya. Kami memadukan estetika editorial cetak dengan kehangatan rasa.
            </p>
        </div>

        <dl class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div class="flex items-center gap-4 rounded-lg bg-sand px-5 py-4">
                <span class="grid size-11 place-items-center rounded-md bg-leaf-100 text-leaf-800">
                    @include('partials.icon', ['name' => 'star', 'class' => 'size-5 fill-current'])
                </span>
                <div class="flex flex-col-reverse">
                    <dt class="text-[10px] font-medium uppercase tracking-[0.08em] text-ink-soft">420+ wisudawan puas</dt>
                    <dd class="font-serif text-xl font-semibold">4.9 / 5.0</dd>
                </div>
            </div>
            <div class="flex items-center gap-4 rounded-lg bg-sand px-5 py-4">
                <span class="grid size-11 place-items-center rounded-md bg-rose-100 text-rose-800">
                    @include('partials.icon', ['name' => 'zap', 'class' => 'size-5'])
                </span>
                <div class="flex flex-col-reverse">
                    <dt class="text-[10px] font-medium uppercase tracking-[0.08em] text-ink-soft">Jaminan kurasi rilis</dt>
                    <dd class="font-serif text-xl font-semibold">7 Hari Kerja</dd>
                </div>
            </div>
        </dl>
    </div>

    <div class="mt-10 flex flex-col gap-4 border-t border-mist pt-6 lg:flex-row lg:items-center lg:justify-between">
        <div class="flex flex-wrap items-center gap-3">
            <span class="eyebrow !text-[10px] text-ink-soft">Layanan utama:</span>
            <a href="#layanan" class="chip !px-3.5 !py-2 bg-olive text-white">
                @include('partials.icon', ['name' => 'graduation-cap', 'class' => 'size-4'])
                Wisuda &amp; Personal
            </a>
            <a href="#layanan" class="chip !px-3.5 !py-2 bg-sand text-ink hover:bg-mist">
                @include('partials.icon', ['name' => 'users', 'class' => 'size-4'])
                Event &amp; Komunitas
            </a>
            <a href="#paket" class="chip !px-3.5 !py-2 bg-sand text-ink hover:bg-mist">
                @include('partials.icon', ['name' => 'table', 'class' => 'size-4'])
                Daftar Investasi
            </a>
        </div>
        <p class="flex items-center gap-2 text-[13px] text-ink-soft">
            @include('partials.icon', ['name' => 'circle-check', 'class' => 'size-4 text-olive'])
            Harga Transparan - Tanpa Biaya Tersembunyi
        </p>
    </div>
</section>

{{-- ===================== DUA PILAR LAYANAN ===================== --}}
<section id="layanan" aria-labelledby="judul-layanan" class="scroll-mt-24">
    <div class="page py-12 lg:py-16">
        <div class="grid gap-4 lg:grid-cols-[1fr_380px] lg:items-end lg:gap-16">
            <div>
                <p class="eyebrow !text-[10px] text-olive">01 · Ruang Lingkup Layanan</p>
                <h2 id="judul-layanan" class="mt-3 font-serif text-3xl font-semibold tracking-tight lg:text-4xl">Dua Pilar Kreasi Seraye</h2>
            </div>
            <p class="text-sm leading-relaxed text-ink-soft lg:text-right">
                Setiap sesi dirancang dengan mood visual editorial, pencahayaan natural terencana, serta alur pengerjaan yang transparan.
            </p>
        </div>

        @php
            $layanan = [
                [
                    'no' => '01', 'foto' => 'layanan-wisuda.jpg', 'altFoto' => 'Wisudawati berjubah toga memegang buket di depan bangunan kampus',
                    'overline' => 'Ritual kelulusan & milestone pribadi', 'judul' => 'Wisuda & Selebrasi Personal',
                    'tags' => ['Photography', 'Personal & Group', 'High-Res Edited', 'Cloud Vault Delivery'],
                    'isi' => 'Rayakan kelulusan bukan sekadar foto kaku di depan gedung fakultas. Seraye Moments mendokumentasikan rasa bangga, pelukan hangat keluarga, dan tawa sahabat melalui pendekatan storytelling bernuansa editorial majalah.',
                    'info' => [['palette', 'Palet Warna Editorial Signature Seraye'], ['cloud', 'Online Vault Aktif Hingga 6 Bulan']],
                    'labelHarga' => 'Mulai dari', 'harga' => 'IDR 450.000', 'satuan' => '/ sesi',
                    'cta' => 'Lihat Paket Wisuda', 'ctaIkon' => 'arrow-down', 'ctaHref' => '#paket', 'ctaGaya' => 'btn-primary',
                ],
                [
                    'no' => '02', 'foto' => 'layanan-event.jpg', 'altFoto' => 'Kerumunan penonton di acara komunitas malam hari dengan lampu gantung',
                    'overline' => 'Momen kolektif & aktivasi komunitas', 'judul' => 'Dokumentasi Event & Komunitas',
                    'tags' => ['Event Photography', 'Videography Reel', 'Project-Based', 'Appointment Booking'],
                    'isi' => 'Liputan dinamis untuk konser kampus, pameran seni rupa indie, gathering alumni, hingga kolaborasi organisasi. Kru Seraye berbaur dan merekam energi autentik audiens tanpa terasa canggung.',
                    'info' => [['zap', 'Cepat Rilis: Sameday / 24-Jam Highlight Reel'], ['video', 'Kru Multi-Kamera Siaga Seragam Rapi']],
                    'labelHarga' => 'Skala fleksibel', 'harga' => 'Custom Invoicing', 'satuan' => '/ brief',
                    'cta' => 'Request Appointment', 'ctaIkon' => 'calendar-plus', 'ctaHref' => route('booking'), 'ctaGaya' => 'btn-soft',
                ],
            ];
        @endphp

        <div class="mt-10 grid gap-8 md:grid-cols-2">
            @foreach ($layanan as $l)
                <article class="flex flex-col overflow-hidden rounded-lg bg-white shadow-card">
                    <div class="relative">
                        @include('partials.photo', ['src' => $l['foto'], 'alt' => $l['altFoto'], 'class' => 'aspect-[3/2] w-full object-cover'])
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>
                        <span class="chip absolute left-4 top-4 bg-paper/95 text-ink">Layanan {{ $l['no'] }}</span>
                        <div class="absolute inset-x-5 bottom-4 text-white">
                            <p class="text-[10px] font-medium uppercase tracking-[0.1em] text-white/85">{{ $l['overline'] }}</p>
                            <h3 class="mt-1 font-serif text-2xl font-semibold">{{ $l['judul'] }}</h3>
                        </div>
                    </div>

                    <div class="flex flex-1 flex-col p-5">
                        <ul class="flex flex-wrap gap-2" aria-label="Cakupan layanan">
                            @foreach ($l['tags'] as $i => $tag)
                                <li class="rounded px-2 py-1 text-[9px] font-semibold uppercase tracking-[0.08em] {{ $i === 0 ? 'bg-rose-100 text-rose-800' : 'bg-sand text-ink-soft' }}">{{ $tag }}</li>
                            @endforeach
                        </ul>

                        <p class="mt-4 text-[13px] leading-relaxed text-ink-soft">{{ $l['isi'] }}</p>

                        <ul class="mt-5 grid gap-3 rounded-md bg-sand p-4 text-xs sm:grid-cols-2">
                            @foreach ($l['info'] as [$ikon, $teks])
                                <li class="flex items-center gap-2.5 text-ink">
                                    @include('partials.icon', ['name' => $ikon, 'class' => 'size-4 shrink-0 text-clay'])
                                    {{ $teks }}
                                </li>
                            @endforeach
                        </ul>

                        <div class="mt-auto flex flex-wrap items-end justify-between gap-4 pt-6">
                            <div>
                                <p class="text-[10px] font-medium uppercase tracking-[0.08em] text-ink-soft">{{ $l['labelHarga'] }}</p>
                                <p class="mt-1 font-serif text-lg font-semibold text-olive">{{ $l['harga'] }} <span class="font-sans text-xs font-normal italic text-ink-soft">{{ $l['satuan'] }}</span></p>
                            </div>
                            <a href="{{ $l['ctaHref'] }}" class="btn {{ $l['ctaGaya'] }}">
                                {{ $l['cta'] }}
                                @if ($l['ctaIkon'] === 'arrow-down')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4" aria-hidden="true"><path d="M12 5v14"/><path d="m19 12-7 7-7-7"/></svg>
                                @else
                                    @include('partials.icon', ['name' => $l['ctaIkon'], 'class' => 'size-4'])
                                @endif
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- ===================== DAFTAR PAKET ===================== --}}
<section id="paket" aria-labelledby="judul-paket" class="scroll-mt-24 bg-sand">
    <div class="page py-16 lg:py-20">
        <header class="mx-auto max-w-2xl text-center">
            <p class="chip bg-leaf-100 text-leaf-800">Paket Wisuda Terkurasi!</p>
            <h2 id="judul-paket" class="mt-5 font-serif text-3xl font-semibold leading-tight tracking-tight lg:text-[40px]">
                Quality Over Quantity — Dirancang Untuk Bercerita
            </h2>
            <p class="mx-auto mt-4 max-w-xl text-sm leading-relaxed text-ink-soft">
                Pilih paket yang paling selaras dengan ritme perayaanmu. Setiap frame diproses dengan grading warna hangat khas Seraye, bebas dari warna pucat atau editan berlebihan.
            </p>
        </header>

        @php
            $paket = [
                [
                    'tingkat' => 'Tingkat 01 · Solo & Pasangan', 'nama' => 'Graduation Intimate', 'unggulan' => false,
                    'isi' => 'Fokus eksklusif pada wisudawan personal beserta keluarga inti dalam suasana santai tanpa terburu-buru.',
                    'harga' => 'IDR 450k', 'satuan' => '/ sesi', 'catatanHarga' => null,
                    'fitur' => [
                        ['90 Menit', 'durasi pemotretan leluasa'],
                        ['1 Fotografer Utama', 'bersertifikasi Seraye'],
                        ['20 Foto High-Res', 'color-graded & retouch halus'],
                        ['Seluruh File Asli', '(RAW/JPEG) di Cloud Drive'],
                        ['Private Online Web Gallery', '(Aktif 30 hari)'],
                    ],
                    'nonaktif' => ['Cinematic Video Reels', 'Cetak Mini Photobook Hardcover'],
                    'cta' => 'Pilih Paket Intimate',
                ],
                [
                    'tingkat' => 'Tingkat 02 · Geng & Sahabat Seperjuangan', 'nama' => 'Graduation Group & Story', 'unggulan' => true,
                    'isi' => 'Kombinasi komprehensif foto rombongan, candid ekspresif, plus video cinematic singkat yang dibagikan ke media sosial.',
                    'harga' => 'IDR 750k', 'satuan' => '/ sesi grup (maks 6 org)', 'catatanHarga' => 'Hanya +IDR 125.000 / orang untuk grup 6 orang',
                    'fitur' => [
                        ['120 Menit', 'durasi (Outdoor & Ikon Fakultas)'],
                        ['2 Fotografer', '(Lead + Candid Spotter)'],
                        ['40 Foto High-Res', 'full signature color grade'],
                        ['Seluruh File Asli', '(RAW/JPEG) di Cloud Vault Seraye'],
                        ['Cinematic 60s Reel Video', '(Audio lisensi resmi eksklusif)'],
                        ['Printed Mini Photobook', '14x14 cm hardcover eksklusif'],
                        ['Private Web Gallery', '(Aktif 60 hari)'],
                    ],
                    'nonaktif' => [],
                    'cta' => 'Pilih Paket Group & Story',
                ],
                [
                    'tingkat' => 'Tingkat 03 · Full Archival Keepsake', 'nama' => 'Full Milestone Celebration', 'unggulan' => false,
                    'isi' => 'Paket komplit tanpa batasan. Dari sesi studio privat hingga jalan santai di sudut kota Yogyakarta.',
                    'harga' => 'IDR 1.250k', 'satuan' => '/ hari', 'catatanHarga' => null,
                    'fitur' => [
                        ['180 Menit', '(Fleksibel Studio + Kampus/Outdoor)'],
                        ['Semua Foto Terpilih Diedit', '(Tanpa batas kuota edit)'],
                        ['Boutique Hardcover Photo Album', '20x20 cm (Linen Cover)'],
                        ['Teaser Video 4K + Reels', 'dengan wawancara singkat'],
                        ['Konsultasi Moodboard &', 'Wardrobe Stylist Seraye'],
                        ['Prioritas Rilis Akhir', '(Rilis 4 Hari Kerja)'],
                        ['Private Web Gallery Premium', '(Aktif 1 Tahun)'],
                    ],
                    'nonaktif' => [],
                    'cta' => 'Pilih Paket Milestone',
                ],
            ];
        @endphp

        <div class="mt-14 grid items-stretch gap-6 lg:grid-cols-3">
            @foreach ($paket as $p)
                <article class="relative flex flex-col rounded-lg bg-white p-6 {{ $p['unggulan'] ? 'z-10 border-2 border-olive shadow-card lg:-my-3' : 'border border-mist shadow-soft' }}">
                    @if ($p['unggulan'])
                        <span class="chip absolute -top-3.5 left-1/2 -translate-x-1/2 whitespace-nowrap bg-olive !py-1.5 text-white">
                            @include('partials.icon', ['name' => 'sparkles', 'class' => 'size-3'])
                            Rekomendasi Utama · Paling Favorit
                        </span>
                    @endif

                    <p class="text-[10px] font-medium uppercase tracking-[0.08em] text-ink-soft">{{ $p['tingkat'] }}</p>
                    <h3 class="mt-2 font-serif text-xl font-semibold">{{ $p['nama'] }}</h3>
                    <p class="mt-2 text-xs leading-relaxed text-ink-soft">{{ $p['isi'] }}</p>

                    <div class="-mx-6 mt-5 border-y border-mist/70 px-6 py-4 {{ $p['unggulan'] ? 'bg-sand' : '' }}">
                        <p class="text-[10px] font-medium uppercase tracking-[0.08em] text-ink-soft">Investasi mulai</p>
                        <p class="mt-1 font-serif text-[28px] font-semibold leading-none {{ $p['unggulan'] ? 'text-olive' : '' }}">
                            {{ $p['harga'] }}
                            <span class="font-sans text-[11px] font-normal text-ink-soft">{{ $p['satuan'] }}</span>
                        </p>
                        @if ($p['catatanHarga'])
                            <p class="mt-1.5 text-[10px] text-ink-soft">{{ $p['catatanHarga'] }}</p>
                        @endif
                    </div>

                    <ul class="mt-5 flex-1 space-y-3 text-xs leading-snug">
                        @foreach ($p['fitur'] as [$tebal, $biasa])
                            <li class="flex items-start gap-2.5">
                                @include('partials.icon', ['name' => 'circle-check', 'class' => 'mt-px size-4 shrink-0 text-olive'])
                                <span><strong class="font-semibold">{{ $tebal }}</strong> {{ $biasa }}</span>
                            </li>
                        @endforeach
                        @foreach ($p['nonaktif'] as $teks)
                            <li class="flex items-start gap-2.5 text-ink-soft/50 line-through">
                                @include('partials.icon', ['name' => 'circle', 'class' => 'mt-px size-4 shrink-0'])
                                <span>{{ $teks }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <a href="{{ route('booking') }}" class="btn mt-6 w-full {{ $p['unggulan'] ? 'btn-primary' : 'btn-soft' }}">{{ $p['cta'] }}</a>
                </article>
            @endforeach
        </div>

        <div class="mt-10 flex flex-col gap-3 rounded-md border border-mist bg-white/60 px-5 py-4 text-xs sm:flex-row sm:items-center sm:justify-between">
            <p class="flex items-start gap-3 text-ink-soft">
                @include('partials.icon', ['name' => 'plus-square', 'class' => 'size-5 shrink-0 text-olive'])
                <span><strong class="font-semibold text-ink">Add-On Tambahan Tersedia:</strong> Cetak Kanvas 40x60cm (+IDR 180k), Tambahan Waktu (+IDR 150k/jam), Roll Film Analog Asli 35mm (+IDR 220k termasuk cuci scan).</span>
            </p>
            <a href="#" class="eyebrow !text-[10px] inline-flex shrink-0 items-center gap-1 text-olive hover:underline">
                Lihat detail add-on
                @include('partials.icon', ['name' => 'arrow-right', 'class' => 'size-3'])
            </a>
        </div>
    </div>
</section>

{{-- ===================== ALUR LAYANAN ===================== --}}
<section aria-labelledby="judul-alur">
    <div class="page py-16">
        <div class="grid gap-4 lg:grid-cols-[1fr_380px] lg:items-end lg:gap-16">
            <div>
                <p class="eyebrow !text-[10px] text-olive">Alur layanan</p>
                <h2 id="judul-alur" class="mt-3 font-serif text-3xl font-semibold tracking-tight lg:text-4xl">Bagaimana Hari Istimewamu Diproses</h2>
            </div>
            <p class="text-sm leading-relaxed text-ink-soft">
                Alur kerja yang tenang, terprediksi, dan sepenuhnya transparan agar kamu bisa menikmati momen selebrasi tanpa rasa cemas.
            </p>
        </div>

        @php
            $alur = [
                ['1', 'Inquiry & Lock Jadwal', 'Pilih tanggal, diskusikan lokasi fakultas atau outdoor, dan amankan slot dengan DP ringan 30%.', 'bg-olive text-white'],
                ['2', 'Moodboard & Brief', 'Kami membagikan panduan pose natural, panduan outfit, dan rute pemotretan optimal sesuai arah cahaya matahari.', 'bg-sand text-ink'],
                ['3', 'The Shoot Day', 'Sesi santai bersama fotografer Seraye. Kami memandu pose luwes tanpa rasa kaku atau canggung di depan kamera.', 'bg-sand text-ink'],
                ['4', 'Archival Proof & Vault', 'Seluruh file color-graded dikirim ke Cloud Web Gallery dalam 7 hari kerja, siap diunduh dan dipamerkan.', 'bg-leaf-100 text-leaf-800'],
            ];
        @endphp
        <ol class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($alur as [$no, $judul, $isi, $warna])
                <li class="rounded-lg bg-white p-5 shadow-soft">
                    <span class="grid size-9 place-items-center rounded-md text-sm font-semibold {{ $warna }}">{{ $no }}</span>
                    <h3 class="mt-4 text-lg font-semibold">{{ $judul }}</h3>
                    <p class="mt-2 text-[13px] leading-relaxed text-ink-soft">{{ $isi }}</p>
                </li>
            @endforeach
        </ol>
    </div>
</section>

{{-- ===================== KOMITMEN + CTA ROMBONGAN ===================== --}}
<section aria-labelledby="judul-komitmen">
    <div class="page space-y-8 pb-16 lg:pb-20">

        <div class="grid gap-10 rounded-lg border border-mist/60 bg-white p-8 shadow-soft lg:grid-cols-[1fr_1.15fr] lg:p-12">
            <div>
                <p class="eyebrow !text-[10px] text-olive">Komitmen studio</p>
                <h2 id="judul-komitmen" class="mt-3 font-serif text-3xl font-semibold leading-tight tracking-tight">Mengapa Memilih Seraye Moments?</h2>
                <p class="mt-4 text-sm leading-relaxed text-ink-soft">
                    Kami memandang foto bukan sekadar file digital di memori gawai, melainkan warisan emosional yang akan kamu tengok kembali sepuluh tahun dari sekarang.
                </p>
                <ul class="mt-8 space-y-6">
                    <li class="flex gap-4">
                        <span class="grid size-8 shrink-0 place-items-center rounded-md bg-leaf-100 text-leaf-800">
                            @include('partials.icon', ['name' => 'leaf', 'class' => 'size-4'])
                        </span>
                        <div>
                            <h3 class="font-semibold">Grading Hangat Organik (Tanpa Filter Berlebihan)</h3>
                            <p class="mt-1 text-xs leading-relaxed text-ink-soft">Tone kulit natural asli orang Indonesia dengan kontras lembut filmis yang abadi.</p>
                        </div>
                    </li>
                    <li class="flex gap-4">
                        <span class="grid size-8 shrink-0 place-items-center rounded-md bg-rose-100 text-rose-800">
                            @include('partials.icon', ['name' => 'clock', 'class' => 'size-4'])
                        </span>
                        <div>
                            <h3 class="font-semibold">Tepat Waktu &amp; Bebas Penundaan</h3>
                            <p class="mt-1 text-xs leading-relaxed text-ink-soft">Jadwal tim tersistem rapi dengan komitmen rilis galeri maksimal 7 hari kerja.</p>
                        </div>
                    </li>
                </ul>
            </div>

            @php
                $metrik = [
                    ['98', 'On-Time Delivery', 'Galeri rilis dalam batas 7 hari', 'text-olive'],
                    ['96', 'Direct Recommendation', 'Direkomendasikan ke adik tingkat', 'text-clay'],
                    ['100', 'High-Res Vault', 'Penyimpanan cloud aman bergaransi', 'text-olive'],
                ];
            @endphp
            <div class="rounded-lg bg-sand p-6">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-[10px] font-medium uppercase tracking-[0.08em] text-ink-soft">Performa kepuasan klien 2024–2025</p>
                        <h3 class="mt-1 font-serif text-xl font-semibold">Rasio Pengiriman &amp; Kepuasan</h3>
                    </div>
                    <span class="chip shrink-0 bg-leaf-100 text-leaf-800">Audit Terverifikasi</span>
                </div>

                <ul class="mt-6 grid gap-4 sm:grid-cols-3">
                    @foreach ($metrik as [$nilai, $label, $isi, $warna])
                        <li class="rounded-md bg-white p-4 text-center shadow-soft">
                            <div class="relative mx-auto size-[60px] {{ $warna }}">
                                <svg viewBox="0 0 60 60" class="size-full -rotate-90" aria-hidden="true">
                                    <circle cx="30" cy="30" r="26" fill="none" stroke="currentColor" stroke-opacity="0.15" stroke-width="5"/>
                                    <circle cx="30" cy="30" r="26" fill="none" stroke="currentColor" stroke-width="5" stroke-linecap="round" pathLength="100" stroke-dasharray="{{ $nilai }} 100"/>
                                </svg>
                                <span class="absolute inset-0 grid place-items-center text-xs font-semibold text-ink">{{ $nilai }}%</span>
                            </div>
                            <p class="mt-3 text-[10px] font-semibold uppercase tracking-[0.06em]">{{ $label }}</p>
                            <p class="mt-1 text-[11px] leading-snug text-ink-soft">{{ $isi }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="grid items-center gap-8 rounded-lg bg-moss p-8 text-white shadow-card lg:grid-cols-[1fr_auto] lg:p-12">
            <div>
                <p class="chip bg-white/15 text-white !text-[10px]">
                    @include('partials.icon', ['name' => 'building', 'class' => 'size-3.5'])
                    Rombongan Fakultas / Angkatan Besar
                </p>
                <h2 class="mt-5 max-w-lg font-serif text-3xl font-semibold leading-tight lg:text-4xl">Ada konsep tematik atau rombongan fakultas?</h2>
                <p class="mt-4 max-w-xl text-[13px] leading-relaxed text-white/85">
                    Dapatkan proposal penawaran khusus untuk rombongan lebih dari 10 wisudawan atau organisasi kemahasiswaan dengan diskon kolektif hingga 25% dan opsi fotografer standby seharian penuh.
                </p>
            </div>
            <div class="flex flex-col gap-3 sm:flex-row lg:flex-col xl:flex-row">
                <a href="{{ config('seraye.whatsapp_url', '#') }}" class="btn btn-light">
                    @include('partials.icon', ['name' => 'chat', 'class' => 'size-4'])
                    Diskusi via WhatsApp
                </a>
                <a href="{{ route('booking') }}" class="btn bg-white/15 text-white hover:bg-white/25">
                    Kirim Formulir Brief
                    @include('partials.icon', ['name' => 'arrow-right', 'class' => 'size-4'])
                </a>
            </div>
        </div>
    </div>
</section>

</div>

@endsection
