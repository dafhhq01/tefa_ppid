@props(['item'])

<div class="bg-white border border-blue-100 rounded-xl shadow-sm hover:shadow-md transition overflow-hidden">
    <img src="{{ $item->thumbnail ?? 'https://via.placeholder.com/400x220' }}" class="w-full h-40 object-cover">
    <div class="p-4">
        <p class="text-xs text-blue-500">{{ $item->published_at ?? '01 Jan 2026' }}</p>
        <h3 class="font-semibold text-blue-900 mt-1 line-clamp-2">{{ $item->title ?? 'Judul Berita' }}</h3>
        <p class="text-sm text-gray-500 mt-1 line-clamp-2">{{ $item->excerpt ?? 'Ringkasan berita...' }}</p>
        <a href="{{ route('news.detail', $item->slug ?? '#') }}"
            class="inline-block mt-3 text-sm font-medium text-blue-600 hover:text-blue-800">
            Selengkapnya &rarr;
        </a>
    </div>
</div>
