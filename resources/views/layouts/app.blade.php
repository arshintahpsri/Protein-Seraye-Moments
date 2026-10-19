<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Seraye Moments — Layanan Fotografi & Videografi')</title>
    <meta name="description" content="@yield('description', 'Layanan fotografi dan videografi untuk wisuda, perayaan, dan perjalanan keluarga. Cek paket, jadwal, dan booking langsung secara daring.')">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-paper font-sans text-ink antialiased">
    <a href="#konten" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[60] focus:rounded-md focus:bg-olive focus:px-4 focus:py-2 focus:text-white">
        Lewati ke konten utama
    </a>

    @include('partials.header')

    <main id="konten" class="{{ request()->routeIs('booking') ? '' : 'pb-16' }} lg:pb-0">
        @yield('content')
    </main>

    @include('partials.footer')
    @include('partials.bottom-nav')
</body>
</html>
