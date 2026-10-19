@extends('layouts.app')

@section('title', 'Seraye Moments — Every Moment Has a Story')

@section('content')

@include('pages.mobile.home')

<div class="hidden lg:block">

{{-- ===================== HERO ===================== --}}
<section aria-labelledby="judul-hero" class="page pb-20 pt-10 lg:pb-32 lg:pt-14">
    <div class="grid items-center gap-14 lg:grid-cols-[minmax(0,1fr)_520px] lg:gap-16">

        <div>
            <p class="chip bg-rose-100 text-ink">
                <span class="size-1.5 rounded-full bg-ink"></span>
                Karna setiap momen patut dirayakan
            </p>

            <h1 id="judul-hero" class="mt-6 font-serif text-[40px] font-semibold leading-[1.14] tracking-[-0.02em] sm:text-5xl lg:text-[56px] lg:leading-[64px]">
                Every Moment Has a Story.
                <span class="block font-normal italic text-olive">Let Us Capture Yours.</span>
            </h1>

            <p class="mt-6 max-w-[540px] text-lg leading-[1.625] text-ink-soft">
                Mengabadikan momen wisuda, perayaan, dan berbagai cerita berharga melalui fotografi dan videografi yang dibuat dengan rasa, kejujuran visual, serta kehangatan abadi.
            </p>

            <div class="mt-8 flex flex-wrap gap-3">
                <a href="{{ route('booking') }}" class="btn btn-primary">
                    Book Your Moment
                    @include('partials.icon', ['name' => 'arrow-right', 'class' => 'size-4'])
                </a>
                <a href="{{ route('portfolio') }}" class="btn btn-soft">
                    Lihat Portfolio
                    @include('partials.icon', ['name' => 'eye', 'class' => 'size-4'])
                </a>
            </div>

            <dl class="mt-10 grid max-w-[554px] grid-cols-3 gap-4 rounded-lg border border-mist/50 bg-white p-5 shadow-soft">
                <div class="flex flex-col-reverse">
                    <dt class="mt-1 text-[10px] font-medium uppercase tracking-[0.1em] text-ink-soft">Kisah terabadikan</dt>
                    <dd class="font-serif text-xl font-semibold text-olive">1,200+</dd>
                </div>
                <div class="flex flex-col-reverse">
                    <dt class="mt-1 text-[10px] font-medium uppercase tracking-[0.1em] text-ink-soft">Dibuat dengan hati</dt>
                    <dd class="font-serif text-xl font-semibold text-clay">100%</dd>
                </div>
                <div class="flex flex-col-reverse">
                    <dt class="mt-1 text-[10px] font-medium uppercase tracking-[0.1em] text-ink-soft">Rating mahasiswa</dt>
                    <dd class="font-serif text-xl font-semibold text-honey-800">4.9/5 <span aria-hidden="true">★</span></dd>
                </div>
            </dl>
        </div>

        {{-- Kartu foto editorial + kartu polaroid yang menumpuk --}}
        <div class="relative mx-auto w-full max-w-[520px] pb-16 lg:mx-0">
            <figure class="rounded-lg bg-white p-3 shadow-card">
                <div class="relative">
                    @include('partials.photo', ['src' => 'hero-wisuda.jpg', 'alt' => 'Dua wisudawati tersenyum membawa buket bunga', 'class' => 'aspect-[4/5] w-full rounded object-cover', 'loading' => 'eager'])
                    <span class="chip absolute left-3 top-3 bg-paper/90 text-ink backdrop-blur">
                        <span class="size-1.5 rounded-full bg-ink-soft"></span> Editorial Series
                    </span>
                </div>
                {{-- TODO: cocokkan teks keterangan dengan Figma (bagian depan tertutup kartu polaroid) --}}
                <figcaption class="flex items-center justify-between gap-3 px-1 pb-1 pt-4">
                    <span class="min-w-0 font-serif text-sm font-medium sm:whitespace-nowrap sm:pl-[184px]">Wisuda — 35mm Warm Tone</span>
                    <span class="chip shrink-0 bg-leaf-100 text-leaf-800">Jakarta, 2024</span>
                </figcaption>
            </figure>

            <aside class="absolute -bottom-0 left-0 w-[210px] -rotate-3 rounded-md bg-white p-2.5 shadow-card sm:w-[220px] lg:-left-12" aria-label="Kartu keepsake">
                <div class="relative">
                    @include('partials.photo', ['src' => 'keepsake-gulungan.jpg', 'alt' => 'Tangan menerima gulungan ijazah berpita', 'class' => 'aspect-[4/3] w-full rounded-sm object-cover'])
                    <span class="absolute right-2 top-2 rounded-sm bg-honey-100 px-1.5 py-0.5 text-[9px] font-semibold uppercase tracking-wider text-honey-800">Keepsake No. 12</span>
                </div>
                <p class="mt-2.5 text-[11px] font-semibold">Graduation Day — Sarah Jenkins</p>
                <p class="mt-1 flex items-center justify-between font-serif text-xs italic text-ink-soft">
                    “Tangible Memories”
                    @include('partials.icon', ['name' => 'heart', 'class' => 'size-3.5'])
                </p>
            </aside>
        </div>
    </div>
