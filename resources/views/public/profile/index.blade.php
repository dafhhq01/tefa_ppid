<x-public.layout>

    {{-- HERO --}}
    <section class="relative flex min-h-[650px] items-center overflow-hidden">

        {{-- Background mengikuti konsep hero FE1 --}}
        <img
            src="{{ asset('img/background_sklh.jpg') }}"
            alt="Profil PPID"
            class="absolute inset-0 h-full w-full object-cover"
        >

        {{-- Overlay --}}
        <div class="absolute inset-0 bg-slate-900/70"></div>

        {{-- Isi --}}
        <div class="relative z-10 mx-auto w-full max-w-7xl px-6">

            <div class="max-w-3xl">

                <p class="text-sm font-semibold uppercase tracking-[0.3em] text-blue-300">
                    PPID SMK Negeri 1 Katapang
                </p>

                <h1 class="mt-6 text-5xl font-extrabold leading-tight text-white lg:text-6xl">
                    Profil PPID
                </h1>

                <p class="mt-6 text-lg leading-8 text-gray-200">
                    Mengenal Pejabat Pengelola Informasi dan Dokumentasi
                    serta informasi profil SMK Negeri 1 Katapang.
                </p>

                <div class="mt-10 flex flex-wrap gap-4">

                    <a
                        href="#informasi-profil"
                        class="rounded-xl bg-blue-600 px-7 py-4 font-semibold text-white transition hover:bg-blue-700"
                    >
                        Lihat Informasi
                    </a>

                    <a
                        href="{{ route('profile.organization') }}"
                        class="rounded-xl border border-white px-7 py-4 font-semibold text-white transition hover:bg-white hover:text-slate-900"
                    >
                        Struktur Organisasi
                    </a>

                </div>

            </div>

        </div>

        {{-- Gelombang, mengikuti homepage FE1 --}}
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">

            <svg
                class="block h-28 w-full"
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


    {{-- DAFTAR PROFIL --}}
    <section
        id="informasi-profil"
        class="bg-gray-50 py-24"
    >

        <div class="mx-auto max-w-7xl px-6">

            {{-- Judul --}}
            <div class="text-center">

                <p class="text-sm font-semibold uppercase tracking-[0.25em] text-blue-600">
                    Informasi Publik
                </p>

                <h2 class="mt-3 text-4xl font-bold text-gray-900">
                    Informasi Profil
                </h2>

                <div class="mx-auto mt-4 h-1 w-20 rounded bg-blue-600"></div>

                <p class="mx-auto mt-5 max-w-2xl text-gray-600">
                    Akses informasi mengenai PPID dan SMK Negeri 1 Katapang.
                </p>

            </div>


            {{-- Card --}}
            <div class="mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-3">

                @foreach ($profiles as $profile)

                    <a
                        href="{{ $profile['url'] }}"
                        class="group flex min-h-[300px] flex-col rounded-2xl border border-gray-200 bg-white p-8 shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-xl"
                    >

                        {{-- Icon --}}
                        <div class="flex h-16 w-16 items-center justify-center rounded-full bg-blue-100 text-3xl">

                            {{ $profile['icon'] }}

                        </div>


                        {{-- Judul --}}
                        <h3 class="mt-6 text-2xl font-semibold text-gray-900 group-hover:text-blue-600">

                            {{ $profile['title'] }}

                        </h3>


                        {{-- Deskripsi --}}
                        <p class="mt-4 flex-1 leading-7 text-gray-600">

                            {{ $profile['description'] }}

                        </p>


                        {{-- Button --}}
                        <span class="mt-8 inline-flex w-fit items-center rounded-lg bg-blue-600 px-6 py-3 font-semibold text-white transition group-hover:bg-blue-700">

                            Lihat Informasi

                        </span>

                    </a>

                @endforeach

            </div>

        </div>

    </section>

</x-public.layout>