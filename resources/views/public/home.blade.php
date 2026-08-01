<x-public.layout>

    {{-- ================= HERO ================= --}}
    <section class="relative min-h-screen flex items-center">

        {{-- Background --}}
        <img src="{{ $banner['image'] }}" alt="{{ $banner['title'] }}" class="absolute inset-0 w-full h-full object-cover">

        {{-- Overlay --}}
        <div class="absolute inset-0 bg-slate-900/70"></div>

        {{-- Content --}}
        <div class="relative z-10 mx-auto w-full max-w-7xl px-6">
            <div class="max-w-3xl">

                <h1 class="mt-6 text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight text-white">
                    {{ $banner['title'] }}
                </h1>

                <p class="mt-4 sm:mt-6 text-base sm:text-lg leading-7 sm:leading-8 text-gray-200">
                    {{ $banner['subtitle'] }}
                </p>

                <div class="mt-8 sm:mt-10 flex flex-wrap gap-3 sm:gap-4">
                    <a href="{{ $banner['button_primary_link'] }}" class="rounded-xl bg-blue-600 px-5 py-3 sm:px-7 sm:py-4 text-sm sm:text-base font-semibold text-white hover:bg-blue-700 transition">
                        {{ $banner['button_primary'] }}
                    </a>

                    <a href="{{ $banner['button_secondary_link'] }}" class="rounded-xl border border-white px-5 py-3 sm:px-7 sm:py-4 text-sm sm:text-base font-semibold text-white hover:bg-white hover:text-slate-900 transition">
                        {{ $banner['button_secondary'] }}
                    </a>

                </div>

            </div>
        </div>

        {{-- gelombang --}}
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
            <svg
                class="block w-full h-16 sm:h-20 md:h-28"
                viewBox="0 0 1440 120"
                preserveAspectRatio="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    fill="#f9fafb"
                    d="M0,64L80,74.7C160,85,320,107,480,101.3C640,96,800,64,960,58.7C1120,53,1280,75,1360,85.3L1440,96L1440,120L0,120Z"
                />
            </svg>
        </div>
    </section>

    {{-- ================= STATISTIK ================= --}}
    <section class="bg-gray-50 py-12 sm:py-16 md:py-20">
        <div class="mx-auto max-w-7xl px-6">
            <div class="grid grid-cols-2 gap-4 sm:gap-6 md:gap-8 lg:grid-cols-4">
                @foreach ($statistics as $item)
                    <div class="rounded-2xl bg-white p-5 sm:p-6 md:p-8 text-center shadow-md transition hover:-translate-y-2 hover:shadow-xl">

                        <div class="mx-auto mb-3 flex h-12 w-12 sm:h-14 sm:w-14 items-center justify-center rounded-full bg-blue-100">
                            <i class="fa-solid {{ $item['icon'] }} text-lg sm:text-xl text-blue-600"></i>
                        </div>

                        <p class="text-2xl sm:text-3xl md:text-4xl font-bold text-blue-600">
                            {{ $item['value'] }}
                        </p>

                        <h3 class="mt-2 sm:mt-3 md:mt-4 text-sm sm:text-base md:text-lg font-semibold text-gray-800">
                            {{ $item['label'] }}
                        </h3>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- ----------------------------------- --}}
    {{-- ================= LAYANAN ================= --}}

    <section class="bg-white py-16 sm:py-20 md:py-24">
        <div class="mx-auto max-w-7xl px-6">

            {{-- Judul --}}
            <div class="text-center">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900">
                    Layanan Utama
                </h2>

                <div class="mx-auto mt-3 h-1 w-20 rounded bg-blue-600"></div>

                <p class="mt-4 text-sm sm:text-base text-gray-600">
                    Akses berbagai layanan PPID SMKN 1 Katapang dengan mudah dan cepat.
                </p>
            </div>

            {{-- Card --}}
            <div class="mt-10 sm:mt-12 md:mt-16 grid gap-6 sm:gap-8 md:grid-cols-2 lg:grid-cols-3">

                @foreach ($services as $service)
                    <div class="flex flex-col rounded-2xl border border-gray-200 bg-white p-6 sm:p-7 md:p-8 shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-xl md:min-h-[340px]">

                        {{-- Icon --}}
                        <div class="flex h-14 w-14 sm:h-16 sm:w-16 items-center justify-center rounded-full bg-blue-100">
                            <i class="fa-solid {{ $service['icon'] }} text-xl sm:text-2xl text-blue-600"></i>
                        </div>

                        {{-- Judul --}}
                        <h3 class="mt-5 sm:mt-6 text-xl sm:text-2xl font-semibold text-gray-900">
                            {{ $service['title'] }}
                        </h3>

                        {{-- Deskripsi --}}
                        <p class="mt-3 sm:mt-4 flex-1 leading-7 text-sm sm:text-base text-gray-600">
                            {{ $service['description'] }}
                        </p>

                        {{-- Button --}}
                        <a href="{{ $service['link'] }}" class="mt-6 sm:mt-8 inline-flex w-fit items-center rounded-lg bg-blue-600 px-5 sm:px-6 py-2.5 sm:py-3 text-sm sm:text-base font-semibold text-white transition hover:bg-blue-700">
                            {{ $service['button'] }}
                        </a>
                    </div>
                @endforeach

            </div>

        </div>
    </section>

    {{-- ================= INFORMASI TERBARU ================= --}}
    <section class="bg-gray-100 py-16 sm:py-20 md:py-24">
        <div class="mx-auto max-w-7xl px-6">

            {{-- Judul --}}
            <div class="text-center">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900">
                    Informasi Terbaru
                </h2>

                <div class="mx-auto mt-3 h-1 w-20 rounded bg-blue-600"></div>

                <p class="mt-4 text-sm sm:text-base text-gray-600">
                    Informasi publik terbaru PPID SMKN 1 Katapang.
                </p>
            </div>

            {{-- Card --}}
            <div class="mt-10 sm:mt-12 md:mt-16 grid gap-6 sm:gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($informations as $information)

                    <div class="overflow-hidden rounded-2xl bg-white shadow-lg transition duration-300 hover:-translate-y-2 hover:shadow-2xl">

                        {{-- Thumbnail --}}
                        <div class="relative">
                            <img src="{{ $banner['image'] }}" class="h-44 sm:h-48 md:h-56 w-full object-cover">

                            {{-- Tanggal --}}
                            <div class="absolute -bottom-5 sm:-bottom-6 left-4 sm:left-6 rounded-xl bg-white px-4 sm:px-5 py-2 sm:py-3 shadow-lg">
                                <h3 class="text-xl sm:text-2xl md:text-3xl font-bold text-blue-600">
                                    {{ $information['date'] }}
                                </h3>
                            </div>
                        </div>

                        {{-- Isi --}}
                        <div class="p-5 sm:p-6 pt-8 sm:pt-10">
                            <p class="text-xs sm:text-sm text-gray-500">
                                PPID SMKN 1 Katapang
                            </p>

                            <h3 class="mt-3 text-lg sm:text-xl md:text-2xl font-bold text-gray-900 leading-snug">
                                {{ $information['title'] }}
                            </h3>

                            <p class="mt-3 sm:mt-4 text-sm sm:text-base text-gray-600">
                                {{ $information['summary'] }}
                            </p>

                            <a href="{{ $information['link'] }}" class="mt-5 sm:mt-6 inline-flex items-center gap-2 text-sm sm:text-base font-semibold text-blue-600 hover:text-blue-700">
                                Selengkapnya
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>
    </section>

    {{-- ================= BERITA TERBARU ================= --}}
    <section class="bg-white py-16 sm:py-20 md:py-24">
        <div class="mx-auto max-w-7xl px-6">

            {{-- Judul --}}
            <div class="text-center">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900">
                    Berita Terbaru
                </h2>

                <div class="mx-auto mt-3 h-1 w-20 rounded bg-blue-600"></div>

                <p class="mt-4 text-sm sm:text-base text-gray-600">
                    Informasi publik terbaru PPID SMKN 1 Katapang.
                </p>
            </div>

            {{-- Card --}}
            <div class="mt-10 sm:mt-12 md:mt-16 grid gap-6 sm:gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($news as $newsItem)

                    <div class="overflow-hidden rounded-2xl bg-white shadow-lg transition duration-300 hover:-translate-y-2 hover:shadow-2xl">

                        {{-- Thumbnail --}}
                        <div class="relative">
                            <img src="{{ $banner['image'] }}" class="h-44 sm:h-48 md:h-56 w-full object-cover">

                            {{-- Tanggal --}}
                            <div class="absolute -bottom-5 sm:-bottom-6 left-4 sm:left-6 rounded-xl bg-white px-4 sm:px-5 py-2 sm:py-3 shadow-lg">
                                <h3 class="text-xl sm:text-2xl md:text-3xl font-bold text-blue-600">
                                    {{ $newsItem['date'] }}
                                </h3>
                            </div>
                        </div>

                        {{-- Isi --}}
                        <div class="p-5 sm:p-6 pt-8 sm:pt-10">
                            <p class="text-xs sm:text-sm text-gray-500">
                                PPID SMKN 1 Katapang
                            </p>

                            <h3 class="mt-3 text-lg sm:text-xl md:text-2xl font-bold text-gray-900 leading-snug">
                                {{ $newsItem['title'] }}
                            </h3>

                            <p class="mt-3 sm:mt-4 text-sm sm:text-base text-gray-600">
                                {{ $newsItem['summary'] }}
                            </p>

                            <a href="{{ $newsItem['link'] }}" class="mt-5 sm:mt-6 inline-flex items-center gap-2 text-sm sm:text-base font-semibold text-blue-600 hover:text-blue-700">
                                Baca
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>
    </section>

    {{-- ================= CTA ================= --}}
    <section class="bg-gray-100 py-16 sm:py-20 md:py-24">
        <div class="mx-auto max-w-7xl px-6">

            <div class="rounded-3xl bg-white px-6 sm:px-8 py-10 sm:py-12 md:py-16 text-center shadow-2xl">

                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold">
                        {{ $cta['title'] }}
                    </h2>

                    <div class="mx-auto mt-3 h-1 w-20 rounded bg-blue-600"></div>

                    <p class="mx-auto font-bold mt-5 max-w-2xl text-sm sm:text-base md:text-lg text-gray-400">
                        {{ $cta['description'] }}
                    </p>

                    <a href="{{ $cta['link'] }}" class="mt-8 sm:mt-10 inline-flex items-center gap-3 rounded-xl bg-gray-50 px-6 sm:px-8 py-3 sm:py-4 text-sm sm:text-base font-semibold text-blue-700 shadow-lg transition duration-300 hover:-translate-y-1 hover:bg-gray-100">
                        Ajukan Permohonan
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
            </div>
        </div>
    </section>

</x-public.layout>
