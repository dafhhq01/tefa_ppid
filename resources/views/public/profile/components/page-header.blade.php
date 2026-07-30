@props([
    'title' => 'Halaman',
    'breadcrumb' => null,
    'background' => null,
])

<section class="relative flex min-h-[500px] items-center overflow-hidden">

    {{-- Background --}}
    <img
        src="{{ $background ? asset($background) : asset('img/background_sklh.jpg') }}"
        alt="{{ $title }}"
        class="absolute inset-0 h-full w-full object-cover"
    >

    {{-- Overlay mengikuti FE1 --}}
    <div class="absolute inset-0 bg-slate-900/75"></div>


    {{-- Content --}}
    <div class="relative z-10 mx-auto w-full max-w-7xl px-6">

        <div class="max-w-3xl">

            {{-- Breadcrumb --}}
            <p class="text-sm font-medium text-blue-200">

                <a
                    href="{{ route('home') }}"
                    class="transition hover:text-white"
                >
                    Beranda
                </a>

                <span class="mx-2">/</span>

                <a
                    href="{{ route('profile.index') }}"
                    class="transition hover:text-white"
                >
                    Profil
                </a>

                <span class="mx-2">/</span>

                <span>
                    {{ $breadcrumb ?? $title }}
                </span>

            </p>


            {{-- Judul --}}
            <h1 class="mt-6 text-5xl font-extrabold leading-tight text-white lg:text-6xl">

                {{ $title }}

            </h1>


            <div class="mt-6 h-1 w-20 rounded bg-blue-600"></div>

        </div>

    </div>


    {{-- Gelombang --}}
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">

        <svg
            class="block h-24 w-full"
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