@props([
    'label' => 'Label Input',
    'name' => 'nama_input',
    'type' => 'text',
    'placeholder' => '',
    'required' => false
])

<div class="space-y-2">
    <!-- Label Input -->
    <label for="{{ $name }}" class="block text-sm font-semibold text-gray-700">
        {{ $label }} 
        @if($required)
            <span class="text-red-500">*</span>
        @endif
    </label>

    <!-- Kotak Input -->
    <input type="{{ $type }}" 
           id="{{ $name }}" 
           name="{{ $name }}" 
           value="{{ old($name) }}" 
           placeholder="{{ $placeholder }}" 
           {{ $required ? 'required' : '' }}
           class="w-full px-4 py-2.5 bg-gray-50 border {{ $errors->has($name) ? 'border-red-500 bg-red-50/30' : 'border-gray-300' }} rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all">

    <!-- Pesan Error Validasi -->
    @error($name)
        <p class="text-xs text-red-500 flex items-center gap-1 mt-1">
            <i class="bi bi-exclamation-circle"></i> {{ $message }}
        </p>
    @enderror
</div>