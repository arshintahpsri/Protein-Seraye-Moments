@extends('layouts.app')

@section('title', 'Client Portal & Invoice — Seraye Moments')
@section('description', 'Pantau progres dokumentasi, lihat invoice digital, dan akses vault foto Seraye Moments.')

@section('content')

@include('pages.mobile.portal')

<div class="hidden lg:block">

@php
    // TODO backend: ganti seluruh data contoh ini dengan data booking milik pelanggan yang sedang login.
    $klien = ['nama' => 'Nadia Larasati', 'depan' => 'Nadia', 'institusi' => 'Universitas Indonesia', 'seri' => 'UI Balairung Series', 'sesi' => 'SM-2026-0424-08'];

    $invoice = [
        'nomor' => 'INV/SM/2026/04/082',
        'terbit' => '10 April 2026',
        'paket' => 'Paket Graduation Group & Story',
        'deskripsi' => 'Dokumentasi seremonial personal & rekan wisudawan terdekat',
        'harga' => 'Rp 750.000',
        'fitur' => [
            ['2 Jam', 'Durasi Dokumentasi Lapangan'],
            ['2 Fotografer', 'Profesional Seraye Moments'],
            ['40 Foto', 'Terkurasi & Full Retouched Tone'],
            ['Semua File', 'RAW & High-Res via Cloud Drive'],
        ],
    ];

    // status: selesai | berjalan | menunggu
    $milestone = [
        ['Booking Confirmed', '08 Apr 2026', 'Pemesanan awal tanggal telah dicatat dalam agenda studio.', 'selesai'],
        ['DP Paid (Terverifikasi)', '10 Apr 2026', 'Pembayaran 50% diterima. Slot fotografer terkunci.', 'selesai'],
        ['Schedule Confirmed', '12 Apr 2026', '24 April 2026, 11:00 WIB • Balairung UI (Pertemuan titik A).', 'selesai'],
        ['Photography Session', 'In Progress', 'Sesi lapangan berlangsung dalam 4 hari. Tim siap berkoordinasi langsung.', 'berjalan'],
        ['Editing & Color Grading', 'Est. 3-5 Hari', 'Penyortiran 40 karya terbaik dan sentuhan warna khas Seraye.', 'menunggu'],
        ['Photos Ready via Cloud Drive', 'Google Drive Vault', 'Tautan pribadi dengan proteksi enkripsi untuk download tanpa batas.', 'menunggu'],
        ['Completed Milestone', null, 'Arsip kenangan tersimpan rapi selamanya.', 'menunggu'],
    ];
@endphp

{{-- ===================== HERO PORTAL ===================== --}}
<section class="relative isolate overflow-hidden bg-sand" aria-labelledby="judul-portal">
    <div class="pointer-events-none absolute inset-0 -z-10" aria-hidden="true">
        <div class="absolute -left-24 top-0 size-[360px] rounded-full bg-rose-100/80 blur-[110px]"></div>
        <div class="absolute -right-24 -top-10 h-[420px] w-[520px] rounded-full bg-leaf-100/70 blur-[120px]"></div>
    </div>

    <div class="page flex flex-col gap-8 py-12 lg:flex-row lg:items-end lg:justify-between lg:py-16">
        <div>
            <p class="chip bg-white/80 text-olive shadow-soft">
                <span class="size-1.5 rounded-full bg-olive"></span>
                Portal Klien Eksklusif · Musim Wisuda 2026
            </p>
            <h1 id="judul-portal" class="mt-6 font-serif text-[40px] font-semibold leading-[1.14] tracking-[-0.02em] sm:text-5xl lg:text-[56px] lg:leading-[64px]">
                Your Moment, <span class="font-normal italic text-olive">All in One Place.</span>
            </h1>
            <p class="mt-5 max-w-xl text-base leading-relaxed text-ink-soft">
                Halo, {{ $klien['depan'] }}. Pantau persiapan dokumentasi wisudamu dan kelola rincian administrasi studio secara langsung.
            </p>
        </div>

        <div class="flex flex-col gap-3 lg:items-end">
            <div class="rounded-lg bg-white px-5 py-3 shadow-soft">
                <p class="text-[10px] font-semibold uppercase tracking-[0.1em] text-ink-soft">ID Sesi Aktif</p>
                <p class="mt-0.5 font-serif text-lg font-semibold text-olive">{{ $klien['sesi'] }}</p>
            </div>
            <p class="inline-flex items-center gap-2 rounded-full bg-white/80 px-4 py-2 text-xs font-medium shadow-soft">
                @include('partials.icon', ['name' => 'user', 'class' => 'size-3.5 text-olive'])
                {{ $klien['nama'] }} · {{ $klien['seri'] }}
            </p>
        </div>
    </div>
