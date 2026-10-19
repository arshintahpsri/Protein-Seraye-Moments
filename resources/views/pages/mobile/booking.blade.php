{{-- Tampilan mobile Booking & Schedule (Page 2 Figma). Header khusus (tombol kembali + judul) ada di partials/header. --}}
<div class="lg:hidden" x-data="booking">
    <h1 class="sr-only">Booking &amp; Schedule</h1>

    {{-- Stepper --}}
    @php
        $langkah = [['Layanan', 'selesai'], ['Paket', 'selesai'], ['Jadwal', 'aktif'], ['Data Diri', 'aktif'], ['Bayar', 'belum']];
    @endphp
    <nav aria-label="Langkah reservasi" class="bg-sand">
        <div class="mx-auto max-w-xl px-5 py-4">
            <div class="flex items-baseline justify-between gap-3">
                <p class="text-[12px] font-semibold uppercase tracking-[0.08em] text-olive">Langkah 03 &amp; 04 dari 05</p>
                <p class="text-[12px] text-ink-soft">Jadwal &amp; Data Diri</p>
            </div>
            <ol class="mt-4 flex">
                @foreach ($langkah as $i => [$label, $status])
                    <li class="relative flex flex-1 flex-col items-center gap-1.5 {{ $i < 4 ? "after:absolute after:left-1/2 after:top-4 after:h-0.5 after:w-full after:-translate-y-1/2 ".($i < 3 ? 'after:bg-olive' : 'after:bg-mist') : '' }}" @if ($i === 2) aria-current="step" @endif>
                        <span class="relative z-10 grid size-8 place-items-center rounded-full text-xs font-semibold
                            @if ($status === 'selesai') bg-olive text-white
                            @elseif ($status === 'aktif') bg-olive text-white ring-4 ring-leaf-100
                            @else bg-mist/70 text-ink-soft @endif">
                            @if ($status === 'selesai')
                                @include('partials.icon', ['name' => 'check', 'class' => 'size-4', 'stroke' => 3])
                            @else
                                {{ $i + 1 }}
                            @endif
                        </span>
                        <span class="text-[11px] {{ $status === 'aktif' ? 'font-semibold text-olive' : ($status === 'belum' ? 'text-ink-soft/70' : 'text-ink-soft') }}">{{ $label }}</span>
                    </li>
                @endforeach
            </ol>
        </div>
    </nav>

    <form id="form-booking-m" method="POST" action="#" class="mx-auto max-w-xl px-5 pb-[140px] pt-5">
        @csrf
        <input type="hidden" name="tanggal" x-bind:value="tanggalIso">
        <input type="hidden" name="jam" x-bind:value="jam">

        {{-- Layanan terpilih --}}
        <div class="flex items-center gap-4 rounded-lg bg-white p-4 shadow-soft">
            @include('partials.photo', ['src' => 'paket-balairung.jpg', 'alt' => 'Rombongan wisudawan berjubah hijau', 'class' => 'size-16 shrink-0 rounded-md object-cover'])
            <div class="min-w-0">
                <span class="chip !gap-1.5 !px-2 !py-1 !text-[9px] bg-rose-100 text-rose-800">
                    @include('partials.icon', ['name' => 'star', 'class' => 'size-3 fill-current'])
                    Graduation Story
                </span>
                <h2 class="mt-1.5 text-lg font-semibold leading-tight">Wisuda UI &amp; Balairung Series</h2>
                <p class="mt-0.5 text-[11px] text-ink-soft">Sesi 90 Menit • 35 Edited Files • Semua RAW</p>
            </div>
        </div>

        {{-- Langkah 03 --}}
        <section aria-labelledby="judul-jadwal-m" class="mt-8">
            <div class="flex items-end justify-between gap-3">
                <div>
                    <p class="text-[10px] font-semibold uppercase tracking-[0.12em] text-olive">Langkah 03</p>
                    <h2 id="judul-jadwal-m" class="font-serif text-2xl font-semibold">Pilih Tanggal &amp; Sesi</h2>
                </div>
                <span class="mb-1 inline-flex items-center gap-1.5 rounded-full bg-mist/60 px-2.5 py-1 text-[10px] font-medium text-ink-soft">
                    <span class="size-1.5 rounded-full bg-olive"></span>Slot Terbatas
                </span>
            </div>

            <div class="mt-4 rounded-lg bg-white p-4 shadow-soft">
                <div class="flex items-center justify-between">
                    <button type="button" x-on:click="pindahBulan(-1)" class="grid size-9 place-items-center rounded-md bg-sand" aria-label="Bulan sebelumnya">
                        @include('partials.icon', ['name' => 'chevron-left', 'class' => 'size-4'])
                    </button>
                    <div class="text-center">
                        <p class="font-serif text-lg font-semibold" x-text="namaBulan">April 2026</p>
                        <p class="text-[11px] text-ink-soft">Musim Wisuda Periode Gasal</p>
                    </div>
                    <button type="button" x-on:click="pindahBulan(1)" class="grid size-9 place-items-center rounded-md bg-sand" aria-label="Bulan berikutnya">
                        @include('partials.icon', ['name' => 'chevron-right', 'class' => 'size-4'])
                    </button>
                </div>

                <div class="mt-4 grid grid-cols-7 gap-1 text-center" role="grid">
                    @foreach (['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'] as $h)
                        <div class="pb-1 text-[10px] text-ink-soft" role="columnheader">{{ $h }}</div>
                    @endforeach
                    <template x-for="(c, i) in sel" x-bind:key="'m' + i + '-' + month">
                        <button type="button" x-on:click="pilihHari(c)" x-bind:disabled="c.luar"
                            x-bind:aria-pressed="(!c.luar && c.d === day) ? 'true' : 'false'"
                            x-bind:class="c.luar ? 'text-ink-soft/30' : (c.d === day ? 'bg-olive text-white' : 'bg-sand text-ink')"
                            class="relative h-10 rounded-md text-[13px] font-medium">
                            <span x-text="c.d"></span>
                            <span x-show="!c.luar && c.d === day" class="absolute bottom-1 left-1/2 size-1 -translate-x-1/2 rounded-full bg-white"></span>
                        </button>
                    </template>
                </div>

                <div class="mt-4 flex items-center gap-3 rounded-md bg-sand p-3">
                    <span class="grid size-9 shrink-0 place-items-center rounded-md bg-leaf-100 text-leaf-800">
                        @include('partials.icon', ['name' => 'calendar', 'class' => 'size-4'])
                    </span>
                    <div class="min-w-0 flex-1">
                        <p class="text-[10px] uppercase tracking-[0.08em] text-ink-soft">Tanggal Terpilih</p>
                        <p class="text-sm font-semibold" x-text="tanggalPanjang">Jumat, 24 April 2026</p>
                    </div>
                    <span class="shrink-0 rounded bg-rose-100 px-2 py-1 text-[10px] font-semibold text-rose-800">Hari H Wisuda</span>
                </div>
            </div>

            <div class="mt-5">
                <div class="flex items-baseline justify-between">
                    <h3 class="text-[11px] font-semibold uppercase tracking-[0.1em]">Pilih Sesi Jam</h3>
                    <p class="text-[11px] text-ink-soft">Zona Waktu: WIB</p>
                </div>
                <div class="mt-3 space-y-2" role="radiogroup" aria-label="Jam sesi">
                    <template x-for="s in slots" x-bind:key="'m' + s.jam">
                        <button type="button" role="radio"
                            x-on:click="pilihSlot(s)"
                            x-bind:disabled="s.status !== 'tersedia'"
                            x-bind:aria-checked="jam === s.jam ? 'true' : 'false'"
                            x-bind:class="jam === s.jam && s.status === 'tersedia' ? 'bg-olive text-white' : (s.status === 'tersedia' ? 'bg-white shadow-soft' : 'bg-sand/70 text-ink-soft/70')"
                            class="flex w-full items-center gap-3 rounded-lg px-4 py-3.5 text-left">
                            <span x-show="jam === s.jam && s.status === 'tersedia'" class="shrink-0">@include('partials.icon', ['name' => 'circle-check', 'class' => 'size-5 text-honey-100'])</span>
                            <span class="shrink-0 text-[17px] font-semibold" x-bind:class="s.status !== 'tersedia' ? 'line-through' : ''" x-text="s.jam"></span>
                            <span class="min-w-0 flex-1 text-[13px] leading-snug" x-bind:class="s.status !== 'tersedia' ? 'italic' : ''" x-text="s.m"></span>
                            <span class="shrink-0 rounded-full px-2.5 py-1 text-[10px] font-semibold"
                                x-bind:class="jam === s.jam && s.status === 'tersedia' ? 'bg-white/20 text-white' : (s.status === 'tersedia' ? 'bg-leaf-100 text-leaf-800' : 'bg-mist/70 text-ink-soft')"
                                x-text="jam === s.jam && s.status === 'tersedia' ? 'Sesi Pilihan Anda' : (s.status === 'terisi' ? 'Terisi' : (s.status === 'tutup' ? 'Tidak Tersedia' : 'Tersedia'))"></span>
                        </button>
                    </template>
                </div>
            </div>
        </section>

        {{-- Langkah 04 --}}
        <section aria-labelledby="judul-data-m" class="mt-10">
            <p class="text-[10px] font-semibold uppercase tracking-[0.12em] text-olive">Langkah 04</p>
            <h2 id="judul-data-m" class="font-serif text-2xl font-semibold">Data Pribadi &amp; Acara</h2>

            @php
                $kelasInput = 'w-full rounded-md border border-transparent bg-sand py-3.5 pl-11 pr-4 text-sm placeholder:text-ink-soft/50 focus:border-olive focus:bg-white focus:outline-none';
                $kelasLabel = 'mb-1.5 block text-[10px] font-semibold uppercase tracking-[0.08em] text-ink-soft';
                $kelasIkon  = 'pointer-events-none absolute left-4 top-1/2 size-4 -translate-y-1/2 text-ink-soft/70';
            @endphp

            <div class="mt-5 space-y-4">
                @foreach ([
                    ['nama', 'Nama Lengkap', 'text', 'Nadia Larasati', 'user', null],
                    ['whatsapp', 'Nomor WhatsApp', 'tel', '+62 812-3456-7890', 'chat', 'Pengiriman invoice & konfirmasi fotografer dikirim ke nomor ini.'],
                    ['email', 'Alamat Email Kampus / Pribadi', 'email', 'nadia.larasati@campus.ac.id', 'mail', null],
                ] as [$nama, $label, $tipe, $ph, $ikon, $bantuan])
                    <div>
                        <label for="m-{{ $nama }}" class="{{ $kelasLabel }}">{{ $label }}</label>
                        <div class="relative">
                            @include('partials.icon', ['name' => $ikon, 'class' => $kelasIkon])
                            <input id="m-{{ $nama }}" name="{{ $nama }}" type="{{ $tipe }}" required placeholder="{{ $ph }}" class="{{ $kelasInput }}">
                        </div>
                        @if ($bantuan)
                            <p class="mt-1.5 text-[11px] leading-snug text-ink-soft">{{ $bantuan }}</p>
                        @endif
                    </div>
                @endforeach

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label for="m-universitas" class="{{ $kelasLabel }}">Universitas</label>
                        <input id="m-universitas" name="universitas" type="text" required placeholder="Universitas Indonesia" class="{{ str_replace('pl-11', 'pl-4', $kelasInput) }}">
                    </div>
                    <div>
                        <label for="m-prodi" class="{{ $kelasLabel }}">Program Studi</label>
                        <input id="m-prodi" name="prodi" type="text" required placeholder="Ilmu Komunikasi" class="{{ str_replace('pl-11', 'pl-4', $kelasInput) }}">
                    </div>
                </div>

                <div>
                    <label for="m-tgl" class="{{ $kelasLabel }}">Tanggal Wisuda / Sesi</label>
                    <div class="relative">
                        @include('partials.icon', ['name' => 'calendar', 'class' => $kelasIkon])
                        <input id="m-tgl" type="text" readonly x-bind:value="tanggalPanjang" value="Jumat, 24 April 2026" class="{{ $kelasInput }} cursor-default font-semibold">
                    </div>
                </div>

                <div>
                    <label for="m-lokasi" class="{{ $kelasLabel }}">Lokasi Pemotretan</label>
                    <div class="relative">
                        @include('partials.icon', ['name' => 'map-pin', 'class' => $kelasIkon])
                        <input id="m-lokasi" name="lokasi" type="text" required placeholder="Gedung Balairung UI / Studio Depok" class="{{ $kelasInput }}">
                    </div>
                </div>

                <div>
                    <label for="m-catatan" class="{{ $kelasLabel }}">Catatan Khusus Sesi</label>
                    <textarea id="m-catatan" name="catatan" rows="4" placeholder="Ingin foto bersama keluarga inti dan 4 sahabat terdekat." class="{{ str_replace('pl-11', 'pl-4', $kelasInput) }} resize-y"></textarea>
                    <p class="mt-1.5 text-[11px] leading-snug text-ink-soft">Fotografer akan menyiapkan komposisi khusus untuk kelompok 6+ orang.</p>
                </div>
            </div>
        </section>

        {{-- Ringkasan pembayaran --}}
        <section aria-labelledby="judul-ringkasan-m" class="mt-10 rounded-lg bg-white p-4 shadow-soft">
            <div class="flex items-start justify-between gap-3">
                <h2 id="judul-ringkasan-m" class="font-serif text-2xl font-semibold leading-tight">Ringkasan Pembayaran</h2>
                <span class="chip shrink-0 bg-honey-100 text-honey-800 !text-[9px]">DP 50% Berlaku</span>
            </div>

            <div class="mt-4 space-y-3 text-sm">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="font-semibold">Graduation Photography</p>
                        <p class="text-[13px] text-ink-soft">Graduation Group &amp; Story (<span x-text="tanggalPendek">24 Apr</span>, <span x-text="jam + ' WIB'">11:00 WIB</span>)</p>
                    </div>
                    <p class="shrink-0 font-semibold">Rp 750.000</p>
                </div>
                <div class="flex justify-between border-b border-mist pb-3 text-[13px]">
                    <span class="text-ink-soft">Biaya Reservasi Slot Fotografer</span>
                    <span class="font-semibold text-olive">Termasuk</span>
                </div>
                <div class="flex justify-between text-base font-semibold">
                    <span>Total Nilai Paket</span>
                    <span>Rp 750.000</span>
                </div>
            </div>

            <div class="mt-4 rounded-md bg-sand p-3.5">
                <div class="flex items-start justify-between gap-3">
                    <p class="flex items-start gap-2 text-sm font-semibold text-olive">
                        @include('partials.icon', ['name' => 'circle-check', 'class' => 'mt-0.5 size-4 shrink-0'])
                        <span>DP (Down Payment 50%) Hari Ini:</span>
                    </p>
                    <p class="shrink-0 font-semibold text-olive">Rp 375.000</p>
                </div>
                <p class="mt-2 flex justify-between text-[13px] text-ink-soft"><span>Sisa Pelunasan (H-1 Sesi Foto):</span><span class="font-semibold text-ink">Rp 375.000</span></p>
            </div>

            <p class="mt-4 flex items-start gap-2.5 text-[13px] leading-snug text-ink-soft">
                @include('partials.icon', ['name' => 'lock', 'class' => 'mt-0.5 size-4 shrink-0 text-olive'])
                Slot waktu Anda dikunci selama 30 menit setelah melanjutkan ke tahap pembayaran.
            </p>
        </section>

        {{-- Bar CTA melayang di bawah --}}
        <div class="fixed inset-x-0 bottom-0 z-40 bg-paper/95 shadow-[0_-2px_12px_rgba(0,0,0,0.05)] backdrop-blur-[12px]">
            <div class="mx-auto max-w-xl px-5 pb-3 pt-3">
                <div class="flex items-end justify-between gap-3">
                    <div>
                        <p class="text-[10px] font-medium uppercase tracking-[0.1em] text-ink-soft">Total Tagihan DP</p>
                        <p class="font-serif text-2xl font-semibold leading-tight text-olive">Rp 375.000</p>
                    </div>
                    <p class="pb-1 text-[11px] text-ink-soft">Pelunasan Rp 375.000 saat H-1</p>
                </div>
                <button type="submit" x-bind:disabled="!siapLanjut" class="btn btn-primary mt-2 w-full !py-3.5 disabled:cursor-not-allowed disabled:opacity-50">
                    Lanjut ke Pembayaran
                    @include('partials.icon', ['name' => 'arrow-right', 'class' => 'size-4'])
                </button>
            </div>
        </div>
    </form>
</div>
