<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cek Status Permohonan Informasi Publik</title>
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
    <div class="max-w-4xl mx-auto px-4 py-12">
        <!-- Header Judul -->
        <div class="text-center max-w-2xl mx-auto mb-10">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-3">Lacak Status Permohonan</h1>
            <p class="text-gray-600 text-lg">
                Masukkan nomor tiket permohonan Anda untuk mengecek sejauh mana proses pengajuan informasi publik diproses.
            </p>
        </div>

        <div class="flex justify-center">
            <div class="w-full max-w-xl">
                
                <!-- Notifikasi / Error -->
                @if(session('error'))
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl flex justify-between items-center shadow-sm" role="alert">
                        <span>{{ session('error') }}</span>
                        <button type="button" class="text-red-500 hover:text-red-700 font-bold" onclick="this.parentElement.remove()">×</button>
                    </div>
                @endif

                <!-- Card Form Tracking -->
                <div class="bg-white shadow-sm border border-gray-100 rounded-2xl overflow-hidden">
                    <div class="p-8">
                        <form action="{{ route('public.service.tracking.check') }}" method="POST" class="space-y-6">
                            @csrf

                            <!-- Menggunakan Komponen form-input untuk Nomor Tiket -->
                            @include('public.service.components.form-input', [
                                'label' => 'Nomor Tiket',
                                'name' => 'no_tiket',
                                'type' => 'text',
                                'placeholder' => 'Contoh: REQ-20260720-0001',
                                'required' => true
                            ])

                            <!-- Tombol Aksi -->
                            <div class="flex items-center justify-between pt-2">
                                <a href="{{ route('public.service.information-list') }}" 
                                   class="inline-flex items-center px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-lg transition-colors">
                                    <i class="bi bi-arrow-left mr-2"></i> Kembali
                                </a>
                                <button type="submit" 
                                        class="inline-flex items-center px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors shadow-sm">
                                    <i class="bi bi-search mr-2"></i> Cek Status
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Bagian Hasil Tracking Menggunakan tracking-card -->
                @isset($trackingResult)
                    <div class="mt-8">
                        <h3 class="text-base font-bold text-gray-900 mb-4">Hasil Pencarian Tiket</h3>
                        
                        <!-- ringkasan status yang sudah di buat -->
                        @include('public.service.components.tracking-card', [
                            'noTiket' => $trackingResult->no_tiket,
                            'jenisLayanan' => $trackingResult->jenis_layanan ?? 'Permohonan Informasi Publik',
                            'tanggal' => $trackingResult->tanggal,
                            'status' => $trackingResult->status,
                            'detailUrl' => '#'
                        ])
                        <!-- Timeline Riwayat Perubahan Status -->
                        <div class="bg-white shadow-sm border border-gray-100 rounded-2xl p-6">
                            <h3 class="text-base font-bold text-gray-900 mb-6 pb-2 border-b border-gray-100">
                                Riwayat Perjalanan Permohonan
                            </h3>
                            
                            <!-- Memanggil Komponen Timeline Status -->
                            @include('public.service.components.timeline-status', [
                            'histories' => $trackingResult->histories ?? [] 
                            ])
                        </div>
                    </div>
                @endisset

            </div>
        </div>
    </div>
</body>
</html>