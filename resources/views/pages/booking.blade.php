@extends('layouts.app')

@section('title', 'Booking & Schedule — Seraye Moments')
@section('description', 'Pilih tanggal, sesi, dan lengkapi data pemesan untuk mengamankan slot dokumentasi wisudamu.')

@section('content')

@include('pages.mobile.booking')

<div class="hidden lg:block">

@php
    // Langkah reservasi: status = selesai | aktif | belum
    $langkah = [
        ['01', 'Layanan', 'Graduation Series', 'selesai'],
        ['02', 'Paket', 'Balairung UI Exclusive', 'selesai'],
        ['03', 'Jadwal', null, 'aktif'], // teks dinamis dari Alpine
        ['04', 'Data Pemesan', 'Detail & Wisudawan', 'belum'],
        ['05', 'Pembayaran', 'Konfirmasi DP 50%', 'belum'],
    ];

    // Field formulir: [name, label, type, placeholder, ikon, bantuan]
    $field = [
        ['nama', 'Nama lengkap wisudawan / pemesan', 'text', 'Nadia Larasati', 'id-card', null],
        ['whatsapp', 'Nomor WhatsApp aktif', 'tel', '+62 812-3456-7890', 'chat', 'Untuk link grup koordinasi H-3 shoot'],
        ['email', 'Email kampus / pribadi', 'email', 'nadia.larasati@campus.ac.id', 'mail', 'Akses ke Google Drive & Client Vault'],
        ['universitas', 'Universitas / institusi', 'text', 'Universitas Indonesia', 'building', null],
        ['prodi', 'Fakultas & program studi', 'text', 'Ilmu Komunikasi (FISIP)', 'book-open', null],
    ];

    $ringkasan = [
        ['camera', 'Koleksi layanan', 'Graduation Photography (Story & Group)', 'Paket Balairung UI • 90 Menit'],
        ['calendar', 'Jadwal & jam sesi', null, null], // dinamis
        ['map-pin', 'Lokasi pemotretan', 'Spot Balairung Utama UI', 'Universitas Indonesia, Depok'],
        ['users', 'Alokasi tim Seraye', '1 Lead Photographer + 1 Assistant', 'Reflector & Lighting Kit Siap Lapangan'],
    ];
@endphp

