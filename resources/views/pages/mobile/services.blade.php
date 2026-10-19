{{-- Tampilan mobile Services & Packages (Page 2 Figma). Tampil di bawah breakpoint lg. --}}
<div class="lg:hidden">

    {{-- Hero --}}
    <section aria-labelledby="judul-katalog-m" class="mx-auto max-w-xl px-5 pb-2 pt-4">
        <p class="flex items-center gap-2 text-[11px] font-semibold uppercase tracking-[0.1em] text-olive">
            <span class="size-2 rounded-full bg-olive"></span>
            Atelier Katalog Seraye
        </p>
        <h1 id="judul-katalog-m" class="mt-4 font-serif text-[34px] font-semibold leading-[1.15] tracking-[-0.02em]">Pilihan Dokumentasi Terbaik</h1>
        <p class="mt-3 text-[15px] leading-relaxed text-ink-soft">
            Sentuhan hangat, kurasi estetik, dan kenangan tak lekang waktu untuk setiap tonggak perjalanan hidupmu di Yogyakarta &amp; sekitarnya.
        </p>
    </section>

    {{-- Anchor bar (geser horizontal) --}}
    {{-- TODO: label chip ke-3 terpotong di Figma ("KONS…"); disesuaikan dengan copy final. --}}
    <nav aria-label="Lompat ke bagian" class="sticky top-16 z-30 mt-3 bg-paper/90 backdrop-blur-[12px]">
        <ul class="mx-auto flex max-w-xl gap-2 overflow-x-auto px-5 py-3 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
            @foreach ([['Layanan Utama', '#layanan-m', false], ['Paket Wisuda Pilihan', '#paket-m', true], ['Konsultasi Khusus', '#konsultasi-m', false]] as [$label, $href, $aktif])
                <li class="shrink-0">
                    <a href="{{ $href }}" class="block rounded-md px-3.5 py-2.5 text-[11px] font-semibold uppercase tracking-[0.08em] {{ $aktif ? 'bg-olive text-white' : 'bg-mist/60 text-ink' }}">{{ $label }}</a>
                </li>
            @endforeach
        </ul>
    </nav>

    {{-- Dua layanan inti --}}
    <section id="layanan-m" aria-label="Layanan inti" class="mx-auto max-w-xl scroll-mt-32 space-y-5 px-5 pb-8 pt-4">
        @php
            $layanan = [
                [
                    'foto' => 'layanan-wisuda.jpg', 'alt' => 'Wisudawan dan teman-temannya tertawa bersama membawa buket',
                    'chip' => '01 — Core Atelier', 'overline' => 'Spesialisasi Emosional', 'judul' => 'Wisuda & Selebrasi',
                    'ikon' => 'graduation-cap', 'ikonWarna' => 'text-olive', 'sub' => 'Sesi Wisuda Personal & Grup',
                    'isi' => '“Abadikan momen wisudamu bersama orang-orang yang membuat perjalananmu berarti.” Kami merekam kebanggaan, canda tawa, dan rasa syukur dengan arahan gaya yang natural dan santai.',
                    'tags' => ['Photography', 'Personal & Group', 'High-Res Edited', 'Cloud Vault Delivery'], 'tagRose' => 1,
                    'cta' => 'Lihat Paket Wisuda', 'ctaIkon' => 'arrow-down', 'ctaHref' => '#paket-m', 'ctaGaya' => 'btn-primary',
                ],
                [
                    'foto' => 'layanan-event.jpg', 'alt' => 'Suasana event komunitas malam hari dengan lampu gantung',
                    'chip' => '02 — Collective', 'overline' => 'Kolektif & Massal', 'judul' => 'Dokumentasi Event',
                    'ikon' => 'users', 'ikonWarna' => 'text-clay', 'sub' => 'Event, Organisasi & Komunitas',
                    'isi' => '“Dokumentasikan event dan berbagai kegiatan penting bersama tim Seraye Moments.” Pendekatan reportase visual komprehensif, menangkap atmosfer otentik tanpa kaku.',
                    'tags' => ['Event Photography', 'Videography Reel', 'Project-Based', 'Appointment Booking'], 'tagRose' => 1,
                    'cta' => 'Request Appointment', 'ctaIkon' => 'calendar-plus', 'ctaHref' => route('booking'), 'ctaGaya' => 'btn-soft',
                ],
            ];
        @endphp
        @foreach ($layanan as $l)
            <article class="rounded-lg bg-white p-3 shadow-soft">
                <div class="relative overflow-hidden rounded-md">
                    @include('partials.photo', ['src' => $l['foto'], 'alt' => $l['alt'], 'class' => 'aspect-[4/3] w-full object-cover'])
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/5 to-transparent"></div>
                    <span class="absolute left-3 top-3 rounded bg-paper/90 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-[0.1em] text-olive">{{ $l['chip'] }}</span>
                    <div class="absolute inset-x-3 bottom-3 text-white">
                        <p class="text-[9px] font-medium uppercase tracking-[0.12em] text-white/80">{{ $l['overline'] }}</p>
                        <h2 class="font-serif text-2xl font-semibold leading-tight">{{ $l['judul'] }}</h2>
                    </div>
                </div>
                <div class="px-1.5 pb-1.5 pt-4">
                    <h3 class="flex items-center gap-2 text-base font-semibold">
                        @include('partials.icon', ['name' => $l['ikon'], 'class' => 'size-4 '.$l['ikonWarna']])
                        {{ $l['sub'] }}
                    </h3>
                    <p class="mt-2 text-[13px] leading-relaxed text-ink-soft">{{ $l['isi'] }}</p>
                    <ul class="mt-3 flex flex-wrap gap-1.5" aria-label="Cakupan layanan">
                        @foreach ($l['tags'] as $i => $tag)
                            <li class="rounded px-2 py-1 text-[10px] font-medium {{ $i === $l['tagRose'] ? 'bg-rose-100 text-rose-800' : 'bg-sand text-ink-soft' }}">{{ $tag }}</li>
                        @endforeach
                    </ul>
                    <a href="{{ $l['ctaHref'] }}" class="btn {{ $l['ctaGaya'] }} mt-4 w-full !py-3.5">
                        {{ $l['cta'] }}
                        @include('partials.icon', ['name' => $l['ctaIkon'], 'class' => 'size-4'])
                    </a>
                </div>
            </article>
        @endforeach
    </section>

    {{-- Paket wisuda --}}
    <section id="paket-m" aria-labelledby="judul-paket-m" class="scroll-mt-32 bg-sand">
        <div class="mx-auto max-w-xl px-5 py-8">
            <header class="text-center">
                <p class="chip bg-rose-100 text-rose-800 !text-[10px]">
                    @include('partials.icon', ['name' => 'sparkles', 'class' => 'size-3.5'])
                    Quality Over Quantity
                </p>
                <h2 id="judul-paket-m" class="mt-4 font-serif text-[28px] font-semibold leading-tight">Paket Wisuda Terkurasi</h2>
                <p class="mt-2 text-sm leading-relaxed text-ink-soft">Kombinasi komposisi presisi, arahan pose tanpa canggung, serta palet warna film hangat khas Seraye.</p>
            </header>

            @php
                // fitur: [ikon, tebal, biasa]
                $paket = [
                    [
                        'eyebrow' => 'Tingkat Intim', 'eyebrowWarna' => 'text-olive', 'tag' => 'Populer Solo', 'unggulan' => false,
                        'nama' => 'Graduation Intimate',
                        'isi' => 'Dirancang khusus untuk sesi personal, potret bersama orang tua tercinta, atau sahabat satu almamater terdekat.',
                        'harga' => '450.000', 'satuan' => '/ sesi', 'ikonWarna' => 'bg-sand text-olive',
                        'fitur' => [
                            ['timer', '90 Menit', 'durasi pemotretan leluasa'],
                            ['camera', '1 Fotografer Utama', 'bersertifikat Seraye'],
                            ['sliders', '20 Foto High-Res', 'color-graded & retouch halus'],
                            ['cloud', 'Seluruh File Asli (RAW/JPEG)', 'di Cloud Drive'],
                            ['table', 'Private Online Web Gallery', '(Aktif 30 hari)'],
                        ],
                    ],
                    [
                        'eyebrow' => 'Signature Collective', 'eyebrowWarna' => 'text-honey-800', 'tag' => null, 'unggulan' => true,
                        'nama' => 'Graduation Group & Story',
                        'isi' => 'Pilihan favorit geng wisudawan dan keluarga besar. Termasuk cuplikan video pendek sinematik untuk reels/story.',
                        'harga' => '750.000', 'satuan' => '/ sesi grup', 'ikonWarna' => 'bg-rose-100 text-rose-800',
                        'fitur' => [
                            ['clock', '120 Menit', '(Outdoor & ikon fakultas)'],
                            ['users', '2 Fotografer', '(Lead + Candid Spotter)'],
                            ['brush', '40 Foto High-Res', 'full signature color graded'],
                            ['film', 'Cinematic 60s Reel Video', '(Audio lisensi resmi)'],
                            ['book-open', 'Printed Mini Photobook 14x14 cm', 'hardcover eksklusif'],
                        ],
                    ],
                    [
                        'eyebrow' => 'Atelier Masterpiece', 'eyebrowWarna' => 'text-clay', 'tag' => 'Complete VIP', 'unggulan' => false,
                        'nama' => 'Full Milestone Celebration',
                        'isi' => 'Pengalaman dokumentasi terlengkap menggabungkan potret studio formal dan estetika lanskap luar ruangan.',
                        'harga' => '1.250.000', 'satuan' => '/ hari', 'ikonWarna' => 'bg-sand text-olive',
                        'fitur' => [
                            ['hourglass', '180 Menit', '(Fleksibel Studio + Kampus/Outdoor)'],
                            ['image', 'Semua Foto Terpilih Diedit', '(Tanpa batas kuota edit)'],
                            ['images', 'Boutique Hardcover Photo Album 20x20 cm', '(Linen Cover)'],
                            ['video', 'Teaser Video 4K + Reels', 'dengan wawancara singkat'],
                            ['circle-check', 'Konsultasi Moodboard & Wardrobe Stylist', 'Seraye'],
                        ],
                    ],
                ];
            @endphp

            <div class="mt-8 space-y-5">
                @foreach ($paket as $p)
                    <article class="relative overflow-hidden rounded-lg bg-white p-5 {{ $p['unggulan'] ? 'shadow-card ring-1 ring-olive/30' : 'shadow-soft' }}">
                        @if ($p['unggulan'])
                            <span class="absolute -right-12 top-5 w-40 rotate-45 bg-olive py-1 text-center text-[9px] font-semibold uppercase tracking-[0.14em] text-white">Rekomendasi</span>
                        @endif
                        <div class="flex items-start justify-between gap-3">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.1em] {{ $p['eyebrowWarna'] }}">{{ $p['eyebrow'] }}</p>
                            @if ($p['tag'])
                                <span class="shrink-0 rounded-full px-3 py-1 text-[11px] font-medium {{ $p['tag'] === 'Complete VIP' ? 'bg-rose-100 text-rose-800' : 'bg-sand text-ink-soft' }}">{{ $p['tag'] }}</span>
                            @endif
                        </div>
                        <h3 class="mt-2 font-serif text-[22px] font-semibold leading-tight {{ $p['unggulan'] ? 'pr-10' : '' }}">{{ $p['nama'] }}</h3>
                        <p class="mt-2 text-[13px] leading-relaxed text-ink-soft">{{ $p['isi'] }}</p>

                        <p class="mt-4 rounded-md bg-sand px-4 py-3 text-ink-soft">
                            <span class="text-xs font-medium">IDR</span>
                            <span class="font-serif text-[30px] font-semibold leading-none text-olive">{{ $p['harga'] }}</span>
                            <span class="text-xs">{{ $p['satuan'] }}</span>
                        </p>

                        <ul class="mt-4 space-y-3 text-[13px] leading-snug">
                            @foreach ($p['fitur'] as [$ikon, $tebal, $biasa])
                                <li class="flex items-start gap-3">
                                    <span class="grid size-7 shrink-0 place-items-center rounded-md {{ $p['ikonWarna'] }}">
                                        @include('partials.icon', ['name' => $ikon, 'class' => 'size-3.5'])
                                    </span>
                                    <span class="pt-1"><strong class="font-semibold">{{ $tebal }}</strong> {{ $biasa }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <a href="{{ route('booking') }}" class="btn mt-5 w-full !py-3.5 {{ $p['unggulan'] ? 'btn-primary' : 'btn-soft' }}">
                            Choose Package
                            @include('partials.icon', ['name' => $p['unggulan'] ? 'circle-check' : 'arrow-right', 'class' => 'size-4'])
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Mengapa Seraye --}}
    <section aria-labelledby="judul-mengapa-m" class="mx-auto max-w-xl px-5 py-8">
        <div class="rounded-lg bg-mist/50 p-5">
            <div class="flex items-center gap-3">
                <span class="grid size-12 shrink-0 place-items-center rounded-md bg-rose-100 text-rose-800">
                    @include('partials.icon', ['name' => 'leaf', 'class' => 'size-5'])
                </span>
                <div>
                    <h2 id="judul-mengapa-m" class="text-lg font-semibold leading-tight">Mengapa Seraye Moments?</h2>
                    <p class="mt-0.5 text-[10px] font-medium uppercase tracking-[0.1em] text-ink-soft">Natural · Hangat · Berjiwa Muda</p>
                </div>
            </div>
            <p class="mt-4 text-[13px] leading-relaxed text-ink-soft">
                Kami percaya potret wisuda bukan sekadar seremoni toga yang kaku. Bersama kami, kamu diajak untuk bernapas, bercerita, dan menikmati euforia hari kelulusan bersama orang-orang tercinta dengan pencahayaan hangat dan komposisi film natural.
            </p>
            <dl class="mt-5 grid grid-cols-2 gap-3">
                <div class="rounded-md bg-white p-3.5">
                    <dd class="font-serif text-2xl font-semibold text-olive">4.9 / 5</dd>
                    <dt class="mt-1 text-[10px] font-medium uppercase leading-snug tracking-[0.06em] text-ink-soft">320+ Wisudawan UGM, UNY, UII</dt>
                </div>
                <div class="rounded-md bg-white p-3.5">
                    <dd class="font-serif text-2xl font-semibold text-olive">7 Hari</dd>
                    <dt class="mt-1 text-[10px] font-medium uppercase leading-snug tracking-[0.06em] text-ink-soft">Jaminan Kurasi Cepat</dt>
                </div>
            </dl>
        </div>
    </section>

    {{-- CTA konsultasi --}}
    <section id="konsultasi-m" aria-labelledby="judul-konsul-m" class="mx-auto max-w-xl scroll-mt-32 px-5 pb-8">
        <div class="rounded-lg bg-olive p-6 text-white shadow-card">
            <p class="text-[11px] font-medium uppercase tracking-[0.12em] text-rose-100">Butuh sesi khusus?</p>
            <h2 id="judul-konsul-m" class="mt-3 font-serif text-[26px] font-semibold leading-tight">Ada konsep tematik atau rombongan fakultas?</h2>
            <p class="mt-3 text-sm leading-relaxed text-white/90">Diskusikan jadwal, lokasi, atau ide kreatifmu langsung bersama tim kurator kami. Kami siap menemani setiap ceritamu.</p>
            <a href="{{ config('seraye.whatsapp_url', '#') }}" class="btn btn-light mt-5">
                @include('partials.icon', ['name' => 'chat', 'class' => 'size-4'])
                Chat via WhatsApp
            </a>
        </div>
        <p class="mt-8 text-center">
            <span class="block font-serif text-2xl italic text-ink-soft/50">Seraye Moments</span>
            <span class="mt-1 block text-[10px] font-medium uppercase tracking-[0.14em] text-ink-soft/70">Est. 2022 · Yogyakarta Milestone Chronicle</span>
        </p>
    </section>
</div>
