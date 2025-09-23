<div class="navbar shadow-sm wadb1 text-white sticky top-0 z-30">
    <div class="navbar-start pl-4">
        <button id="menu-toggle" class="btn btn-ghost md:hidden" title="Menu-toggle">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
        <a href="{{ config('app.url') }}"
            class="font-2xl font-semibold uppercase text-white ml-2 hover:font-bold md:hidden"
            title="{{ config('app.name') }}">{{ config('app.name') }}</a>
        <a href="{{ config('app.url') }}" class="flex-row items-center hidden md:flex" title="{{ config('app.name') }}">
            <img src="{{ asset('image/logoLotus.png') }}" alt="Logo Lotusaja" class="h-8"
                style="filter: brightness(0) invert(1);">
            <span class="font-semibold text-xl ml-2 uppercase">{{ config('app.name') }}</span>
        </a>
    </div>

    <div class="navbar-center hidden md:flex">
        <ul class="menu menu-horizontal px-1 gap-4">
            <li title="Home">
                <a href="/"
                    class="flex items-center gap-2 colorsan rounded-lg px-4 transition-colors {{ request()->is('/') ? 'font-semibold wadb3 bordersanbottom2 text-primary-content' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    Home
                </a>
            </li>
            <li title="About">
                <a href="{{ route('about') }}"
                    class="flex items-center gap-3 rounded-lg colorsan transition-colors {{ request()->is('about') ? 'font-semibold wadb3 bordersanbottom2 text-primary-content' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <rect x="3" y="4" width="18" height="16" rx="2" ry="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <circle cx="9" cy="10" r="2.5" />
                        <path d="M15 8h3M15 12h3" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M5 16h14" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6 14c0-2 1.5-2 3-2s3 0 3 2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    About Us
                </a>
            </li>
            <li title="Pricing">
                <a href="{{ route('pricing') }}"
                    class="flex items-center gap-3 rounded-lg colorsan transition-colors {{ request()->is('pricing') ? 'font-semibold wadb3 bordersanbottom2 text-primary-content' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                    </svg>
                    Pricing
                </a>
            </li>
            <li title="Documentation">
                <a href="/docs/getting-started"
                    class="flex items-center gap-3 rounded-lg colorsan transition-colors {{ request()->is('docs*') ? 'font-semibold wadb3 bordersanbottom2 text-primary-content' : '' }}">
                    <i class="fa-solid fa-book"></i>
                    Documentation
                </a>
            </li>
        </ul>
    </div>
    <div class="navbar-end pr-6">
        <a href="{{ route('login') }}" title="Login"
            class="rounded-lg px-4 py-2 btnsecondarys flex items-center justify-center gap-2 font-semibold hover:font-bold transition-all md:text-sm">
            <i class="fa-solid fa-arrow-right-to-bracket"></i>
            Login
        </a>
    </div>
</div>
<div id="overlay"
    class="fixed inset-0 bg-transparent bg-opacity-0 transition-opacity duration-300 ease-in-out z-40 hidden">
</div>

<div id="sidebar"
    class="fixed top-0 left-0 h-screen w-64 shadow-lg wadb1 transform -translate-x-full transition-transform duration-300 ease-in-out bg-base-400 z-50 overflow-y-auto md:hidden">
    <div class="p-3 flex justify-between items-center wadb2 bordersanbottom">
        <div class="flex items-center wad4">
            <img src="{{ asset('image/logoLotus.png') }}" alt="Lotus Logo" class="h-6"
                style="filter: brightness(0) invert(1);">
            <h2 class="text-lg font-bold ml-2 uppercase">{{ config('app.name') }}</h2>
        </div>
        <button id="close-menu" class="p-2 rounded-full hoversecond" title="Close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <ul class="menu p-4 space-y-2 mt-2 w-full text-white">
        <li title="Home">
            <a href="/"
                class="flex items-center gap-3 p-3 rounded-lg colorsan transition-colors  {{ request()->is('/') ? 'font-semibold wadb3 bordersanbottom2 text-primary-content' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                Home
            </a>
        </li>
        <li title="About">
            <a href="{{ route('about') }}"
                class="flex items-center gap-3 p-3 rounded-lg colorsan transition-colors {{ request()->is('about') ? 'font-semibold wadb3 bordersanbottom2 text-primary-content' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <rect x="3" y="4" width="18" height="16" rx="2" ry="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <circle cx="9" cy="10" r="2.5" />
                    <path d="M15 8h3M15 12h3" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M5 16h14" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M6 14c0-2 1.5-2 3-2s3 0 3 2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                About Us
            </a>
        </li>
        <li title="Pricing">
            <a href="{{ route('pricing') }}"
                class="flex items-center gap-3 p-3 rounded-lg colorsan transition-colors {{ request()->is('pricing') ? 'font-semibold wadb3 bordersanbottom2 text-primary-content' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                </svg>
                Pricing
            </a>
        </li>
        <li title="Documentation">
            <a href="/docs/getting-started"
                class="flex items-center gap-3 p-3 rounded-lg colorsan transition-colors {{ request()->is('docs*') ? 'font-semibold wadb3 bordersanbottom2 text-primary-content' : '' }}">
                <i class="fa-solid fa-book"></i>
                Documentation
            </a>
        </li>
    </ul>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.getElementById('menu-toggle');
        const closeMenu = document.getElementById('close-menu');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            sidebar.classList.add('translate-x-0');
            overlay.classList.remove('hidden');
            setTimeout(() => {
                overlay.classList.add('bg-opacity-50');
                overlay.classList.remove('bg-opacity-0');
            }, 50);
        }

        function closeSidebar() {
            sidebar.classList.remove('translate-x-0');
            sidebar.classList.add('-translate-x-full');
            overlay.classList.remove('bg-opacity-50');
            overlay.classList.add('bg-opacity-0');
            setTimeout(() => {
                overlay.classList.add('hidden');
            }, 300);
        }

        if (menuToggle) {
            menuToggle.addEventListener('click', openSidebar);
        }

        if (closeMenu) {
            closeMenu.addEventListener('click', closeSidebar);
        }

        if (overlay) {
            overlay.addEventListener('click', closeSidebar);
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeSidebar();
            }
        });
    });
</script>