<div class="relative isolate overflow-hidden" x-data="booking">
    {{-- Ambient glow --}}
    <div class="pointer-events-none absolute inset-0 -z-10" aria-hidden="true">
        <div class="absolute -left-32 top-10 size-[420px] rounded-full bg-leaf-100/60 blur-[120px]"></div>
        <div class="absolute -right-24 top-[520px] size-[380px] rounded-full bg-rose-100/70 blur-[120px]"></div>
    </div>

    <div class="page py-10 lg:py-14">

        {{-- ============ STEPPER ============ --}}
        <nav aria-label="Langkah reservasi" class="rounded-lg bg-white p-5 shadow-card sm:p-6">
            <ol class="grid grid-cols-2 gap-x-4 gap-y-5 sm:grid-cols-3 lg:grid-cols-5">
                @foreach ($langkah as [$no, $judul, $sub, $status])
                    <li class="flex items-start gap-3" @if ($status === 'aktif') aria-current="step" @endif>
                        <span class="grid size-9 shrink-0 place-items-center rounded-full text-xs font-semibold
                            @if ($status === 'selesai') bg-olive text-white
                            @elseif ($status === 'aktif') bg-olive text-white ring-4 ring-leaf-100
                            @else bg-sand text-ink-soft @endif">
                            @if ($status === 'selesai')
                                @include('partials.icon', ['name' => 'check', 'class' => 'size-4', 'stroke' => 3])
                            @else
                                {{ $no }}
                            @endif
                        </span>
                        <div class="min-w-0">
                            <p class="text-[10px] font-semibold uppercase tracking-[0.1em] {{ $status === 'belum' ? 'text-ink-soft' : 'text-olive' }}">{{ $judul }}</p>
                            @if ($sub)
                                <p class="mt-0.5 text-[13px] {{ $status === 'belum' ? 'text-ink-soft' : 'font-medium text-ink' }}">{{ $sub }}</p>
                            @else
                                <p class="mt-0.5 text-[13px] font-medium text-ink" x-text="stepJadwal">24 Apr • 11:00 WIB</p>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ol>
            <div class="mt-6 h-1 overflow-hidden rounded-full bg-mist" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="60" aria-label="Kemajuan reservasi">
                <div class="h-full w-[60%] rounded-full bg-olive"></div>
            </div>
        </nav>

        {{-- TODO backend: ganti action="#" ke route('booking.store') --}}
        <form method="POST" action="#" class="mt-8 grid items-start gap-8 lg:grid-cols-[minmax(0,1fr)_373px]">
            @csrf
            <input type="hidden" name="tanggal" x-bind:value="tanggalIso">
            <input type="hidden" name="jam" x-bind:value="jam">

            {{-- ============ KOLOM KIRI ============ --}}
            <div class="space-y-6">

                {{-- Paket terpilih --}}
                <div class="flex flex-col gap-4 rounded-lg bg-sand p-5 sm:flex-row sm:items-center">
                    @include('partials.photo', ['src' => 'paket-balairung.jpg', 'alt' => 'Gedung Balairung Universitas Indonesia', 'class' => 'size-20 shrink-0 rounded-md object-cover'])
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="chip !text-[9px] bg-rose-100 text-rose-800">Wisuda UI &amp; Balairung Series</span>
                            <span class="inline-flex items-center gap-1 text-[11px] font-medium text-clay">
                                @include('partials.icon', ['name' => 'sparkles', 'class' => 'size-3'])
                                Terfavorit
                            </span>
                        </div>
                        <h2 class="mt-1.5 font-serif text-lg font-semibold">Balairung UI Exclusive Graduation</h2>
                        <p class="mt-0.5 text-xs text-ink-soft">90 Menit Sesi • 35 Edited Files • Semua RAW File</p>
                    </div>
                    <a href="{{ route('services') }}#paket" class="btn btn-soft self-start sm:self-center">Ubah paket</a>
                </div>

                {{-- ============ LANGKAH 3: JADWAL ============ --}}
                <section aria-labelledby="judul-jadwal" class="rounded-lg bg-white p-6 shadow-card sm:p-8">
                    <header class="flex flex-wrap items-start justify-between gap-4">
                        <div class="flex gap-4">
                            <span class="grid size-9 shrink-0 place-items-center rounded-full bg-olive text-sm font-semibold text-white">3</span>
                            <div>
                                <h2 id="judul-jadwal" class="font-serif text-2xl font-semibold">Pilih Tanggal &amp; Sesi Pemotretan</h2>
                                <p class="mt-1 text-[13px] leading-relaxed text-ink-soft">Musim Wisuda Periode Gasal — Slot Balairung Depok terbatas demi kualitas pencahayaan prima.</p>
                            </div>
                        </div>
                        <span class="chip bg-leaf-100 text-leaf-800 !text-[10px]">
                            <span class="size-1.5 animate-pulse rounded-full bg-olive"></span>
                            Pembaruan real-time
                        </span>
                    </header>

                    {{-- Kalender --}}
                    <div class="mt-6 rounded-lg border border-mist p-4 sm:p-6">
                        <div class="flex flex-wrap items-center justify-between gap-3">
                            <div class="flex items-center gap-3">
                                <h3 class="font-serif text-xl font-semibold" x-text="namaBulan">April 2026</h3>
                                <span class="chip bg-sand text-ink-soft !text-[9px]">Periode Wisuda Gasal</span>
                            </div>
                            <div class="flex gap-2">
                                <button type="button" x-on:click="pindahBulan(-1)" class="grid size-9 place-items-center rounded-md bg-sand hover:bg-mist" aria-label="Bulan sebelumnya">
                                    @include('partials.icon', ['name' => 'chevron-left', 'class' => 'size-4'])
                                </button>
                                <button type="button" x-on:click="pindahBulan(1)" class="grid size-9 place-items-center rounded-md bg-sand hover:bg-mist" aria-label="Bulan berikutnya">
                                    @include('partials.icon', ['name' => 'chevron-right', 'class' => 'size-4'])
                                </button>
                            </div>
                        </div>

                        <div class="mt-5 grid grid-cols-7 gap-1 text-center sm:gap-2" role="grid">
                            @foreach (['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'] as $h)
                                <div class="pb-2 text-[10px] font-semibold uppercase tracking-[0.08em] text-ink-soft" role="columnheader">{{ $h }}</div>
                            @endforeach

                            <template x-for="(c, i) in sel" x-bind:key="i + '-' + month">
                                <button type="button"
                                    x-on:click="pilihHari(c)"
                                    x-bind:disabled="c.luar"
                                    x-bind:aria-pressed="(!c.luar && c.d === day) ? 'true' : 'false'"
                                    x-bind:class="c.luar
                                        ? 'cursor-default text-ink-soft/30'
                                        : (c.d === day
                                            ? 'bg-olive text-white shadow-card'
                                            : (adalahProsesi(c) ? 'bg-rose-100 text-rose-800 hover:bg-rose-100/70' : 'hover:bg-sand'))"
                                    class="relative h-11 rounded-md text-sm font-medium transition-colors sm:h-12">
                                    <span x-text="c.d"></span>
                                    <span x-show="!c.luar && c.d === day" class="absolute bottom-1.5 left-1/2 size-1 -translate-x-1/2 rounded-full bg-white"></span>
                                </button>
                            </template>
                        </div>

                        <ul class="mt-5 flex flex-wrap gap-x-5 gap-y-2 border-t border-mist pt-4 text-[11px] text-ink-soft">
                            <li class="flex items-center gap-2"><span class="size-3 rounded bg-olive"></span><span>Tanggal Terpilih (<span x-text="tanggalPendek">24 Apr</span>)</span></li>
                            <li class="flex items-center gap-2"><span class="size-3 rounded bg-rose-100 ring-1 ring-rose-800/20"></span> Jadwal Prosesi UI</li>
                            <li class="flex items-center gap-2"><span class="size-3 rounded border border-mist"></span> Slot Normal</li>
                        </ul>
                    </div>

                    {{-- Slot jam --}}
                    <div class="mt-8">
                        <div class="flex flex-wrap items-end justify-between gap-2">
                            <h3 class="eyebrow !text-[10px] text-ink">Pilih jam sesi fotografer (<span x-text="tanggalHariBesar">JUMAT, 24 APRIL 2026</span>)</h3>
                            <p class="flex items-center gap-1.5 text-[11px] text-ink-soft">
                                @include('partials.icon', ['name' => 'timer', 'class' => 'size-3.5'])
                                Durasi: 90 Menit per Sesi
                            </p>
                        </div>

                        <div class="mt-4 grid gap-3 sm:grid-cols-2" role="radiogroup" aria-label="Jam sesi">
                            <template x-for="s in slots" x-bind:key="s.jam">
                                <button type="button" role="radio"
                                    x-on:click="pilihSlot(s)"
                                    x-bind:disabled="s.status !== 'tersedia'"
                                    x-bind:aria-checked="jam === s.jam ? 'true' : 'false'"
                                    x-bind:class="jam === s.jam && s.status === 'tersedia'
                                        ? 'bg-olive text-white border-olive shadow-card'
                                        : (s.status === 'tersedia' ? 'bg-white border-mist hover:border-olive' : 'bg-sand/70 border-transparent opacity-70 cursor-not-allowed')"
                                    class="flex flex-col gap-1 rounded-lg border p-4 text-left transition-colors">
                                    <span class="flex items-center justify-between gap-2">
                                        <span class="font-serif text-lg font-semibold" x-text="s.jam === jam && s.status === 'tersedia' ? s.jam + ' WIB' : s.jam"></span>
                                        <span class="rounded px-2 py-0.5 text-[9px] font-semibold uppercase tracking-[0.08em]"
                                            x-bind:class="jam === s.jam && s.status === 'tersedia' ? 'bg-white/20 text-white'
                                                : (s.status === 'terisi' ? 'bg-rose-100 text-rose-800'
                                                : (s.status === 'tutup' ? 'bg-mist text-ink-soft'
                                                : (s.sisa ? 'bg-honey-100 text-honey-800' : 'bg-leaf-100 text-leaf-800')))"
                                            x-text="jam === s.jam && s.status === 'tersedia' ? 'Aktif' : (s.status === 'terisi' ? 'Terisi' : (s.status === 'tutup' ? 'Tidak ada' : (s.sisa ? 'Sisa ' + s.sisa + ' slot' : 'Tersedia')))"></span>
                                    </span>
                                    <span class="text-[13px] font-medium" x-text="jam === s.jam && s.status === 'tersedia' ? 'Pilihan Anda' : s.nama"></span>
                                    <span class="text-[11px]" x-bind:class="jam === s.jam && s.status === 'tersedia' ? 'text-white/80' : 'text-ink-soft'" x-text="s.ket"></span>
                                </button>
                            </template>
                        </div>
                    </div>
                </section>

                {{-- ============ LANGKAH 4: DATA PEMESAN ============ --}}
                <section aria-labelledby="judul-data" class="rounded-lg bg-white p-6 shadow-card sm:p-8">
                    <header class="flex gap-4">
                        <span class="grid size-9 shrink-0 place-items-center rounded-full bg-sand text-sm font-semibold text-ink">4</span>
                        <div>
                            <h2 id="judul-data" class="font-serif text-2xl font-semibold">Data Pribadi &amp; Detail Acara</h2>
                            <p class="mt-1 text-[13px] leading-relaxed text-ink-soft">Informasi ini digunakan fotografer untuk koordinasi lapangan dan pengiriman arsip digital.</p>
                        </div>
                    </header>

                    @php
                        $kelasInput = 'w-full rounded-md border border-transparent bg-sand px-4 py-3 pr-11 text-sm text-ink placeholder:text-ink-soft/50 focus:border-olive focus:bg-white focus:outline-none';
                        $kelasLabel = 'mb-1.5 block text-[10px] font-semibold uppercase tracking-[0.08em] text-ink-soft';
                    @endphp

                    <div class="mt-8 grid gap-5 sm:grid-cols-2">
                        @foreach ($field as [$nama, $label, $tipe, $ph, $ikon, $bantuan])
                            <div>
                                <label for="f-{{ $nama }}" class="{{ $kelasLabel }}">{{ $label }} <span class="text-clay">*</span></label>
                                <div class="relative">
                                    <input id="f-{{ $nama }}" name="{{ $nama }}" type="{{ $tipe }}" required placeholder="{{ $ph }}" class="{{ $kelasInput }}">
                                    @include('partials.icon', ['name' => $ikon, 'class' => 'pointer-events-none absolute right-4 top-1/2 size-4 -translate-y-1/2 text-ink-soft/60'])
                                </div>
                                @if ($bantuan)
                                    <p class="mt-1.5 text-[11px] text-ink-soft">{{ $bantuan }}</p>
                                @endif
                            </div>
                        @endforeach

                        <div>
                            <label for="f-tgl" class="{{ $kelasLabel }}">Tanggal pelaksanaan wisuda</label>
                            <div class="relative">
                                <input id="f-tgl" type="text" readonly x-bind:value="tanggalPanjang" value="Jumat, 24 April 2026" class="{{ $kelasInput }} cursor-default">
                                @include('partials.icon', ['name' => 'calendar', 'class' => 'pointer-events-none absolute right-4 top-1/2 size-4 -translate-y-1/2 text-ink-soft/60'])
                            </div>
                            <p class="mt-1.5 text-[11px] text-ink-soft">Mengikuti tanggal yang kamu pilih di atas.</p>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="f-lokasi" class="{{ $kelasLabel }}">Titik kumpul / lokasi pemotretan <span class="text-clay">*</span></label>
                            <div class="relative">
                                <input id="f-lokasi" name="lokasi" type="text" required placeholder="Gedung Balairung UI / Selasar Rektorat" class="{{ $kelasInput }}">
                                @include('partials.icon', ['name' => 'map-pin', 'class' => 'pointer-events-none absolute right-4 top-1/2 size-4 -translate-y-1/2 text-ink-soft/60'])
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="f-catatan" class="{{ $kelasLabel }}">Catatan khusus sesi &amp; rombongan <span class="text-clay">*</span></label>
                            <textarea id="f-catatan" name="catatan" rows="4" required class="{{ str_replace('pr-11', 'pr-4', $kelasInput) }} resize-y" placeholder="Contoh: ingin foto bersama keluarga inti dan sahabat terdekat, dengan tone warna film hangat khas Seraye."></textarea>
                            <p class="mt-2 flex items-start gap-2 text-[11px] text-ink-soft">
                                @include('partials.icon', ['name' => 'info', 'class' => 'mt-px size-3.5 shrink-0 text-olive'])
                                Bisa membawa properti wisuda pribadi (buket bunga, selempang gelar, balon angka).
                            </p>
                        </div>
                    </div>
                </section>
            </div>

            {{-- ============ KOLOM KANAN: RINGKASAN ============ --}}
            <aside class="space-y-5 lg:sticky lg:top-28" aria-label="Ringkasan pemesanan">
                <div class="rounded-lg bg-white p-6 shadow-card">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <p class="text-[10px] font-semibold uppercase tracking-[0.1em] text-olive">Ringkasan pemesanan</p>
                            <h2 class="mt-1 font-serif text-xl font-semibold">Reservasi Slot</h2>
                        </div>
                        <span class="chip bg-honey-100 text-honey-800 !text-[9px]">DP 50% berlaku</span>
                    </div>

                    <dl class="mt-5 space-y-4">
                        @foreach ($ringkasan as [$ikon, $label, $judul, $sub])
                            <div class="flex gap-3">
                                <span class="grid size-9 shrink-0 place-items-center rounded-md bg-sand text-olive">
                                    @include('partials.icon', ['name' => $ikon, 'class' => 'size-4'])
                                </span>
                                <div class="min-w-0">
                                    <dt class="text-[10px] font-semibold uppercase tracking-[0.08em] text-ink-soft">{{ $label }}</dt>
                                    @if ($judul)
                                        <dd class="mt-0.5 text-[13px] font-semibold">{{ $judul }}</dd>
                                        <dd class="text-[11px] text-ink-soft">{{ $sub }}</dd>
                                    @else
                                        <dd class="mt-0.5 text-[13px] font-semibold" x-text="tanggalPanjang">Jumat, 24 April 2026</dd>
                                        <dd class="text-[11px] text-ink-soft" x-text="slotDipilih ? jam + ' WIB ' + (slotDipilih.ringkas || '') : 'Pilih jam sesi'">11:00 WIB (Sesi Siang Pasca-Sidang)</dd>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </dl>

                    <table class="mt-6 w-full border-t border-mist text-[13px]">
                        <caption class="sr-only">Rincian biaya</caption>
                        <tbody class="[&_td]:py-2 [&_td:last-child]:text-right">
                            <tr class="border-b border-mist/60"><td class="pt-4 text-ink-soft">Paket Balairung UI Exclusive</td><td class="pt-4 font-medium">Rp 750.000</td></tr>
                            <tr class="border-b border-mist/60"><td class="text-ink-soft">Biaya Booking Slot Kru Lapangan</td><td class="text-olive">Termasuk</td></tr>
                            <tr class="border-b border-mist/60"><td class="text-ink-soft">Hak Cipta Semua File RAW Master</td><td class="text-olive">Gratis</td></tr>
                            <tr><td class="pt-3 font-semibold">Total Nilai Paket</td><td class="pt-3 font-serif text-base font-semibold">Rp 750.000</td></tr>
                        </tbody>
                    </table>

                    <div class="mt-3 space-y-2 rounded-md bg-sand p-4 text-[13px]">
                        <p class="flex items-baseline justify-between"><span class="text-[10px] font-semibold uppercase tracking-[0.08em] text-olive">DP 50% hari ini</span><span class="font-serif text-xl font-semibold text-olive">Rp 375.000</span></p>
                        <p class="flex items-baseline justify-between text-ink-soft"><span class="text-xs">Pelunasan (H-1 Sesi Foto)</span><span class="font-medium">Rp 375.000</span></p>
                    </div>

                    <p class="mt-4 flex items-start gap-2 rounded-md bg-rose-100/70 p-3 text-[11px] leading-relaxed text-rose-800">
                        @include('partials.icon', ['name' => 'lock', 'class' => 'mt-px size-3.5 shrink-0'])
                        <span>Slot waktu <strong x-text="jam + ' WIB'">11:00 WIB</strong> dikunci sementara selama 30 menit sebelum berpindah ke pembayaran.</span>
                    </p>

                    <button type="submit" x-bind:disabled="!siapLanjut" class="btn btn-primary mt-5 w-full disabled:cursor-not-allowed disabled:opacity-50">
                        Lanjut ke pembayaran
                        @include('partials.icon', ['name' => 'arrow-right', 'class' => 'size-4'])
                    </button>

                    <div class="mt-4 flex gap-3 text-[11px] leading-relaxed text-ink-soft">
                        @include('partials.icon', ['name' => 'shield-check', 'class' => 'mt-0.5 size-4 shrink-0 text-olive'])
                        <p><strong class="block text-[10px] font-semibold uppercase tracking-[0.06em] text-ink">Bebas reschedule hingga H-7 tanpa penalti</strong>Tautan pembayaran resmi QRIS, Virtual Account BCA, Mandiri, &amp; Kartu Kredit.</p>
                    </div>
                </div>

                <figure class="rounded-lg bg-sand p-6">
                    <figcaption class="flex items-center gap-3">
                        <span class="grid size-10 place-items-center rounded-full bg-olive text-white">
                            @include('partials.icon', ['name' => 'camera', 'class' => 'size-4'])
                        </span>
                        <span>
                            <span class="block text-[10px] font-semibold uppercase tracking-[0.1em] text-olive">Catatan Lead Photographer</span>
                            <span class="block text-[13px] font-semibold">Arka Daniswara — Seraye UI Chapter</span>
                        </span>
                    </figcaption>
                    <blockquote class="mt-4 font-serif text-[14px] italic leading-relaxed text-ink-soft">
                        “Balairung jam 11:00 WIB sangat ideal untuk menangkap siluet pilar ikonis sebelum keramaian keluarga memuncak. Kami akan standby 15 menit lebih awal di selasar timur.”
                    </blockquote>
                </figure>
            </aside>
        </form>
    </div>
</div>

</div>

@endsection
