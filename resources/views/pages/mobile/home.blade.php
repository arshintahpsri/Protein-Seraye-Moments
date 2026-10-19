{{-- Tampilan mobile Home (frame "Seraye Moments — Home", Page 2 Figma). Tampil di bawah breakpoint lg. --}}
<div class="mx-auto max-w-xl px-5 pb-6 lg:hidden">

    {{-- Hero --}}
    <section aria-labelledby="judul-hero-m" class="pt-4">
        <p class="flex items-center gap-2 text-[11px] font-semibold uppercase tracking-[0.1em] text-olive">
            <span class="size-2 rounded-full bg-olive"></span>
            Karna Setiap Momen Patut Dirayakan
        </p>
        <h1 id="judul-hero-m" class="mt-4 font-serif text-[31px] font-semibold leading-[1.15] tracking-[-0.03em]">
            Every Moment Has a Story.
            <span class="block font-normal italic text-olive">Let Us Capture Yours.</span>
        </h1>
        <p class="mt-4 text-[15px] leading-relaxed text-ink-soft">
            Mengabadikan momen wisuda, perayaan, dan berbagai cerita berharga melalui fotografi dan videografi yang dibuat dengan rasa.
        </p>

        <figure class="relative mt-6 overflow-hidden rounded-lg shadow-card">
            @include('partials.photo', ['src' => 'hero-wisuda.jpg', 'alt' => 'Wisudawati berpelukan haru dengan ibunya', 'class' => 'aspect-[4/5] w-full object-cover', 'loading' => 'eager'])
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
            <figcaption class="absolute inset-x-4 bottom-4 flex items-end justify-between gap-3 text-white">
                <span>
                    <span class="block text-[9px] font-medium uppercase tracking-[0.12em] text-white/80">Archive No. 248</span>
                    <span class="block font-serif text-xl italic">Wisuda Renjana</span>
                </span>
                <span class="shrink-0 rounded bg-white/20 px-2.5 py-1 text-[10px] font-medium backdrop-blur">35mm Warm Tone</span>
            </figcaption>
        </figure>

        <div class="mt-5 grid gap-3">
            <a href="{{ route('booking') }}" class="btn btn-primary w-full !py-3.5">
                @include('partials.icon', ['name' => 'calendar', 'class' => 'size-4'])
                Book Your Moment
            </a>
            <a href="{{ route('portfolio') }}" class="btn btn-soft w-full !py-3.5">
                @include('partials.icon', ['name' => 'images', 'class' => 'size-4'])
                Lihat Portfolio
            </a>
        </div>
    </section>

    {{-- Tentang kami --}}
    <section aria-labelledby="judul-tentang-m" class="mt-10 rounded-lg bg-sand p-5">
        <p class="eyebrow flex items-center gap-2 !text-[11px] text-olive">
            @include('partials.icon', ['name' => 'sparkles', 'class' => 'size-4'])
            Tentang Kami
        </p>
        <h2 id="judul-tentang-m" class="mt-3 font-serif text-2xl font-semibold leading-tight">Karna Setiap Momen Patut Dirayakan</h2>
        <p class="mt-3 text-sm leading-relaxed text-ink-soft">
            Seraye hadir bukan sekadar menekan tombol rana, melainkan merajut empati dalam tiap bingkai. Kami percaya getar haru kelulusan, tawa bersama sahabat, dan peluk hangat keluarga adalah warisan rasa yang layak dikenang abadi.
        </p>
        <dl class="mt-5 grid grid-cols-2 gap-3">
            <div class="rounded-md bg-white p-3.5">
                <dd class="font-serif text-2xl font-semibold text-olive">1,200+</dd>
                <dt class="mt-1 text-[10px] font-medium uppercase tracking-[0.08em] text-ink-soft">Kisah Terabadikan</dt>
            </div>
            <div class="rounded-md bg-white p-3.5">
                <dd class="font-serif text-2xl font-semibold text-olive">100%</dd>
                <dt class="mt-1 text-[10px] font-medium uppercase tracking-[0.08em] text-ink-soft">Dibuat dengan Hati</dt>
            </div>
        </dl>
    </section>

    {{-- Tiga pilar --}}
    <section id="pilar-m" aria-labelledby="judul-pilar-m" class="mt-10">
        <p class="eyebrow !text-[10px] text-olive">Pondasi Kami</p>
        <h2 id="judul-pilar-m" class="mt-2 font-serif text-[26px] font-semibold">Tiga Pilar Seraye</h2>
        <p class="mt-2 text-sm leading-relaxed text-ink-soft">Menyeimbangkan komitmen profesional, edukasi komunitas, serta kebaikan sosial.</p>

        @php
            $pilar = [
                ['01', 'award',     'bg-leaf-100 text-leaf-800', 'bg-sand text-ink-soft',        'Business',  'Professional & Profit',   'text-olive',
                    'Membangun ekosistem kreatif yang sehat melalui transparansi kompensasi bagi fotografer muda dan kepastian standar pelayanan prima bagi setiap klien.'],
                ['02', 'users',     'bg-sand text-ink',          'bg-sand text-ink-soft',        'Community', 'Education & Relationship', 'text-olive',
                    'Ruang tumbuh bersama mahasiswa dan talenta visual. Mengadakan lokakarya fotografi terjangkau, sesi kurasi portofolio, dan bimbingan lapangan.'],
                ['03', 'hand-heart', 'bg-rose-100 text-rose-800', 'bg-rose-100 text-rose-800',   'Humanity',  'Empathy & Social Impact', 'text-clay',
                    'Mendedikasikan kemampuan visual untuk mendokumentasikan kegiatan sosial, yayasan nirlaba, panti asuhan, dan gerakan kerelawanan tanpa biaya.'],
            ];
        @endphp
        <ul class="mt-5 space-y-3">
            @foreach ($pilar as [$no, $ikon, $warnaIkon, $warnaTag, $judul, $sub, $warnaSub, $isi])
                <li class="rounded-lg bg-white p-4 shadow-soft">
                    <div class="flex items-start justify-between">
                        <span class="grid size-10 place-items-center rounded-md {{ $warnaIkon }}">
                            @include('partials.icon', ['name' => $ikon, 'class' => 'size-5'])
                        </span>
                        <span class="rounded px-2 py-1 text-[9px] font-semibold uppercase tracking-[0.08em] {{ $warnaTag }}">Pilar {{ $no }}</span>
                    </div>
                    <h3 class="mt-3 text-lg font-semibold">{{ $judul }}</h3>
                    <p class="mt-0.5 text-[10px] font-medium uppercase tracking-[0.08em] {{ $warnaSub }}">{{ $sub }}</p>
                    <p class="mt-2 text-[13px] leading-relaxed text-ink-soft">{{ $isi }}</p>
                </li>
            @endforeach
        </ul>
    </section>

    {{-- Seraye for Humanity --}}
    <section aria-labelledby="judul-humanity-m" class="mt-10 rounded-lg bg-moss p-6 text-white shadow-card">
        <p class="eyebrow flex items-center gap-2 !text-[11px] text-rose-100">
            @include('partials.icon', ['name' => 'heart', 'class' => 'size-4'])
            Inisiatif Sosial
        </p>
        <h2 id="judul-humanity-m" class="mt-3 font-serif text-[28px] font-semibold leading-tight">Seraye for Humanity</h2>
        <p class="mt-3 text-[15px] leading-relaxed text-white/90">
            Dukungan dokumentasi visual cuma-cuma untuk kegiatan sosial pilihan, kampanye kemanusiaan, dan inisiatif penggalangan dana.
        </p>
        <a href="{{ route('booking') }}" class="btn btn-light mt-6">
            Ajukan Kegiatan
            @include('partials.icon', ['name' => 'arrow-right', 'class' => 'size-4'])
        </a>
    </section>

    {{-- Photo Booth --}}
    {{-- TODO: teks di Figma terpotong ("…untuk…"); lengkapi dengan copy final dari tim. --}}
    <section aria-labelledby="judul-booth-m" class="mt-6 flex items-center gap-4 rounded-lg bg-white p-4 shadow-soft">
        <span class="grid size-16 shrink-0 place-items-center rounded-md bg-sand text-olive">
            @include('partials.icon', ['name' => 'camera', 'class' => 'size-7'])
        </span>
        <div class="min-w-0">
            <h2 id="judul-booth-m" class="flex flex-wrap items-center gap-2 text-lg font-semibold">
                Photo Booth
                <span class="chip !text-[9px] bg-rose-100 text-rose-800">Coming Soon</span>
            </h2>
            <p class="mt-1 line-clamp-2 text-[13px] leading-snug text-ink-soft">Pengalaman cetak foto instan interaktif dengan filter hangat khas Seraye untuk setiap perayaan.</p>
        </div>
    </section>
</div>
