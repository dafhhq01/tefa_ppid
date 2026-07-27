<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Form Permohonan Informasi Publik</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
        <!-- Bootstrap Icons (tetap dipertahankan untuk ikon panah/kirim) -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <style>
            body { font-family: 'Plus Jakarta Sans', sans-serif; }
        </style>
    </head>
    <body class="bg-gray-50 text-gray-800 antialiased">
        <div class="max-w-4xl mx-auto px-4 py-12">
            <div class="text-center max-w-2xl mx-auto mb-10">
                <h1 class="text-3xl font-extrabold text-gray-900 mb-3">Form Permohonan Informasi Publik</h1>
                <p class="text-gray-600 text-lg">
                    Silakan isi data diri dan detail informasi yang ingin Anda mohonkan dengan benar.
                </p>
            </div>

            <div class="flex justify-center">
                <div class="w-full max-w-2xl">
                    
                    <!-- Notifikasi Sukses / Error -->
                    @if(session('success'))
                        <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl flex justify-between items-center shadow-sm" role="alert">
                            <span>{{ session('success') }}</span>
                            <button type="button" class="text-green-500 hover:text-green-700 font-bold" onclick="this.parentElement.remove()">&times;</button>
                        </div>
                    @endif

                    <div class="bg-white shadow-sm border border-gray-100 rounded-2xl overflow-hidden">
                        <div class="p-8">
                            <form action="{{ route('public.service.request-form.submit') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                                @csrf

                                <!-- Nama Lengkap -->
                                <div>
                                    <label for="nama_lengkap" class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                                    <input type="text" class="w-full px-4 py-2.5 bg-gray-50 border {{ $errors->has('nama_lengkap') ? 'border-red-500' : 'border-gray-300' }} rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="Masukkan nama lengkap" required>
                                    @error('nama_lengkap')
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div>
                                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                                    <input type="email" class="w-full px-4 py-2.5 bg-gray-50 border {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }} rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all" id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required>
                                    @error('email')
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Nomor Telepon -->
                                <div>
                                    <label for="nomor_telepon" class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon / WhatsApp</label>
                                    <input type="text" class="w-full px-4 py-2.5 bg-gray-50 border {{ $errors->has('nomor_telepon') ? 'border-red-500' : 'border-gray-300' }} rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}" placeholder="08xxxxxxxxxx" required>
                                    @error('nomor_telepon')
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- NIK -->
                                <div>
                                    <label for="nik" class="block text-sm font-semibold text-gray-700 mb-2">NIK (Nomor Induk Kependudukan)</label>
                                    <input type="text" class="w-full px-4 py-2.5 bg-gray-50 border {{ $errors->has('nik') ? 'border-red-500' : 'border-gray-300' }} rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all" id="nik" name="nik" value="{{ old('nik') }}" maxlength="16" placeholder="16 digit NIK KTP" required>
                                    @error('nik')
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Informasi yang Diminta -->
                                <div>
                                    <label for="informasi_diminta" class="block text-sm font-semibold text-gray-700 mb-2">Informasi yang Diminta</label>
                                    <input type="text" id="informasi_diminta" name="informasi_diminta" value="{{ old('informasi_diminta') }}" class="w-full px-4 py-2.5 bg-gray-50 border {{ $errors->has('informasi_diminta') ? 'border-red-500' : 'border-gray-300' }} rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all" placeholder="masukkan informasi yang anda minta" required>
                                    @error('informasi_diminta')
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Alasan Permohonan -->
                                <div>
                                    <label for="alasan_permohonan" class="block text-sm font-semibold text-gray-700 mb-2">Alasan Permohonan Informasi</label>
                                    <textarea class="w-full px-4 py-2.5 bg-gray-50 border {{ $errors->has('alasan_permohonan') ? 'border-red-500' : 'border-gray-300' }} rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all" id="alasan_permohonan" name="alasan_permohonan" rows="3" placeholder="Jelaskan tujuan penggunaan informasi publik..." required>{{ old('alasan_permohonan') }}</textarea>
                                    @error('alasan_permohonan')
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Lampiran File -->
                                <div>
                                    <label for="lampiran" class="block text-sm font-semibold text-gray-700 mb-2">Lampiran Dokumen Pendukung (KTP/Surat Pendukung)</label>
                                    <input type="file" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border {{ $errors->has('lampiran') ? 'border-red-500' : 'border-gray-300' }} rounded-xl bg-gray-50 cursor-pointer" id="lampiran" name="lampiran">
                                    <p class="mt-1 text-xs text-gray-500">Format: PDF, DOC, DOCX, JPG, PNG. Maksimal 5MB.</p>
                                    @error('lampiran')
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Tombol Aksi -->
                                <div class="flex items-center justify-between pt-2">
                                    <a href="{{ route('public.service.information-list') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm font-medium rounded-xl transition-colors">
                                        <i class="bi bi-arrow-left"></i> Kembali
                                    </a>
                                    <button type="submit" class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-xl shadow-sm transition-all">
                                        <i class="bi bi-send"></i> Kirim Permohonan
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