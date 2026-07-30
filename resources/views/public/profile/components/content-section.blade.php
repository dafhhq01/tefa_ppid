@props([
    'title',
    'image' => null,
    'content',
    'buttonText' => null,
    'buttonLink' => null,
    'file' => null,
])

<div>

    {{-- Gambar --}}
    @if ($image)

        <img
            src="{{ asset($image) }}"
            alt="{{ $title }}"
            class="mb-10 h-80 w-full rounded-2xl object-cover"
        >

    @endif


    {{-- Konten CMS --}}
    <div
        class="space-y-6 text-base leading-8 text-gray-600"
    >

        {!! $content !!}

    </div>


    {{-- File --}}
    @if ($file)

        <div class="mt-10">

            <a
                href="{{ asset($file) }}"
                class="inline-flex items-center rounded-lg bg-blue-600 px-6 py-3 font-semibold text-white transition hover:bg-blue-700"
            >
                Unduh Dokumen
            </a>

        </div>

    @endif


    {{-- Button --}}
    @if ($buttonText && $buttonLink)

        <div class="mt-10">

            <a
                href="{{ $buttonLink }}"
                class="inline-flex items-center rounded-lg bg-blue-600 px-6 py-3 font-semibold text-white transition hover:bg-blue-700"
            >
                {{ $buttonText }}
            </a>

        </div>

    @endif

</div>