</section>

{{-- ===================== TIGA PILAR ===================== --}}
<section id="pilar" aria-labelledby="judul-pilar" class="scroll-mt-24 bg-sand">
    <div class="page py-16 lg:py-24">
        <div class="grid gap-6 lg:grid-cols-[1fr_380px] lg:items-end lg:gap-16">
            <div>
                <p class="eyebrow flex items-center gap-3 text-olive"><span class="h-px w-6 bg-olive"></span> Filosofi &amp; Prinsip Studio</p>
                <h2 id="judul-pilar" class="mt-4 font-serif text-3xl font-semibold tracking-tight lg:text-[40px] lg:leading-[1.2]">
                    Pondasi Kami — Tiga Pilar Seraye
                </h2>
            </div>
            <p class="text-sm leading-relaxed text-ink-soft">
                Menyeimbangkan komitmen profesional, edukasi komunitas, serta kebaikan sosial demi ekosistem visual Indonesia yang inklusif dan bermartabat.
            </p>
        </div>

        @php
            $pilar = [
                [
                    'no' => '01', 'judul' => 'Business', 'ikon' => 'shield-check',
                    'chip' => 'bg-leaf-100 text-leaf-800', 'sub' => 'Professional & Sustainable Profit', 'subWarna' => 'text-clay', 'cek' => 'text-olive',
                    'isi' => 'Membangun ekosistem kreatif yang sehat dan transparan. Kami memberlakukan pembagian kompensasi yang adil bagi seluruh fotografer muda serta menjaga standar layanan prima tanpa kompromi estetika.',
                    'poin' => ['Standar Etika Kontrak & Royalti', 'Hasil Kurasi Bergaransi Kualitas'],
                ],
                [
                    'no' => '02', 'judul' => 'Community', 'ikon' => 'users',
                    'chip' => 'bg-rose-100 text-rose-800', 'sub' => 'Education & Mentorship', 'subWarna' => 'text-olive', 'cek' => 'text-clay',
                    'isi' => 'Ruang tumbuh bagi mahasiswa dan talenta visual muda. Melalui workshop teknis, bedah portofolio terbuka, dan bimbingan lapangan berkala untuk mencetak generasi pencerita visual masa depan.',
                    'poin' => ['Seraye Academy Lab Mingguan', 'Open Portfolio Review Gratis'],
                ],
                [
                    'no' => '03', 'judul' => 'Humanity', 'ikon' => 'hand-heart',
                    'chip' => 'bg-honey-100 text-honey-800', 'sub' => 'Empathy & Social Impact', 'subWarna' => 'text-honey-800', 'cek' => 'text-honey-800',
                    'isi' => 'Dedikasi tulus bagi sesama. Dokumentasi cuma-cuma untuk panti asuhan, lembaga nirlaba independen, dan gerakan kerelawanan komunitas yang membutuhkan arsip visual bermartabat.',
                    'poin' => ['100% Pro Bono untuk Yayasan', 'Alokasi 5% Laba untuk Inisiatif Sosial'],
                ],
            ];
        @endphp

        <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($pilar as $p)
                <article class="flex flex-col rounded-lg bg-white p-8 shadow-soft">
                    <div class="flex items-start justify-between">
                        <span class="chip {{ $p['chip'] }}">Pillar {{ $p['no'] }}</span>
                        <span class="grid size-10 place-items-center rounded-md bg-sand text-olive">
                            @include('partials.icon', ['name' => $p['ikon'], 'class' => 'size-5'])
                        </span>
                    </div>
                    <h3 class="mt-6 font-serif text-2xl font-semibold">{{ $p['judul'] }}</h3>
                    <p class="eyebrow mt-1.5 !text-[10px] {{ $p['subWarna'] }}">{{ $p['sub'] }}</p>
                    <p class="mt-4 flex-1 text-[15px] leading-[1.33] text-ink-soft">{{ $p['isi'] }}</p>
                    <ul class="mt-8 space-y-2.5 text-[13px]">
                        @foreach ($p['poin'] as $poin)
                            <li class="flex items-center gap-2">
                                @include('partials.icon', ['name' => 'circle-check', 'class' => 'size-4 shrink-0 '.$p['cek']])
                                {{ $poin }}
                            </li>
                        @endforeach
                    </ul>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- ===================== INISIATIF SOSIAL + PHOTO BOOTH ===================== --}}
