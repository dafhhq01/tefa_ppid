@php

    $title = $title ?? 'Halaman';

    $breadcrumb = $breadcrumb ?? $title;

    $background = $background
        ?? 'https://placehold.co/1600x550/0B4F6C/FFFFFF';

@endphp

<section
    style="
        min-height: 320px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;

        background:
            linear-gradient(
                rgba(5, 55, 78, 0.88),
                rgba(5, 55, 78, 0.88)
            ),
            url('{{ $background }}');

        background-size: cover;
        background-position: center;
    "
>

    <div>

        <h1>

            {{ $title }}

        </h1>

        <p>

            Beranda / {{ $breadcrumb }}

        </p>

    </div>

</section>