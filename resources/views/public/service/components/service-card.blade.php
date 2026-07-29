@props([
    'icon' => 'bi-file-earmark-text', // Default icon jika tidak diisi
    'title' => 'Judul Layanan',
    'description' => 'Deskripsi singkat mengenai layanan informasi publik ini.',
    'url' => '#',
    'buttonText' => 'Akses Layanan'
])

<div class="bg-white shadow-sm border border-gray-100 rounded-2xl p-6 hover:shadow-md transition-all duration-300 flex flex-col justify-between group">
    <div>
        <!-- Icon Layanan -->
        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center text-xl mb-5 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
            <i class="bi {{ $icon }}"></i>
        </div>

        <!-- Judul Layanan -->
        <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
            {{ $title }}
        </h3>

        <!-- Deskripsi -->
        <p class="text-gray-600 text-sm leading-relaxed mb-6">
            {{ $description }}
        </p>
    </div>

    <!-- Tombol / Link Aksi -->
    <div>
        <a href="{{ $url }}" 
           class="inline-flex items-center justify-between w-full px-4 py-2.5 bg-gray-50 hover:bg-blue-600 text-gray-700 hover:text-white text-sm font-medium rounded-xl transition-colors duration-200 group/btn">
            <span>{{ $buttonText }}</span>
            <i class="bi bi-arrow-right transform group-hover/btn:translate-x-1 transition-transform duration-200"></i>
        </a>
    </div>
</div>