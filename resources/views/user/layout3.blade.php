<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <title>@yield('title', 'SINOMU')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta property="og:title" content="@yield('title', 'SINOMU')">
    <meta name="description" content="@yield('meta_description', 'SINOMU adalah sistem notifikasi otomatis berbasis web yang membantu mengirimkan pesan WhatsApp ke pemohon dan pegawai secara real-time, tepat waktu, dan efisien.')">
    <meta property="og:description" content="@yield('og_description', 'Otomatisasi notifikasi ke pemohon dan pegawai dalam satu sistem yang cerdas dan mudah diatur.')">
</head>

<body class="bg-base-100">
    <div class="drawer lg:drawer-open">
        <input id="drawer-toggle" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
            <div class="navbar lg:hidden wadb2 flex justify-between sticky top-0 z-30">
                <div class="flex-none">
                    <label for="drawer-toggle" class="btn btn-square btn-ghost">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </label>
                </div>
                <div class="flex flex-row items-center gap-2 pr-2.5">
                    <img src="{{ asset('image/logoLotus.png') }}" alt="Logo lotusaja" class="h-5 w-auto image-white"
                        title="Logo Lotusaja">
                    <h1 class="text-xl font-bold wad4 uppercase">{{ config('app.name') }}</h1>
                </div>
            </div>
            <main class="min-h-screen">
                <div class="container mx-auto max-w-7xl">
                    @yield('content')
                </div>
            </main>

            @include('components.footer')
        </div>
        <div class="drawer-side bg-transparant z-40">
            <label for="drawer-toggle" aria-label="close sidebar" class="drawer-overlay"></label>
            <aside class="min-h-full w-64 bgc5 text-base-content flex flex-col shadow-xl">
                <div class="p-4 wadb2 bordersanbottom">
                    <div class="flex items-center gap-3">
                        <div class="avatar">
                            <div class="w-10 rounded-full border-white wadb1 border-1 flex items-center justify-center">
                                <img src="{{ asset('image/logoLotus.png') }}" alt="Logo Lotusaja"
                                    class="h-full w-full image-white">
                            </div>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold wad4 uppercase">{{ config('app.name') }}</h2>
                            <p class="text-xs text-white">Notification System</p>
                        </div>
                    </div>
                </div>
                <nav class="flex-1 wadb1 p-4">
                    <ul class="menu menu-vertical w-full space-y-2">
                        <li>
                            <a href="{{ route('home') }}" title="Home"
                                class="flex items-center gap-3 p-3 rounded-lg transition-all duration-200 text-white colorsan {{ request()->is('home') ? 'wadb3 bordersanbottom2 text-primary-content' : '' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span class="font-medium">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}" title="About"
                                class="flex items-center text-white colorsan gap-3 p-3 rounded-lg transition-all duration-200 {{ request()->is('about') ? 'wadb3 bordersanbottom2 text-primary-content' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <rect x="3" y="4" width="18" height="16" rx="2" ry="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <circle cx="9" cy="10" r="2.5" />
                                    <path d="M15 8h3M15 12h3" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M5 16h14" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6 14c0-2 1.5-2 3-2s3 0 3 2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>

                                <span class="font-medium">About</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pricing') }}" title="Pricing"
                                class="flex items-center text-white colorsan gap-3 p-3 rounded-lg transition-all duration-200 {{ request()->is('pricing') ? 'wadb3 bordersanbottom2 text-primary-content' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                                </svg>
                                <span class="font-medium">Pricing</span>
                            </a>
                        </li>
                        <li>
                            <a href="/docs/getting-started" title="Getting Started"
                                class="flex items-center text-white colorsan gap-3 p-3 rounded-lg transition-all duration-200 {{ request()->is('docs/getting-started') ? 'wadb3 bordersanbottom2 text-primary-content' : '' }}">
                                <i class="fa-solid fa-book"></i>
                                <span class="font-medium">Getting Started</span>
                            </a>
                        </li>
                        <li>
                            <a href="/docs/cronjob" title="Sinkronisasi Data"
                                class="flex items-center gap-3 p-3 rounded-lg colorsan transition-all duration-200 text-white {{ request()->is('docs/cronjob') ? 'wadb3 bordersanbottom2 text-primary-content' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-5 h-5"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <span class="font-medium">Sinkronisasi Data</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="p-4 wadb2 bordersantop w-full">
                    <a href="{{ route('login') }}"
                        class="btn btnsecondarys shadow-lg shadow-yellow-800 hover:shadow-xl w-full font-bold"
                        title="Login"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
                </div>
            </aside>
        </div>
    </div>

    <script>
        AOS.init();
        document.addEventListener('DOMContentLoaded', function() {
            const drawerToggle = document.getElementById('drawer-toggle');
            const menuLinks = document.querySelectorAll('.drawer-side a');

            menuLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 1024) {
                        drawerToggle.checked = false;
                    }
                });
            });
        });
    </script>
</body>

</html>
