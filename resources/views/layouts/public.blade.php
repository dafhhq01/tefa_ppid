<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'PPID')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body>

    {{-- NAVBAR SEMENTARA — nanti diganti punya FE1 --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container">
            <a class="navbar-brand" href="/">PPID (Dummy Navbar)</a>
            <div>
                <a href="{{ route('information.index') }}" class="btn btn-sm btn-outline-primary me-2">Klasifikasi Informasi</a>
                <a href="{{ route('regulation.index') }}" class="btn btn-sm btn-outline-primary me-2">Regulasi</a>
                <a href="{{ route('faq.index') }}" class="btn btn-sm btn-outline-primary">FAQ</a>
            </div>
        </div>
    </nav>

    @yield('content')

    {{-- FOOTER SEMENTARA — nanti diganti punya FE1 --}}
    <footer class="bg-dark text-light py-4 mt-5">
        <div class="container text-center small">
            &copy; {{ date('Y') }} PPID — Footer sementara, akan diganti FE1
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>