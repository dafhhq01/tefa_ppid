<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasil Lacakan Permohonan - PPID</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-gray-50 text-gray-800 antialiased">
    <div class="max-w-4xl mx-auto px-4 py-12">
        <!-- Header Judul -->
        <div class="text-center max-w-2xl mx-auto mb-10">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-3">Hasil Lacakan Permohonan</h1>
            <p class="text-gray-600 text-lg">
                Berikut adalah detail informasi dan riwayat status dari nomor tiket yang Anda cari.
            </p>
        </div>

        <div class="w-full max-w-2xl mx-auto space-y-6">
            
            <!-- Card Detail Permohonan -->
            <div class="bg-white shadow-sm border border-gray-100 rounded-2xl overflow-hidden p-8">
                <div class="flex justify-between items-center pb-4 mb-6 border-b border-gray-100">
                    <h2 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                        <i class="bi bi-file-earmark-text text-blue-600"></i> Detail Permohonan
                    </h2>
                    <!-- Badge Status Utama -->
                    @php
                        // Contoh variabel status: Pending, Diproses, Selesai, Ditolak
                        $status = $trackingResult->status ?? 'Diproses';
                        
                        $badgeClasses = match(strtolower($status)) {
                            'selesai' => 'bg-green-50 text-green-700 border-green-200',
                            'diproses' => 'bg-blue-50 text-blue-700 border-blue-200',
                            'ditolak' => 'bg-red-50 text-red-700 border-red-200',
                            default => 'bg-yellow-50 text-yellow-700 border-yellow-200', // Pending
                        };
                    @endphp
                    <span class="px-3 py-1 text-xs font-semibold border rounded-full {{ $badgeClasses }}">
                        {{ ucfirst($status) }}
                    </span>
                </div>

                <div class="space-y-4 text-sm">
                    <div class="flex justify-between py-2 border-b border-gray-50">
                        <span class="text-gray-500 font-medium">Nomor Tiket</span>
                        <span class="font-bold text-gray-900">{{ $trackingResult->no_tiket ?? 'REQ-20260720-0001' }}</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-gray-50">
                        <span class="text-gray-500 font-medium">Nama Pemohon</span>
                        <span class="font-semibold text-gray-800">{{ $trackingResult->nama_lengkap ?? 'Budi Santoso' }}</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-gray-50">
                        <span class="text-gray-500 font-medium">Tanggal Pengajuan</span>
                        <span class="text-gray-800">{{ $trackingResult->tanggal ?? '20 Juli 2026' }}</span>
                    </div>
                    <div class="flex justify-between py-2">
                        <span class="text-gray-500 font-medium">Jenis Layanan</span>
                        <span class="text-gray-800">{{ $trackingResult->jenis_layanan ?? 'Permohonan Informasi Publik' }}</span>
                    </div>
                </div>
            </div>

            <!-- Card Riwayat Proses (Timeline) -->
            <div class="bg-white shadow-sm border border-gray-100 rounded-2xl overflow-hidden p-8">
                <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-2">
                    <i class="bi bi-clock-history text-blue-600"></i> Riwayat Proses
                </h3>

                <div class="relative pl-6 space-y-6 before:absolute before:left-2.5 before:top-2 before:bottom-2 before:w-0.5 before:bg-gray-200">
                    
                    <!-- Status 1: Pending (Masuk/Terkirim) -->
                    <div class="relative flex items-start space-x-3">
                        <span class="absolute -left-6 top-0.5 w-4 h-4 rounded-full bg-blue-600 border-2 border-white ring-4 ring-blue-50"></span>
                        <div>
                            <p class="text-sm font-bold text-gray-900">Pending / Berkas Diterima</p>
                            <p class="text-xs text-gray-500">Permohonan telah berhasil dikirim ke sistem dan menunggu verifikasi awal.</p>
                            <span class="text-[11px] text-gray-400 mt-1 block">20 Juli 2026 - 08:00 WIB</span>
                        </div>
                    </div>

                    <!-- Status 2: Diproses -->
                    <div class="relative flex items-start space-x-3">
                        <span class="absolute -left-6 top-0.5 w-4 h-4 rounded-full {{ in_array(strtolower($status), ['diproses', 'selesai']) ? 'bg-blue-600' : 'bg-gray-300' }} border-2 border-white ring-4 ring-gray-50"></span>
                        <div>
                            <p class="text-sm font-bold text-gray-900">Sedang Diproses</p>
                            <p class="text-xs text-gray-500">Petugas sedang memeriksa dan memproses dokumen permintaan informasi.</p>
                            <span class="text-[11px] text-gray-400 mt-1 block">20 Juli 2026 - 10:30 WIB</span>
                        </div>
                    </div>

                    <!-- Status 3: Selesai / Ditolak (Kondisional) -->
                    @if(strtolower($status) === 'ditolak')
                        <div class="relative flex items-start space-x-3">
                            <span class="absolute -left-6 top-0.5 w-4 h-4 rounded-full bg-red-600 border-2 border-white ring-4 ring-red-50"></span>
                            <div>
                                <p class="text-sm font-bold text-red-600">Permohonan Ditolak</p>
                                <p class="text-xs text-gray-500">Maaf, permohonan informasi ditolak karena dikecualikan sesuai undang-undang.</p>
                                <span class="text-[11px] text-gray-400 mt-1 block">21 Juli 2026 - 14:00 WIB</span>
                            </div>
                        </div>
                    @else
                        <div class="relative flex items-start space-x-3">
                            <span class="absolute -left-6 top-0.5 w-4 h-4 rounded-full {{ strtolower($status) === 'selesai' ? 'bg-green-600' : 'bg-gray-300' }} border-2 border-white ring-4 ring-gray-50"></span>
                            <div>
                                <p class="text-sm font-bold text-gray-900">Selesai</p>
                                <p class="text-xs text-gray-500">Informasi telah disediakan atau diserahkan kepada pemohon.</p>
                                <span class="text-[11px] text-gray-400 mt-1 block">{{ strtolower($status) === 'selesai' ? '21 Juli 2026 - 13:00 WIB' : 'Menunggu penyelesaian' }}</span>
                            </div>
                        </div>
                    @endif

                </div>
            </div>

            <!-- Tombol Kembali -->
            <div class="flex justify-start pt-2">
                <a href="{{ route('public.service.tracking') }}" 
                   class="inline-flex items-center px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-lg transition-colors">
                    <i class="bi bi-arrow-left mr-2"></i> Cek Tiket Lain
                </a>
            </div>

        </div>
    </div>
</body>
</html>