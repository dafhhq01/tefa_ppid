<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan PPID</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <!-- Konten Utama Layanan (Tanpa Navbar) -->
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-3">Layanan PPID</h1>
            <p class="text-gray-600 text-lg">
                Pilih layanan informasi publik yang Anda butuhkan melalui tautan di bawah ini.
            </p>
        </div>

        <!-- Grid Layanan PPID -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    
        <!-- Daftar Informasi Publik -->
        @include('public.service.components.service-card', [
            'icon' => 'bi-journal-text text-blue-600',
            'title' => 'Daftar Informasi Publik',
            'description' => 'Akses berbagai dokumen, data, dan informasi publik secara transparan.',
            'url' => route('public.service.information-list'),
            'buttonText' => 'Akses Dokumen'
        ])

        <!-- Permohonan Informasi -->
        @include('public.service.components.service-card', [
            'icon' => 'bi-file-earmark-plus text-green-600',
            'title' => 'Permohonan Informasi',
            'description' => 'Ajukan permohonan dokumen atau data informasi publik baru secara online.',
            'url' => route('public.service.request-form'),
            'buttonText' => 'Buat Permohonan'
        ])

        <!-- Pengaduan Keberatan -->
        @include('public.service.components.service-card', [
            'icon' => 'bi-exclamation-triangle text-amber-500',
            'title' => 'Pengaduan Keberatan',
            'description' => 'Sampaikan pengaduan atau pengajuan keberatan atas layanan informasi.',
            'url' => route('public.service.complaint-form'),
            'buttonText' => 'Ajukan Pengaduan'
        ])

        <!-- Tracking Permohonan -->
        @include('public.service.components.service-card', [
            'icon' => 'bi-search text-cyan-600',
            'title' => 'Tracking Permohonan',
            'description' => 'Lacak status perkembangan atau progres permohonan informasi.',
            'url' => route('public.service.tracking'),
            'buttonText' => 'Cek Status'
        ])
        </div>
    </div>

</body>
</html>