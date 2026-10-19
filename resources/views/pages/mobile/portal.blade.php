{{-- Tampilan mobile Client Portal & Invoice (Page 2 Figma). Tab "Digital Invoice" / "Live Tracker" memakai Alpine. --}}
{{-- TODO backend: data di bawah masih contoh; ganti dengan data booking pelanggan yang login. --}}
@php
    $mKlien = ['nama' => 'Nadia Larasati', 'depan' => 'Nadia', 'info' => 'Universitas Indonesia • Balairung Depok'];
    $mMilestone = [
        ['check', 'Booking Confirmed', '08 Apr', 'Reservasi slot jadwal berhasil dicatat dalam sistem.', 'selesai'],
        ['banknote', 'DP Paid (Terverifikasi)', '10 Apr', 'Rp 375.000 via Bank Mandiri telah diverifikasi admin.', 'selesai'],
        ['calendar', 'Schedule Confirmed', '12 Apr', '24 April 2026, 11:00 WIB • Spot Balairung Utama', 'selesai'],
        ['camera', 'Photography Session', 'Hari H', 'Sesi foto lapangan bersama 2 tim fotografer Seraye.', 'berjalan'],
        ['sliders', 'Editing & Color Grading', 'Est. 3-5 Hari', 'Penyelarasan palet warna khas Seraye Warm Vintage.', 'menunggu'],
        ['images', 'Photos Ready', 'Google Drive', 'Tautan unduhan resolusi tinggi siap diakses kustomer.', 'menunggu'],
        ['circle-check', 'Completed', null, 'Penyelesaian arsip foto & review kepuasan layanan.', 'menunggu'],
    ];
