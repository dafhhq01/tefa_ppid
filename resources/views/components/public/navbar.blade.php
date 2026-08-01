{{-- ============ DEKSTOP  ============ --}}
<nav id="navbar" class="fixed top-0 left-0 w-full bg-transparent transition-all duration-300 z-50 border-b-2 border-white/20 rounded-b-xl">
    <div class="max-w-6xl mx-auto hidden md:flex items-center gap-10 px-4 py-3">

        <img src="{{ asset('img/logo_katapang.png') }}" class="w-14" alt="Logo">

        <ul class="ml-30 flex items-center gap-8 text-sm font-semibold">
            <li>
                <a href="/" class="{{ request()->is('/') ? 'text-blue-400' : 'text-white hover:text-blue-400' }} transition-colors">
                    Beranda
                </a>
            </li>
            <li>
                <a href="/profil" class="{{ request()->is('profil') ? 'text-blue-400' : 'text-white hover:text-blue-400' }} transition-colors">
                    Profil
                </a>
            </li>
            <li>
                <a href="/layanan-ppid" class="{{ request()->is('layanan-ppid*') ? 'text-blue-400' : 'text-white hover:text-blue-400' }} transition-colors">
                    Layanan PPID
                </a>
            </li>
            <li>
                <a href="/klasifikasi-informasi" class="{{ request()->is('klasifikasi-informasi*') ? 'text-blue-400' : 'text-white hover:text-blue-400' }} transition-colors">
                    Klasifikasi Informasi
                </a>
            </li>
            <li>
                <a href="/regulasi" class="{{ request()->is('regulasi*') ? 'text-blue-400' : 'text-white hover:text-blue-400' }} transition-colors">
                    Regulasi
                </a>
            </li>
            <li>
                <a href="/publikasi" class="{{ request()->is('publikasi*') ? 'text-blue-400' : 'text-white hover:text-blue-400' }} transition-colors">
                    Publikasi
                </a>
            </li>
            <li>
                <a href="/pengadaan" class="{{ request()->is('pengadaan*') ? 'text-blue-400' : 'text-white hover:text-blue-400' }} transition-colors">
                    Pengadaan Barang & Jasa
                </a>
            </li>
        </ul>

    </div>
</nav>

{{-- ============ MOBILE  ============ --}}

<button id="mobile-toggle" class="md:hidden fixed top-4 right-4 z-[60] flex h-11 w-11 items-center justify-center rounded-full bg-black/40 text-white backdrop-blur-sm" aria-label="Toggle menu" aria-expanded="false">
    <i class="fa-solid fa-bars" id="mobile-toggle-icon"></i>
</button>

{{-- Overlay gelap--}}
<div id="mobile-overlay" class="md:hidden fixed inset-0 bg-black/50 z-[55] hidden"></div>

{{-- Drawer menu, slide dari kiri --}}
<aside id="mobile-drawer" class="md:hidden fixed top-0 left-0 h-full w-72 max-w-[80%] bg-white z-[58] -translate-x-full transition-transform duration-300 shadow-xl flex flex-col">

    {{-- Header --}}
    <div class="flex items-center gap-3 px-5 py-4 border-b-2 border-gray-500 rounded-b-2xl">
        <img src="{{ asset('img/logo_katapang.png') }}" class="w-10 h-10 object-contain shrink-0" alt="Logo">

        <h3 class="text-sm font-bold leading-tight text-gray-900">
            PPID<br>SMKN 1 Katapang
        </h3>
    </div>

    {{-- Menu --}}
    <ul class="flex-1 overflow-y-auto flex flex-col gap-1 p-3 text-sm font-semibold">
        <li>
            <a href="/" class="flex items-center gap-3 px-3 py-3 rounded-lg transition-colors {{ request()->is('/') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                Beranda
            </a>
        </li>
        <li>
            <a href="/profil" class="flex items-center gap-3 px-3 py-3 rounded-lg transition-colors {{ request()->is('profil') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                Profil
            </a>
        </li>
        <li>
            <a href="/layanan-ppid" class="flex items-center gap-3 px-3 py-3 rounded-lg transition-colors {{ request()->is('layanan-ppid*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                Layanan PPID
            </a>
        </li>
        <li>
            <a href="/klasifikasi-informasi" class="flex items-center gap-3 px-3 py-3 rounded-lg transition-colors {{ request()->is('klasifikasi-informasi*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                Klasifikasi Informasi
            </a>
        </li>
        <li>
            <a href="/regulasi" class="flex items-center gap-3 px-3 py-3 rounded-lg transition-colors {{ request()->is('regulasi*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                Regulasi
            </a>
        </li>
        <li>
            <a href="/publikasi" class="flex items-center gap-3 px-3 py-3 rounded-lg transition-colors {{ request()->is('publikasi*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                Publikasi
            </a>
        </li>
        <li>
            <a href="/pengadaan" class="flex items-center gap-3 px-3 py-3 rounded-lg transition-colors {{ request()->is('pengadaan*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                Pengadaan Barang & Jasa
            </a>
        </li>
    </ul>

    {{-- Footer--}}
    <div class="px-5 py-4 border-t border-gray-100 text-xs text-gray-400">
        &copy; {{ date('Y') }} SMKN 1 Katapang
    </div>
</aside>
