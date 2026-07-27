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
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md hover:border-blue-100 transition-all relative flex flex-col text-center">
                <div class="mb-4">
                    <i class="bi bi-journal-text text-4xl text-blue-600"></i>
                </div>
                <h5 class="font-bold text-gray-900 mb-2">Daftar Informasi Publik</h5>
                <p class="text-sm text-gray-500 mb-4 grow">Akses berbagai dokumen, data, dan informasi publik secara transparan.</p>
                <a href="{{ route('public.service.information-list') }}" class="absolute inset-0 z-10"></a>
            </div>

            <!-- Permohonan Informasi -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md hover:border-green-100 transition-all relative flex flex-col text-center">
                <div class="mb-4">
                    <i class="bi bi-file-earmark-plus text-4xl text-green-600"></i>
                </div>
                <h5 class="font-bold text-gray-900 mb-2">Permohonan Informasi</h5>
                <p class="text-sm text-gray-500 mb-4 grow">Ajukan permohonan dokumen atau data informasi publik baru secara online.</p>
                <a href="{{ route('public.service.request-form') }}" class="absolute inset-0 z-10"></a>
            </div>

            <!-- Pengaduan Keberatan -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md hover:border-amber-100 transition-all relative flex flex-col text-center">
                <div class="mb-4">
                    <i class="bi bi-exclamation-triangle text-4xl text-amber-500"></i>
                </div>
                <h5 class="font-bold text-gray-900 mb-2">Pengaduan Keberatan</h5>
                <p class="text-sm text-gray-500 mb-4 grow">Sampaikan pengaduan atau pengajuan keberatan atas layanan informasi.</p>
                <a href="{{ route('public.service.complaint-form') }}" class="absolute inset-0 z-10"></a>
            </div>

            <!-- Tracking Permohonan -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md hover:border-cyan-100 transition-all relative flex flex-col text-center">
                <div class="mb-4">
                    <i class="bi bi-search text-4xl text-cyan-600"></i>
                </div>
                <h5 class="font-bold text-gray-900 mb-2">Tracking Permohonan</h5>
                <p class="text-sm text-gray-500 mb-4 grow">Lacak status perkembangan atau progres permohonan informasi.</p>
                <a href="{{ route('public.service.tracking') }}" class="absolute inset-0 z-10"></a>
            </div>

        </div>
    </div>

</body>
</html>