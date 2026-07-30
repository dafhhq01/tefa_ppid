@props(['file' => null, 'external_url' => null, 'button_label' => 'Download Dokumen'])

@if ($external_url)
    <a href="{{ $external_url }}" target="_blank" rel="noopener" class="btn btn-sm btn-outline-secondary">
        <i class="bi bi-box-arrow-up-right me-1"></i> Lihat Dokumen
    </a>
@elseif ($file)
    <a href="{{ asset('storage/' . $file) }}" target="_blank" class="btn btn-sm btn-outline-secondary">
        <i class="bi bi-download me-1"></i> {{ $button_label }}
    </a>
@endif