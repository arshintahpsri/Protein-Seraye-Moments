@php
    $nav = [
        ['label' => 'Home',               'route' => 'home',     'match' => 'home'],
        ['label' => 'Services & Packages', 'route' => 'services', 'match' => 'services'],
        ['label' => 'Portfolio',           'route' => 'portfolio', 'match' => 'portfolio'],
        ['label' => 'About & Pillars',     'route' => 'about',     'match' => 'about'],
        ['label' => 'Client Portal',       'route' => 'portal',    'match' => 'portal'],
    ];
    $halamanBooking = request()->routeIs('booking');
@endphp
<header x-data="{ open: false }" class="sticky top-0 z-50 bg-paper/85 shadow-soft backdrop-blur-[24px] lg:bg-paper/90 lg:backdrop-blur-[12px]">

    {{-- ============ Desktop (≥ lg) ============ --}}
    <div class="page hidden h-20 items-center justify-between gap-6 lg:flex">
        <a href="{{ route('home') }}" class="flex flex-col leading-none" aria-label="Seraye Moments — beranda">
            <span class="font-serif text-xl font-semibold tracking-tight text-olive">Seraye Moments</span>
            <span class="mt-1 hidden text-[9px] font-medium uppercase tracking-[0.18em] text-ink-soft xl:block">Karna setiap momen patut dirayakan</span>
        </a>

        <nav class="flex items-center gap-1" aria-label="Navigasi utama">
            @foreach ($nav as $item)
                @php $aktif = request()->routeIs($item['match']); @endphp
                <a href="{{ route($item['route']) }}"
                   @if ($aktif) aria-current="page" @endif
                   class="rounded-md px-3.5 py-2 text-sm font-medium transition-colors {{ $aktif ? 'bg-olive text-white' : 'text-ink-soft hover:bg-sand hover:text-ink' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        <div class="flex items-center gap-3">
            <a href="{{ config('seraye.whatsapp_url', '#') }}" class="hidden items-center gap-2 px-2 text-xs font-medium uppercase tracking-[0.08em] text-ink-soft hover:text-ink xl:inline-flex">
                @include('partials.icon', ['name' => 'chat', 'class' => 'size-4'])
                WhatsApp
            </a>
            <a href="{{ route('booking') }}" class="btn btn-primary">Book Your Moment</a>
            <a href="{{ route('portal') }}" class="grid size-10 place-items-center rounded-full bg-olive text-white transition-colors hover:bg-olive-deep" aria-label="Akun klien">
                @include('partials.icon', ['name' => 'user', 'class' => 'size-[18px]'])
            </a>
        </div>
    </div>

    {{-- ============ Mobile (< lg) — tinggi 64px sesuai Figma ============ --}}
    <div class="flex h-16 items-center justify-between gap-3 px-5 lg:hidden">
        @if ($halamanBooking)
            <a href="{{ route('services') }}" class="grid size-10 place-items-center rounded-md text-ink hover:bg-sand" aria-label="Kembali ke Services & Packages">
                @include('partials.icon', ['name' => 'arrow-left', 'class' => 'size-6'])
            </a>
            <p class="ml-auto font-serif text-2xl font-semibold">Booking</p>
            <a href="{{ route('portal') }}" class="grid size-10 shrink-0 place-items-center rounded-xl bg-olive text-white" aria-label="Akun klien">
                @include('partials.icon', ['name' => 'user', 'class' => 'size-[18px]'])
            </a>
        @else
            <a href="{{ route('home') }}" class="font-serif text-2xl font-semibold tracking-tight text-olive" aria-label="Seraye Moments — beranda">Seraye</a>
            <div class="flex items-center gap-2">
                <a href="{{ route('booking') }}" class="btn btn-primary !gap-1.5 !px-3 !py-2.5">
                    @include('partials.icon', ['name' => 'calendar', 'class' => 'size-4'])
                    Book
                </a>
                <button type="button" class="grid size-10 place-items-center rounded-md text-ink hover:bg-sand"
                        x-on:click="open = !open" x-bind:aria-expanded="open" aria-controls="menu-mobile" aria-label="Buka menu">
                    <span x-show="!open">@include('partials.icon', ['name' => 'menu', 'class' => 'size-5'])</span>
                    <span x-show="open" x-cloak>@include('partials.icon', ['name' => 'x', 'class' => 'size-5'])</span>
                </button>
                <a href="{{ route('portal') }}" class="grid size-10 shrink-0 place-items-center rounded-xl bg-olive text-white" aria-label="Akun klien">
                    @include('partials.icon', ['name' => 'user', 'class' => 'size-[18px]'])
                </a>
            </div>
        @endif
    </div>

    @if (! $halamanBooking)
        <nav id="menu-mobile" x-show="open" x-cloak x-transition.opacity class="border-t border-mist/60 bg-paper lg:hidden" aria-label="Navigasi seluler">
            <div class="flex flex-col gap-1 px-5 py-4">
                @foreach ($nav as $item)
                    @php
                        $aktif = request()->routeIs($item['match']);
                        $href = $item['route'] === 'about' ? route('home').'#pilar-m' : route($item['route']);
                    @endphp
                    <a href="{{ $href }}"
                       @if ($aktif) aria-current="page" @endif
                       class="rounded-md px-3.5 py-3 text-base font-medium {{ $aktif ? 'bg-olive text-white' : 'text-ink-soft hover:bg-sand' }}">
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </div>
        </nav>
    @endif
</header>
