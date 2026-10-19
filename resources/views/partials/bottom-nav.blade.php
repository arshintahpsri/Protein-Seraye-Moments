{{-- Navigasi tab bawah — hanya mobile. Halaman Booking memakai bar CTA sendiri, jadi tidak ditampilkan di sana. --}}
@if (! request()->routeIs('booking'))
    @php
        $tab = [
            ['Studio',    'home',     'home',      'home'],
            ['Services',  'services', 'camera',    'services'],
            ['Portfolio', 'portfolio', 'images',   'portfolio'],
            ['Portal',    'portal',   'folder-user', 'portal'],
        ];
    @endphp
    <nav aria-label="Navigasi bawah" class="fixed inset-x-0 bottom-0 z-40 bg-paper/90 shadow-[0_-2px_12px_rgba(0,0,0,0.04)] backdrop-blur-[24px] lg:hidden">
        <ul class="mx-auto grid h-16 max-w-xl grid-cols-4">
            @foreach ($tab as [$label, $rute, $ikon, $cocok])
                @php $aktif = request()->routeIs($cocok); @endphp
                <li>
                    <a href="{{ route($rute) }}" @if ($aktif) aria-current="page" @endif
                       class="flex h-full flex-col items-center justify-center gap-1 text-[11px] font-medium {{ $aktif ? 'text-olive' : 'text-ink-soft' }}">
                        @include('partials.icon', ['name' => $ikon, 'class' => 'size-[22px]', 'stroke' => $aktif ? 2.4 : 2])
                        {{ $label }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
@endif
