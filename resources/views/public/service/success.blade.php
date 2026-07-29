<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengiriman Berhasil - PPID</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-gray-50 text-gray-800 antialiased flex items-center justify-center min-h-screen">
    
    <div class="max-w-md w-full mx-4">
        <!-- Card Success Message -->
        <div class="bg-white shadow-sm border border-gray-100 rounded-2xl overflow-hidden p-8 text-center">
            
            <!-- Icon Centang Sukses -->
            <div class="w-16 h-16 bg-green-50 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6 text-3xl shadow-sm border border-green-100">
                <i class="bi bi-check-lg"></i>
            </div>

            <!-- Judul Berhasil -->
            <h1 class="text-2xl font-extrabold text-gray-900 mb-2">Berhasil!</h1>
            <p class="text-gray-600 text-sm mb-6">
                Formulir Anda telah berhasil dikirim dan disimpan ke dalam sistem.
            </p>

            <!-- Kotak Nomor Tiket -->
            <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 mb-6">
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Nomor Tiket Anda</p>
                <div class="flex items-center justify-center gap-2">
                    <span class="text-lg font-bold text-gray-900 font-mono tracking-wide">
                        {{ $no_tiket ?? session('no_tiket', 'REQ-20260720-0001') }}
                    </span>
                </div>
                <p class="text-xs text-amber-600 font-medium mt-2 flex items-center justify-center gap-1">
                    <i class="bi bi-exclamation-triangle"></i> Simpan nomor tiket untuk tracking.
                </p>
            </div>

            <!-- Tombol Aksi / Navigasi -->
            <div class="space-y-3">
                <!-- Tombol Menuju Halaman Tracking -->
                <a href="{{ route('public.service.tracking') }}" 
                   class="w-full inline-flex items-center justify-center px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-xl transition-colors shadow-sm gap-2">
                    <i class="bi bi-search"></i> Cek Status Tracking
                </a>

                <!-- Tombol Kembali ke Beranda / Menu Layanan -->
                <a href="{{ route('public.service.index') }}" 
                   class="w-full inline-flex items-center justify-center px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-xl transition-colors gap-2">
                    <i class="bi bi-house"></i> Kembali ke Beranda
                </a>
            </div>

        </div>
    </div>

</body>
</html>