<section aria-label="Inisiatif dan produk baru" class="bg-paper">
    <div class="page grid gap-8 py-16 lg:grid-cols-2 lg:py-24">

        <article id="inisiatif" class="relative scroll-mt-24 overflow-hidden rounded-lg bg-moss p-8 text-white shadow-card lg:p-10">
            <span class="pointer-events-none absolute right-0 top-8 h-28 w-20 rounded-l-lg bg-white/10" aria-hidden="true"></span>
            <span class="pointer-events-none absolute bottom-0 right-0 h-44 w-44 rounded-tl-lg bg-white/10" aria-hidden="true"></span>

            <div class="relative flex items-center gap-3">
                <span class="chip bg-olive text-white">Inisiatif Sosial</span>
                <span class="eyebrow flex items-center gap-1.5 !text-[10px] text-white/90">
                    <span class="size-1.5 rounded-full bg-honey-100"></span> Open Submission
                </span>
            </div>

            <h2 class="relative mt-6 max-w-md font-serif text-3xl font-semibold leading-tight">
                Seraye for Humanity: Dokumentasi Gratis untuk Kebaikan
            </h2>
            <p class="relative mt-5 max-w-lg text-[15px] leading-relaxed text-white/85">
                Apakah Anda mengelola yayasan panti asuhan, aksi lingkungan, atau inisiatif sosial yang membutuhkan bantuan dokumentasi video dan foto berkualitas untuk laporan dan donatur? Kami siap hadir tanpa pungutan biaya.
            </p>

            <div class="relative mt-7 flex items-start gap-3 rounded-md bg-olive/60 p-4 text-[13px] leading-relaxed">
                @include('partials.icon', ['name' => 'hand-heart', 'class' => 'mt-0.5 size-5 shrink-0 text-honey-100'])
                Setiap bulan kami memilih hingga 3 inisiatif sosial di wilayah Jabodetabek &amp; Bandung.
            </div>

            <div class="relative mt-10 flex flex-wrap items-center gap-x-6 gap-y-3">
                <a href="#" class="btn btn-light">
                    Ajukan Kegiatan
                    @include('partials.icon', ['name' => 'hand-heart', 'class' => 'size-4'])
                </a>
                <a href="#" class="eyebrow !text-xs text-white underline-offset-4 hover:underline">Pelajari Pedoman Proposal</a>
            </div>
        </article>

        <article id="photo-booth" class="scroll-mt-24 rounded-lg border border-mist/60 bg-sand p-8 shadow-card lg:p-10">
            <div class="flex items-center justify-between">
                <span class="chip bg-clay text-white">Coming Soon</span>
                <span class="eyebrow !text-[10px] text-ink-soft">Q3 2025 Edition</span>
            </div>

            <h2 class="mt-6 font-serif text-3xl font-semibold leading-tight">Seraye Modular Photo Booth</h2>
            <p class="mt-3 text-[15px] leading-relaxed text-ink-soft">
                Menghadirkan studio cetak instan bergaya editorial di pesta wisuda, pernikahan intim, dan perayaan personal Anda. Pencahayaan lembut khas Seraye dengan frame fisik eksklusif.
            </p>

            <div class="mt-8 grid grid-cols-3 gap-3" aria-label="Contoh hasil cetak photo booth">
                @include('partials.photo', ['src' => 'photobooth-1.jpg', 'alt' => 'Strip foto hitam putih', 'class' => 'aspect-[3/4] w-full -rotate-2 rounded-sm border-4 border-white shadow-card'])
                @include('partials.photo', ['src' => 'photobooth-2.jpg', 'alt' => 'Kartu foto bergaya vintage', 'class' => 'aspect-[3/4] w-full rotate-1 rounded-sm border-4 border-white shadow-card'])
                @include('partials.photo', ['src' => 'photobooth-3.jpg', 'alt' => 'Foto wisuda bersama buket bunga', 'class' => 'aspect-[3/4] w-full rotate-2 rounded-sm border-4 border-white shadow-card'])
            </div>

            <form action="#" method="post" class="mt-8" x-data="{ email: '' }">
                @csrf
                <label for="email-photobooth" class="eyebrow !text-[10px] text-ink">Dapatkan akses awal &amp; voucher diskon 20%</label>
                <div class="mt-3 flex flex-col gap-3 sm:flex-row">
                    <input id="email-photobooth" name="email" type="email" required autocomplete="email" x-model="email"
                           placeholder="Masukkan email Anda..."
                           class="min-w-0 flex-1 rounded-md border border-mist bg-white px-4 py-3 text-sm placeholder:text-ink-soft/60 focus:border-olive focus:outline-none">
                    <button type="submit" class="btn btn-clay">Ingatkan Saya</button>
                </div>
            </form>
        </article>
    </div>
</section>

{{-- ===================== KUTIPAN ===================== --}}
<section aria-label="Kutipan" class="bg-mist/60">
    <div class="page py-14 lg:py-16">
        <figure class="mx-auto max-w-3xl text-center">
            @include('partials.icon', ['name' => 'quote', 'class' => 'mx-auto size-5 text-olive', 'stroke' => 1.5])
            {{-- TODO: cocokkan kutipan dan atribusi dengan Figma --}}
            <blockquote class="mt-4 font-serif text-2xl italic leading-snug text-ink">
                “Fotografi bagi kami bukan sekadar membekukan waktu, melainkan menjaga kehangatan sebuah momen agar selalu dapat dikenang.”
            </blockquote>
            <figcaption class="eyebrow mt-5 !text-[10px] text-ink-soft">Seraye Moments — Filosofi Studio</figcaption>
        </figure>
    </div>
</section>

</div>

@endsection