@endphp
<div class="lg:hidden" x-data="{ tab: 'invoice' }">

    {{-- Sambutan --}}
    <section aria-labelledby="judul-portal-m" class="mx-auto max-w-xl px-5 pt-4">
        <div class="rounded-lg bg-sand p-4">
            <p class="chip !gap-2 bg-rose-100 text-rose-800 !text-[10px]">
                <span class="size-1.5 rounded-full bg-clay"></span>
                Active Session
            </p>
            <h1 id="judul-portal-m" class="mt-4 font-serif text-[28px] font-medium leading-9">Your Moment, All in One Place.</h1>
            <p class="mt-3 text-[15px] leading-relaxed text-ink-soft">
                Halo, {{ $mKlien['depan'] }}. Pantau persiapan dokumentasi wisudamu dan kelola rincian administrasi studio secara langsung.
            </p>
            <div class="mt-5 flex items-center gap-3 rounded-md bg-white p-3">
                <span class="grid size-11 shrink-0 place-items-center rounded-md bg-rose-100 text-clay">
                    @include('partials.icon', ['name' => 'graduation-cap', 'class' => 'size-5'])
                </span>
                <div class="min-w-0 flex-1">
                    <p class="text-[18px] font-medium leading-[26px]">{{ $mKlien['nama'] }}</p>
                    <p class="truncate text-xs text-ink-soft">{{ $mKlien['info'] }}</p>
                </div>
                <span class="shrink-0 text-olive" aria-hidden="true">@include('partials.icon', ['name' => 'copy', 'class' => 'size-4'])</span>
            </div>
        </div>
    </section>

    {{-- Tab --}}
    <div class="mx-auto max-w-xl px-5 pt-4">
        <div role="tablist" aria-label="Tampilan portal" class="grid grid-cols-2 gap-1 rounded-lg bg-mist/60 p-1">
            <button type="button" role="tab" id="tab-invoice" aria-controls="panel-invoice" x-bind:aria-selected="tab === 'invoice'" x-on:click="tab = 'invoice'"
                x-bind:class="tab === 'invoice' ? 'bg-white text-olive shadow-soft' : 'text-ink-soft'"
                class="rounded-md py-2.5 text-[12px] font-semibold uppercase tracking-[0.08em]">Digital Invoice</button>
            <button type="button" role="tab" id="tab-tracker" aria-controls="panel-tracker" x-bind:aria-selected="tab === 'tracker'" x-on:click="tab = 'tracker'"
                x-bind:class="tab === 'tracker' ? 'bg-white text-olive shadow-soft' : 'text-ink-soft'"
                class="rounded-md py-2.5 text-[12px] font-semibold uppercase tracking-[0.08em]">Live Tracker</button>
        </div>
    </div>

    <div class="mx-auto max-w-xl space-y-8 px-5 pb-6 pt-5">

        {{-- Digital Invoice --}}
        <section id="panel-invoice" role="tabpanel" aria-labelledby="tab-invoice" x-show="tab === 'invoice'">
            <article class="overflow-hidden rounded-lg border-t-[6px] border-olive bg-white p-5 shadow-card">
                <header class="flex items-start justify-between gap-3">
                    <div class="flex items-center gap-3">
                        <span class="grid size-12 shrink-0 place-items-center rounded-md bg-sand text-olive">
                            @include('partials.icon', ['name' => 'camera', 'class' => 'size-5'])
                        </span>
                        <div>
                            <p class="font-serif text-xl font-semibold leading-none text-olive">Seraye Moments</p>
                            <p class="mt-1 text-[10px] font-medium uppercase tracking-[0.12em] text-ink-soft">Studio &amp; Dokumentasi</p>
                        </div>
                    </div>
                    <span class="chip shrink-0 bg-rose-100 text-rose-800 !text-[10px]">Receipt</span>
                </header>

                <dl class="mt-5 grid grid-cols-2 gap-x-4 gap-y-3 rounded-md bg-sand p-4 text-[13px]">
                    @foreach ([['No. Tagihan', 'INV/SM/2026/04/082'], ['Tanggal Terbit', '10 April 2026'], ['Klien', 'Nadia Larasati'], ['Institusi', 'Universitas Indonesia']] as [$k, $v])
                        <div>
                            <dt class="text-[10px] font-semibold uppercase tracking-[0.08em] text-ink-soft">{{ $k }}</dt>
                            <dd class="mt-0.5 font-semibold">{{ $v }}</dd>
                        </div>
                    @endforeach
                </dl>

                <div class="relative mt-4 overflow-hidden rounded-md">
                    @include('partials.photo', ['src' => 'portal-balairung.jpg', 'alt' => 'Referensi visual: kisah wisuda di luar ruangan', 'class' => 'aspect-[16/7] w-full object-cover'])
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <p class="absolute inset-x-3 bottom-2 text-[9px] font-medium uppercase tracking-[0.1em] text-white/90">Visual Reference: Outdoor Graduation Story</p>
                </div>

                <div class="mt-5 flex items-baseline justify-between">
                    <h2 class="font-serif text-[22px] font-semibold leading-[30px]">Rincian Paket</h2>
                    <span class="text-[10px] font-semibold uppercase tracking-[0.1em] text-olive">Wisuda 2026</span>
                </div>
                <div class="mt-3 rounded-md bg-sand p-4">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <p class="font-semibold leading-snug">Paket Graduation Group &amp; Story</p>
                            <p class="mt-1 text-xs text-ink-soft">Dokumentasi momen kelulusan intim &amp; personal</p>
                        </div>
                        <p class="shrink-0 font-semibold">Rp 750.000</p>
                    </div>
                    <ul class="mt-3 space-y-2 border-t border-mist pt-3 text-xs">
                        @foreach ([['clock', '2 Jam Durasi Dokumentasi Lapangan'], ['users', '2 Fotografer Profesional Seraye Moments'], ['sparkles', '40 Foto Terkurasi & Full Retouched Tone'], ['cloud', 'Semua File RAW & High-Res via Cloud Drive']] as [$ikon, $teks])
                            <li class="flex items-center gap-2.5">
                                @include('partials.icon', ['name' => $ikon, 'class' => 'size-4 shrink-0 text-olive'])
                                {{ $teks }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <dl class="mt-4 space-y-2 border-t border-dashed border-mist pt-4 text-[13px]">
                    <div class="flex justify-between"><dt class="text-ink-soft">Subtotal Layanan</dt><dd class="font-medium">Rp 750.000</dd></div>
                    <div class="flex justify-between"><dt class="flex items-center gap-1.5 text-ink-soft">@include('partials.icon', ['name' => 'circle-check', 'class' => 'size-3.5 text-olive']) Down Payment (50% Paid)</dt><dd class="font-medium text-olive">- Rp 375.000</dd></div>
                </dl>
                <div class="mt-3 flex items-center justify-between rounded-md bg-sand p-4">
                    <div>
                        <p class="font-semibold">Sisa Pelunasan</p>
                        <p class="text-[11px] text-ink-soft">Dibayarkan saat Sesi Hari H</p>
                    </div>
                    <p class="font-serif text-2xl font-semibold text-clay">Rp 375.000</p>
                </div>

                <div class="mt-3 flex items-center gap-3 rounded-md bg-rose-100/80 p-3.5 text-rose-800">
                    <span class="grid size-9 shrink-0 place-items-center rounded-md bg-white/60">@include('partials.icon', ['name' => 'clock', 'class' => 'size-4'])</span>
                    <div class="min-w-0 flex-1">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.06em]">DP Paid · Verified</p>
                        <p class="text-xs">Waiting for Pelunasan on D-Day</p>
                    </div>
                    @include('partials.icon', ['name' => 'shield-check', 'class' => 'size-5 shrink-0'])
                </div>

                <div class="mt-4 grid gap-2.5">
                    {{-- TODO backend: arahkan ke unduhan PDF & galeri foto --}}
                    <a href="#" class="btn btn-primary w-full !py-3.5">
                        @include('partials.icon', ['name' => 'download', 'class' => 'size-4'])
                        Download Invoice PDF
                    </a>
                    <a href="#" class="btn btn-soft w-full !py-3.5 !text-[11px]">
                        @include('partials.icon', ['name' => 'images', 'class' => 'size-4'])
                        Lihat Galeri Foto / Photo Delivery
                    </a>
                </div>

                <footer class="-mx-5 -mb-5 mt-5 flex items-center justify-between gap-3 bg-sand px-5 py-3 text-[9px] font-semibold uppercase leading-snug tracking-[0.08em] text-ink-soft">
                    <span>PT Seraye Karya Abadi · Jakarta</span>
                    <span class="text-right">Digital Archival Ledger</span>
                </footer>
            </article>
        </section>

        {{-- Milestone Tracker --}}
        <section id="panel-tracker" role="tabpanel" aria-labelledby="tab-tracker" x-show="tab === 'tracker'" x-cloak>
            <div class="flex items-start justify-between gap-3">
                <div>
                    <h2 id="judul-milestone-m" class="font-serif text-[22px] font-semibold leading-[30px]">Milestone Tracker</h2>
                    <p class="text-xs text-ink-soft">Langkah perjalanan dokumentasimu</p>
                </div>
                <span class="chip shrink-0 bg-leaf-100 text-leaf-800 !text-[10px]">Step 4 of 7</span>
            </div>

            <ol class="mt-6">
                @foreach ($mMilestone as $i => [$ikon, $judul, $tag, $isi, $status])
                    <li class="relative flex gap-3.5 pb-5 last:pb-0" @if ($status === 'berjalan') aria-current="step" @endif>
                        @if ($i < count($mMilestone) - 1)
                            <span class="absolute left-4 top-9 bottom-0 w-0.5 {{ $status === 'selesai' ? 'bg-olive' : 'bg-mist' }}" aria-hidden="true"></span>
                        @endif
                        <span class="relative z-10 grid size-8 shrink-0 place-items-center rounded-lg
                            @if ($status === 'selesai') bg-olive text-white
                            @elseif ($status === 'berjalan') bg-rose-100 text-clay ring-2 ring-clay/30
                            @else bg-sand text-ink-soft/60 @endif">
                            @include('partials.icon', ['name' => $ikon, 'class' => 'size-4'])
                        </span>
                        <div class="min-w-0 flex-1 {{ $status === 'berjalan' ? 'rounded-lg bg-sand p-3 -mt-1' : '' }} {{ $status === 'menunggu' ? 'opacity-60' : '' }}">
                            <div class="flex items-baseline justify-between gap-2">
                                <h3 class="font-semibold leading-snug {{ $status === 'berjalan' ? 'flex items-center gap-2' : '' }}">
                                    {{ $judul }}
                                    @if ($status === 'berjalan')<span class="size-2 rounded-full bg-clay" aria-hidden="true"></span>@endif
                                </h3>
                                @if ($tag)
                                    <span class="shrink-0 text-[10px] font-semibold uppercase tracking-[0.06em] {{ $status === 'berjalan' ? 'text-clay' : 'text-ink-soft' }}">{{ $tag }}</span>
                                @endif
                            </div>
                            <p class="mt-1 text-[13px] leading-snug text-ink-soft">{{ $isi }}</p>
                            @if ($status === 'berjalan')
                                <p class="mt-2 inline-flex items-center gap-1.5 rounded bg-white px-2 py-1 text-[11px] text-ink-soft">
                                    @include('partials.icon', ['name' => 'timer', 'class' => 'size-3.5 text-clay'])
                                    Dimulai dalam 4 hari
                                </p>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ol>
        </section>

        {{-- Studio Archival Memo --}}
        <section aria-labelledby="judul-memo-m">
            <div class="flex items-center justify-between">
                <h2 id="judul-memo-m" class="font-serif text-[22px] font-semibold leading-[30px]">Studio Archival Memo</h2>
                @include('partials.icon', ['name' => 'book-open', 'class' => 'size-6 text-olive'])
            </div>
            <div class="mt-4 grid grid-cols-2 gap-3">
                @foreach ([
                    ['portal-memo-lensa.jpg', 'Kamera film dan topi toga di atas meja', 'Equipment Ready', 'Dual Prime Lens Session'],
                    ['portal-memo-cahaya.jpg', 'Wisudawati tersenyum membawa buket bunga', 'Lighting Check', 'Golden Hour Preferred'],
                ] as [$foto, $alt, $label, $judul])
                    <figure class="relative overflow-hidden rounded-lg">
                        @include('partials.photo', ['src' => $foto, 'alt' => $alt, 'class' => 'aspect-[3/4] w-full object-cover'])
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                        <figcaption class="absolute inset-x-3 bottom-3 text-white">
                            <span class="block text-[9px] font-medium uppercase tracking-[0.1em] text-white/80">{{ $label }}</span>
                            <span class="block text-sm font-medium leading-tight">{{ $judul }}</span>
                        </figcaption>
                    </figure>
                @endforeach
            </div>
        </section>

        {{-- Bantuan --}}
        <section aria-labelledby="judul-bantuan-m" class="flex items-center gap-3 rounded-lg bg-mist/50 p-4">
            <span class="grid size-12 shrink-0 place-items-center rounded-lg bg-moss text-white">
                @include('partials.icon', ['name' => 'headset', 'class' => 'size-5'])
            </span>
            <div class="min-w-0 flex-1">
                <h2 id="judul-bantuan-m" class="text-[17px] font-semibold leading-tight">Ada Pertanyaan Sesi?</h2>
                <p class="mt-0.5 text-xs text-ink-soft">Hubungi Studio Manager via WhatsApp</p>
            </div>
            <a href="{{ config('seraye.whatsapp_url', '#') }}" class="btn btn-light shrink-0 !px-4">Chat</a>
        </section>
    </div>
</div>