</section>

{{-- ===================== INVOICE + MILESTONE ===================== --}}
<section class="bg-sand pb-16 lg:pb-24">
    <div class="page grid items-start gap-8 lg:grid-cols-[minmax(0,1.35fr)_minmax(0,1fr)]">

        {{-- ---------- Invoice ---------- --}}
        <article class="overflow-hidden rounded-lg bg-white shadow-card" aria-labelledby="judul-invoice">
            <header class="flex flex-wrap items-center justify-between gap-4 border-b border-mist p-6 sm:p-8">
                <div>
                    <p id="judul-invoice" class="font-serif text-2xl font-semibold">Seraye Moments <span class="text-clay">✦</span></p>
                    <p class="mt-0.5 text-[10px] font-medium uppercase tracking-[0.12em] text-ink-soft">Studio Fotografi &amp; Videografi</p>
                </div>
                <span class="chip bg-leaf-100 text-leaf-800">Receipt / Digital Invoice</span>
            </header>

            <dl class="grid grid-cols-2 gap-x-6 gap-y-4 bg-sand/70 px-6 py-5 text-[13px] sm:grid-cols-4 sm:px-8">
                @foreach ([['No. Tagihan', $invoice['nomor']], ['Tanggal Terbit', $invoice['terbit']], ['Klien', $klien['nama']], ['Institusi', $klien['institusi']]] as [$k, $v])
                    <div>
                        <dt class="text-[10px] font-semibold uppercase tracking-[0.08em] text-ink-soft">{{ $k }}</dt>
                        <dd class="mt-0.5 font-medium">{{ $v }}</dd>
                    </div>
                @endforeach
            </dl>

            <div class="space-y-8 p-6 sm:p-8">
                <div class="relative overflow-hidden rounded-lg">
                    @include('partials.photo', ['src' => 'portal-balairung.jpg', 'alt' => 'Suasana Balairung UI, lokasi sesi pemotretan', 'class' => 'aspect-[16/7] w-full object-cover'])
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>
                    <div class="absolute inset-x-5 bottom-4 flex items-end justify-between gap-3 text-white">
                        <div>
                            <p class="text-[10px] font-semibold uppercase tracking-[0.1em] text-white/80">Pratinjau lokasi &amp; suasana</p>
                            <p class="mt-0.5 font-serif text-lg font-semibold">Balairung UI, Depok • Sesi Lapangan</p>
                        </div>
                        <span class="chip hidden shrink-0 bg-white/20 !text-[9px] text-white backdrop-blur sm:inline-flex">Archival Preview</span>
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between border-b border-mist pb-2 text-[10px] font-semibold uppercase tracking-[0.1em] text-ink-soft">
                        <h2>Rincian layanan terpilih</h2>
                        <span>Biaya</span>
                    </div>

                    <div class="mt-4 rounded-lg border border-mist p-5">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h3 class="font-serif text-lg font-semibold">{{ $invoice['paket'] }}</h3>
                                <p class="mt-1 text-xs text-ink-soft">{{ $invoice['deskripsi'] }}</p>
                            </div>
                            <p class="shrink-0 font-semibold">{{ $invoice['harga'] }}</p>
                        </div>
                        <ul class="mt-4 grid gap-2.5 text-xs sm:grid-cols-2">
                            @foreach ($invoice['fitur'] as [$tebal, $biasa])
                                <li class="flex items-start gap-2">
                                    @include('partials.icon', ['name' => 'circle-check', 'class' => 'mt-px size-4 shrink-0 text-olive'])
                                    <span><strong class="font-semibold">{{ $tebal }}</strong> {{ $biasa }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div>
                    <div class="flex items-center gap-4 text-[10px] font-semibold uppercase tracking-[0.1em] text-ink-soft">
                        <span class="h-px flex-1 bg-mist"></span>
                        <h2>Rangkuman finansial</h2>
                        <span class="h-px flex-1 bg-mist"></span>
                    </div>
                    <dl class="mt-5 space-y-3 text-sm">
                        <div class="flex justify-between"><dt class="text-ink-soft">Subtotal Layanan</dt><dd class="font-medium">Rp 750.000</dd></div>
                        <div class="flex justify-between"><dt class="text-ink-soft">Down Payment (50% Terverifikasi)</dt><dd class="font-medium text-olive">- Rp 375.000</dd></div>
                        <div class="flex items-end justify-between border-t border-mist pt-4">
                            <div>
                                <dt class="font-semibold">Sisa Pelunasan</dt>
                                <dd class="mt-0.5 text-[11px] text-ink-soft">Dibayarkan saat Sesi Hari H (24 Apr 2026)</dd>
                            </div>
                            <dd class="font-serif text-2xl font-semibold text-clay">Rp 375.000</dd>
                        </div>
                    </dl>
                </div>

                <div class="flex items-center gap-4 rounded-lg bg-leaf-100 p-4 text-leaf-800">
                    <span class="grid size-10 shrink-0 place-items-center rounded-full bg-white/70">
                        @include('partials.icon', ['name' => 'shield-check', 'class' => 'size-5'])
                    </span>
                    <div>
                        <p class="text-[10px] font-semibold uppercase tracking-[0.1em]">Status pembayaran</p>
                        <p class="mt-0.5 text-sm font-semibold">DP PAID · VERIFIED VIA BANK TRANSFER</p>
                    </div>
                </div>

                <div class="flex flex-col gap-3 sm:flex-row">
                    {{-- TODO backend: arahkan ke route unduh PDF & vault foto --}}
                    <a href="#" class="btn btn-primary flex-1">
                        @include('partials.icon', ['name' => 'download', 'class' => 'size-4'])
                        Download Invoice PDF
                    </a>
                    <a href="#" class="btn btn-soft flex-1">
                        @include('partials.icon', ['name' => 'image', 'class' => 'size-4'])
                        Lihat Vault Foto
                    </a>
                </div>
            </div>

            <footer class="border-t border-mist bg-sand/70 px-6 py-4 text-center text-[10px] leading-relaxed text-ink-soft sm:px-8">
                <p class="font-semibold uppercase tracking-[0.1em]">PT Seraye Karya Abadi · Jakarta Selatan · Digital Archival Ledger #82</p>
                <p class="mt-0.5">Dokumen elektronik sah hasil reservasi Seraye Moments.</p>
            </footer>
        </article>

        {{-- ---------- Milestone ---------- --}}
        <div class="space-y-6">
            <section class="rounded-lg bg-white p-6 shadow-card sm:p-8" aria-labelledby="judul-milestone">
                <header class="flex items-start justify-between gap-3">
                    <div>
                        <p class="text-[10px] font-semibold uppercase tracking-[0.1em] text-olive">Progres dokumentasi</p>
                        <h2 id="judul-milestone" class="mt-1 font-serif text-2xl font-semibold">Milestone Tracker</h2>
                    </div>
                    <span class="chip shrink-0 bg-sand text-ink-soft !text-[9px]">Langkah 4 dari 7</span>
                </header>

                <ol class="mt-8">
                    @foreach ($milestone as $i => [$judul, $tag, $isi, $status])
                        <li class="relative flex gap-4 pb-6 last:pb-0" @if ($status === 'berjalan') aria-current="step" @endif>
                            @if ($i < count($milestone) - 1)
                                <span class="absolute left-[15px] top-8 bottom-0 w-px {{ $status === 'selesai' ? 'bg-olive/40' : 'bg-mist' }}" aria-hidden="true"></span>
                            @endif

                            <span class="relative grid size-8 shrink-0 place-items-center rounded-full
                                @if ($status === 'selesai') bg-olive text-white
                                @elseif ($status === 'berjalan') bg-clay text-white ring-4 ring-rose-100
                                @else bg-sand text-ink-soft/60 @endif">
                                @if ($status === 'selesai')
                                    @include('partials.icon', ['name' => 'check', 'class' => 'size-4', 'stroke' => 3])
                                @elseif ($status === 'berjalan')
                                    @include('partials.icon', ['name' => 'circle-dot', 'class' => 'size-4'])
                                @else
                                    @include('partials.icon', ['name' => 'circle', 'class' => 'size-4'])
                                @endif
                            </span>

                            <div class="min-w-0 flex-1 {{ $status === 'berjalan' ? 'rounded-lg bg-rose-100/70 p-3 -mt-1.5' : '' }} {{ $status === 'menunggu' ? 'opacity-70' : '' }}">
                                <div class="flex flex-wrap items-baseline justify-between gap-x-3">
                                    <h3 class="text-sm font-semibold">{{ $judul }}</h3>
                                    @if ($tag)
                                        <span class="text-[10px] font-semibold uppercase tracking-[0.06em] {{ $status === 'berjalan' ? 'text-clay' : 'text-ink-soft' }}">{{ $tag }}</span>
                                    @endif
                                </div>
                                <p class="mt-1 text-xs leading-relaxed text-ink-soft">{{ $isi }}</p>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </section>

            <section class="rounded-lg bg-white p-6 shadow-card sm:p-8" aria-labelledby="judul-memo">
                <header class="flex items-center justify-between gap-3">
                    <h2 id="judul-memo" class="font-serif text-xl font-semibold">Studio Archival Memo</h2>
                    <span class="chip bg-rose-100 text-rose-800 !text-[9px]">Catatan Tim</span>
                </header>

                <div class="mt-5 grid gap-3 sm:grid-cols-2">
                    <div class="rounded-md bg-sand p-4">
                        <p class="flex items-center gap-2 text-[10px] font-semibold uppercase tracking-[0.1em] text-olive">
                            @include('partials.icon', ['name' => 'camera', 'class' => 'size-3.5'])
                            Lensa &amp; Gear
                        </p>
                        <p class="mt-2 text-xs leading-relaxed text-ink-soft">Dual Prime Lens (35mm f/1.4 &amp; 85mm f/1.8) disiapkan untuk visual detail toga &amp; potret natural.</p>
                    </div>
                    <div class="rounded-md bg-sand p-4">
                        <p class="flex items-center gap-2 text-[10px] font-semibold uppercase tracking-[0.1em] text-olive">
                            @include('partials.icon', ['name' => 'sun', 'class' => 'size-3.5'])
                            Pencahayaan
                        </p>
                        <p class="mt-2 text-xs leading-relaxed text-ink-soft">Rekomendasi area bayang pepohonan Balairung pukul 11:00 WIB, dilanjutkan sesi golden hour bila waktu mencukupi.</p>
                    </div>
                </div>

                <p class="mt-4 flex items-start gap-2.5 rounded-md bg-leaf-100 p-3 text-xs leading-relaxed text-leaf-800">
                    @include('partials.icon', ['name' => 'info', 'class' => 'mt-px size-4 shrink-0'])
                    Harap hadir di titik kumpul Balairung 15 menit sebelum waktu pemotretan untuk persiapan toga dan aksesoris.
                </p>
            </section>

            <section class="flex flex-col gap-5 rounded-lg bg-olive p-6 text-white shadow-card sm:flex-row sm:items-center sm:justify-between sm:p-8" aria-labelledby="judul-concierge">
                <div class="flex items-start gap-4">
                    <span class="grid size-11 shrink-0 place-items-center rounded-full bg-white/15">
                        @include('partials.icon', ['name' => 'headset', 'class' => 'size-5'])
                    </span>
                    <div>
                        <h2 id="judul-concierge" class="font-serif text-lg font-semibold">Concierge Studio Seraye</h2>
                        <p class="mt-1 text-xs text-white/80">Perlu penyesuaian jam atau info tambahan lokasi?</p>
                    </div>
                </div>
                <a href="{{ config('seraye.whatsapp_url', '#') }}" class="btn btn-light shrink-0">
                    @include('partials.icon', ['name' => 'chat', 'class' => 'size-4'])
                    Chat WhatsApp
                </a>
            </section>
        </div>
    </div>
</section>

</div>

@endsection
