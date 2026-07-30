@props(['doc'])

<div class="flex items-center justify-between bg-white border border-blue-100 rounded-xl p-4 shadow-sm hover:shadow-md transition">
    <div>
        <h3 class="font-semibold text-blue-900">{{ $doc->title ?? 'Judul Dokumen' }}</h3>
        <p class="text-xs text-gray-500 mt-1">{{ $doc->category ?? 'Kategori' }} · {{ $doc->published_at ?? '2026' }}</p>
    </div>
    <x-download-button :file="$doc->file ?? '#'" />
</div>
