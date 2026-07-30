@props(['file' => null, 'external_url' => null, 'button_label' => 'Download Dokumen'])

@if ($external_url)
    <a href="{{ $external_url }}" target="_blank" rel="noopener"
       class="inline-flex items-center gap-1.5 rounded-lg border border-gray-300 px-3 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-50">
        <i class="fa-solid fa-arrow-up-right-from-square"></i> Lihat Dokumen
    </a>
@elseif ($file)
    <a href="{{ asset('storage/' . $file) }}" target="_blank"
       class="inline-flex items-center gap-1.5 rounded-lg border border-gray-300 px-3 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-50">
        <i class="fa-solid fa-download"></i> {{ $button_label }}
    </a>
@endif