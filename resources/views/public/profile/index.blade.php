<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Profil | PPID SMK Negeri 1 Katapang
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

        .nav-link {
            font-weight: 600;
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
                    'https://placehold.co/1600x550/0B4F6C/FFFFFF?text=Informasi+Profil'
                );

            background-size: cover;
            background-position: center;
        }

        .profile-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: 0.25s;
        }

        .profile-card:hover {
            transform: translateY(-6px);
        }

        .profile-card img {
            height: 220px;
            width: 100%;
            object-fit: cover;
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

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarPPID"
        >

            <span class="navbar-toggler-icon"></span>

        </button>

        <div
            class="collapse navbar-collapse"
            id="navbarPPID"
        >

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="/profil"
                    >

                        Profil

                    </a>

                </li>

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="/profil-ppid"
                    >

                        PPID

                    </a>

                </li>

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="/profil-sekolah"
                    >

                        Sekolah

                    </a>

                </li>

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="/visi-misi"
                    >

                        Visi & Misi

                    </a>

                </li>

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="/struktur-organisasi"
                    >

                        Organisasi

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>

<section class="page-header">

    <div class="container">

        <h1 class="display-5 fw-bold">

            Profil

        </h1>

        <p>

            Beranda / Profil

        </p>

    </div>

</section>

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <p class="text-primary fw-bold">

                INFORMASI PUBLIK

            </p>

            <h2 class="fw-bold">

                Profil PPID dan Sekolah

            </h2>

            <p
                class="text-secondary mx-auto"
                style="max-width: 700px;"
            >

                Informasi mengenai PPID, sekolah,
                visi dan misi, tugas dan fungsi,
                serta struktur organisasi.

            </p>

        </div>

        <div class="row g-4">

            @foreach ($pages as $page)

                <div class="col-md-6">

                    <div
                        class="card profile-card shadow-sm h-100"
                    >

                        <img
                            src="{{ $page['banner_image'] }}"
                            alt="{{ $page['title'] }}"
                        >

                        <div class="card-body p-4">

                            <h3 class="h4 fw-bold">

                                {{ $page['title'] }}

                            </h3>

                            <p class="text-secondary">

                                {{ $page['description'] }}

                            </p>

                            <a
                                href="/{{ $page['slug'] }}"
                                class="btn btn-ppid"
                            >

                                Lihat Selengkapnya →

                            </a>

                        </div>

                    </div>

                </div>

            @endforeach

            <div class="col-md-6">

                <div
                    class="card profile-card shadow-sm h-100"
                >

                    <img
                        src="https://placehold.co/1200x600/397367/FFFFFF?text=Struktur+Organisasi"
                        alt="Struktur Organisasi"
                    >

                    <div class="card-body p-4">

                        <h3 class="h4 fw-bold">

                            Struktur Organisasi

                        </h3>

                        <p class="text-secondary">

                            Informasi mengenai struktur,
                            jabatan, dan anggota organisasi PPID.

                        </p>

                        <a
                            href="/struktur-organisasi"
                            class="btn btn-ppid"
                        >

                            Lihat Struktur →

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<footer class="footer-ppid py-5">

    <div class="container">

        <div class="row">

            <div class="col-md-7">

                <h4 class="fw-bold">

                    PPID SMK Negeri 1 Katapang

                </h4>

                <p>

                    Portal pelayanan informasi publik
                    SMK Negeri 1 Katapang.

                </p>

            </div>

            <div class="col-md-5">

                <h5>

                    Informasi Publik

                </h5>

                <p>

                    Informasi disediakan secara terbuka,
                    mudah diakses, dan dapat diperbarui.

                </p>

            </div>

        </div>

        <hr>

        <p class="text-center mb-0">

            © {{ date('Y') }}
            PPID SMK Negeri 1 Katapang

        </p>

    </div>

</footer>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>

</body>

</html>