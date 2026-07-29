<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>

        {{ $page->title }}

        | PPID SMKN 1 Katapang

    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f5f8fa;
            color: #263238;
        }

        .navbar-ppid {
            background-color: white;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        }

        .navbar-brand {
            color: #0b4f6c !important;
            font-weight: 800;
        }

        .page-banner {
            min-height: 330px;
            display: flex;
            align-items: center;
            text-align: center;
            color: white;

            background:
                linear-gradient(
                    rgba(5, 55, 78, 0.87),
                    rgba(5, 55, 78, 0.87)
                ),
                url('{{ $page->banner_image }}');

            background-size: cover;
            background-position: center;
        }

        .content-card {
            background-color: white;
            border-radius: 16px;
            padding: 45px;
        }

        .content-image {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            border-radius: 12px;
        }

        .cms-content {
            line-height: 1.9;
            color: #4b5563;
            font-size: 17px;
        }

        .cms-content h2 {
            color: #0b4f6c;
            font-weight: bold;
            margin-top: 35px;
        }

        .cms-content li {
            margin-bottom: 10px;
        }

        .cms-content table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .cms-content th,
        .cms-content td {
            border: 1px solid #d1d5db;
            padding: 12px;
        }

        .cms-content th {
            background-color: #0b4f6c;
            color: white;
        }

        .highlight-box {
            background-color: #eaf5f8;
            border-left: 5px solid #0b4f6c;
            padding: 25px;
            font-weight: 600;
        }

        .btn-ppid {
            background-color: #0b4f6c;
            color: white;
        }

        .btn-ppid:hover {
            background-color: #083b52;
            color: white;
        }

        .footer-ppid {
            background-color: #083b52;
            color: white;
        }

    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-ppid">

    <div class="container">

        <a
            class="navbar-brand"
            href="/profil"
        >

            PPID SMKN 1 Katapang

        </a>

        <div>

            <a
                href="/profil"
                class="btn btn-outline-primary"
            >

                ← Kembali

            </a>

        </div>

    </div>

</nav>

<section class="page-banner">

    <div class="container">

        <h1 class="display-5 fw-bold">

            {{ $page->title }}

        </h1>

        <p>

            Beranda / Profil / {{ $page->title }}

        </p>

    </div>

</section>

<section class="py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-10">

                <article class="content-card shadow-sm">

                    <h1 class="fw-bold mb-4">

                        {{ $page->title }}

                    </h1>

                    <img
                        src="{{ $page->image }}"
                        alt="{{ $page->title }}"
                        class="content-image mb-5"
                    >

                    <div class="cms-content">

                        {!! $page->content !!}

                    </div>

                    @if ($page->file)

                        <div class="mt-5">

                            <a
                                href="{{ $page->file }}"
                                class="btn btn-outline-primary"
                            >

                                Download File

                            </a>

                        </div>

                    @endif

                    @if (
                        $page->button_text
                        &&
                        $page->button_link
                    )

                        <div class="mt-5">

                            <a
                                href="{{ $page->button_link }}"
                                class="btn btn-ppid px-4 py-2"
                            >

                                {{ $page->button_text }}

                                →

                            </a>

                        </div>

                    @endif

                </article>

            </div>

        </div>

    </div>

</section>

<footer class="footer-ppid py-4">

    <div class="container text-center">

        © {{ date('Y') }}

        PPID SMK Negeri 1 Katapang

    </div>

</footer>

</body>

</html>