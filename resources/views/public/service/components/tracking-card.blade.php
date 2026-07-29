@props([
    'noTiket' => 'REQ-20260720-0001',
    'jenisLayanan' => 'Permohonan Informasi Publik',
    'tanggal' => '20 Juli 2026',
    'status' => 'pending',
    'detailUrl' => '#'
])

<div class="bg-white shadow-sm border border-gray-100 rounded-2xl p-6 hover:shadow-md transition-all duration-200">
    <!-- Header Card: Nomor Tiket & Status -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 pb-4 border-b border-gray-100">
        <div>
            <span class="text-xs font-medium text-gray-400 uppercase tracking-wider">Nomor Tiket</span>
            <h4 class="text-base font-bold text-gray-900 font-mono">{{ $noTiket }}</h4>
        </div>
        <div>
            <!-- Memanggil Komponen Status Badge yang sudah dibuat sebelumnya -->
            @include('public.service.components.status-badge', ['status' => $status])
        </div>
    </div>

    <!-- Body Card: Informasi Ringkas -->
    <div class="py-4 space-y-3 text-sm">
        <div class="flex justify-between items-center">
            <span class="text-gray-500">Jenis Layanan</span>
            <span class="font-medium text-gray-800 text-right">{{ $jenisLayanan }}</span>
        </div>
        <div class="flex justify-between items-center">
            <span class="text-gray-500">Tanggal Pengajuan</span>
            <span class="text-gray-800 font-medium">{{ $tanggal }}</span>
        </div>
    </div>

    <!-- Footer Card: Tombol Aksi (Opsional jika ingin diarahkan ke detail lengkap) -->
    @if($detailUrl !== '#')
        <div class="pt-4 border-t border-gray-100 flex justify-end">
            <a href="{{ $detailUrl }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-blue-600 hover:text-blue-700 transition-colors">
                <span>Lihat Detail Lengkap</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    @endif
</div>