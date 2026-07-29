<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>

        Struktur Organisasi

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
        }

        .navbar-ppid {
            background-color: white;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        }

        .navbar-brand {
            color: #0b4f6c !important;
            font-weight: 800;
        }

        .page-header {
            min-height: 320px;
            display: flex;
            align-items: center;
            text-align: center;
            color: white;

            background:
                linear-gradient(
                    rgba(5, 55, 78, 0.88),
                    rgba(5, 55, 78, 0.88)
                ),
                url(
                    'https://placehold.co/1600x550/397367/FFFFFF?text=Struktur+Organisasi'
                );

            background-size: cover;
            background-position: center;
        }

        .organization-card {
            border: none;
            border-radius: 16px;
            transition: 0.25s;
        }

        .organization-card:hover {
            transform: translateY(-6px);
        }

        .member-photo {
            width: 150px;
            height: 150px;
            object-fit: cover;
        }

        .position {
            color: #0b4f6c;
            font-weight: bold;
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

        <a
            href="/profil"
            class="btn btn-outline-primary"
        >

            ← Kembali

        </a>

    </div>

</nav>

<section class="page-header">

    <div class="container">

        <h1 class="display-5 fw-bold">

            Struktur Organisasi PPID

        </h1>

        <p>

            Beranda / Struktur Organisasi

        </p>

    </div>

</section>

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <p class="text-primary fw-bold">

                ORGANISASI PPID

            </p>

            <h2 class="fw-bold">

                Struktur dan Anggota PPID

            </h2>

            <p class="text-secondary">

                Susunan jabatan dan anggota
                Pejabat Pengelola Informasi dan Dokumentasi.

            </p>

        </div>

        <div class="row justify-content-center g-4">

            @foreach ($members as $member)

                <div class="col-md-6 col-lg-4">

                    <div
                        class="card organization-card
                               shadow-sm text-center h-100"
                    >

                        <div class="pt-4">

                            <img
                                src="{{ $member->photo }}"
                                alt="{{ $member->name }}"
                                class="member-photo rounded-circle shadow"
                            >

                        </div>

                        <div class="card-body p-4">

                            <h4 class="fw-bold">

                                {{ $member->name }}

                            </h4>

                            <p class="position">

                                {{ $member->position }}

                            </p>

                            <p class="text-secondary">

                                {{ $member->description }}

                            </p>

                        </div>

                    </div>

                </div>

            @endforeach

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