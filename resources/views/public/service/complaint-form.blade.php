<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Form Pengaduan Keberatan Informasi Publik</title>
        <!-- Tailwind CSS -->
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
            <div class="text-center max-w-2xl mx-auto mb-10">
                <h1 class="text-3xl font-extrabold text-gray-900 mb-3">Form Pengaduan Keberatan Informasi</h1>
                <p class="text-gray-600 text-lg">
                    Sampaikan pengaduan atau keberatan Anda terkait layanan informasi publik dengan mengisi formulir di bawah ini.
                </p>
            </div>

            <div class="flex justify-center">
                <div class="w-full max-w-2xl">
                    
                    <!-- Notifikasi Sukses -->
                    @if(session('success'))
                        <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl flex justify-between items-center shadow-sm" role="alert">
                            <span>{{ session('success') }}</span>
                            <button type="button" class="text-green-500 hover:text-green-700 font-bold" onclick="this.parentElement.remove()">&times;</button>
                        </div>
                    @endif

                    <div class="bg-white shadow-sm border border-gray-100 rounded-2xl overflow-hidden">
                        <div class="p-8">
                            <form action="{{ route('public.service.store-complaint') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                                @csrf

                                <!-- Nama Lengkap -->
                                @include('public.service.components.form-input', [
                                    'label' => 'Nama Lengkap',
                                    'name' => 'nama_lengkap',
                                    'type' => 'text',
                                    'placeholder' => 'Masukkan nama lengkap',
                                    'required' => true
                                ])

                                <!-- Email -->
                                @include('public.service.components.form-input', [
                                    'label' => 'Email',
                                    'name' => 'email',
                                    'type' => 'email',
                                    'placeholder' => 'nama@email.com',
                                    'required' => true
                                ])

                                <!-- Nomor Telepon / WhatsApp -->
                                @include('public.service.components.form-input', [
                                    'label' => 'Nomor Telepon / WhatsApp',
                                    'name' => 'nomor_telepon',
                                    'type' => 'text',
                                    'placeholder' => '08xxxxxxxxxx',
                                    'required' => true
                                ])

                                <!-- Subjek Pengaduan -->
                                @include('public.service.components.form-input', [
                                    'label' => 'Subjek Pengaduan',
                                    'name' => 'subjek_pengaduan',
                                    'type' => 'text',
                                    'placeholder' => 'Contoh: Penolakan Permintaan Informasi / Keterlambatan Layanan',
                                    'required' => true
                                ])

                                <!-- Isi Pengaduan -->
                                <div>
                                    <label for="isi_pengaduan" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Isi Pengaduan / Keberatan <span class="text-red-500">*</span>
                                    </label>
                                    <textarea class="w-full px-4 py-2.5 bg-gray-50 border {{ $errors->has('isi_pengaduan') ? 'border-red-500' : 'border-gray-300' }} rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all" id="isi_pengaduan" name="isi_pengaduan" rows="4" placeholder="Jelaskan secara detail duduk perkaranya..." required>{{ old('isi_pengaduan') }}</textarea>
                                    @error('isi_pengaduan')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Lampiran Dokumen -->
                                <div>
                                    <label for="lampiran" class="block text-sm font-semibold text-gray-700 mb-2">Lampiran Dokumen Pendukung (Opsional)</label>
                                    <input type="file" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border {{ $errors->has('lampiran') ? 'border-red-500' : 'border-gray-300' }} rounded-xl bg-gray-50 cursor-pointer" id="lampiran" name="lampiran">
                                    <p class="mt-1 text-xs text-gray-500">Format yang diizinkan: PDF, DOC, DOCX, JPG, PNG. Maksimal 5MB.</p>
                                    @error('lampiran')
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Tombol Aksi -->
                                <div class="flex items-center justify-between pt-2">
                                    <a href="{{ route('public.service.index') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm font-medium rounded-xl transition-colors">
                                        <i class="bi bi-arrow-left"></i> Kembali ke Menu
                                    </a>
                                    <button type="submit" class="inline-flex items-center gap-2 px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-xl shadow-sm transition-all">
                                        <i class="bi bi-send"></i> Kirim Pengaduan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>