@props([
    'label' => 'Lampiran Dokumen Pendukung',
    'name' => 'lampiran',
    'helper' => 'Format: PDF, DOC, DOCX, JPG, PNG. Maksimal 5MB.',
    'required' => false
])

<div class="space-y-2">
    <!-- Label File Upload -->
    <label for="{{ $name }}" class="block text-sm font-semibold text-gray-700">
        {{ $label }}
        @if($required)
            <span class="text-red-500">*</span>
        @endif
    </label>

    <!-- Input File dengan Styling Kustom -->
    <input type="file" 
           id="{{ $name }}" 
           name="{{ $name }}" 
           {{ $required ? 'required' : '' }}
           class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border {{ $errors->has($name) ? 'border-red-500 bg-red-50/30' : 'border-gray-300' }} rounded-xl bg-gray-50 cursor-pointer transition-all">

    <!-- Helper Text / Petunjuk Format -->
    <p class="text-xs text-gray-500">{{ $helper }}</p>

    <!-- Pesan Error Validasi -->
    @error($name)
        <p class="text-xs text-red-500 flex items-center gap-1 mt-1">
            <i class="bi bi-exclamation-circle"></i> {{ $message }}
        </p>
    @enderror
</div>