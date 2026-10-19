{{--
    Foto dengan placeholder otomatis.
    Letakkan file asli di public/images/<src>; selama belum ada, tampil kotak placeholder
    yang menuliskan nama file yang diharapkan.

    @include('partials.photo', ['src' => 'hero-wisuda.jpg', 'alt' => '...', 'class' => 'aspect-[4/5] w-full object-cover'])
--}}
@php $ada = isset($src) && file_exists(public_path('images/'.$src)); @endphp
@if ($ada)
    <img src="{{ asset('images/'.$src) }}" alt="{{ $alt ?? '' }}" class="{{ $class ?? '' }}" loading="{{ $loading ?? 'lazy' }}" decoding="async">
@else
    <div role="img" aria-label="{{ $alt ?? '' }}" class="photo-placeholder {{ $class ?? '' }}" data-slot="{{ $src ?? '' }}"></div>
@endif
