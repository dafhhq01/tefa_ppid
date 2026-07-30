{{-- resources/views/public/information/components/information-card.blade.php --}}
@props(['information'])

<div class="card h-100">
    <div class="card-body d-flex flex-column">
        <span class="badge bg-secondary mb-2 align-self-start">
            {{ ucwords(str_replace('-', ' ', $information['category'])) }}
        </span>
        <h5 class="card-title">{{ $information['title'] }}</h5>
        <p class="text-muted small mb-2">
            {{ \Carbon\Carbon::parse($information['created_at'])->translatedFormat('d F Y') }}
        </p>
        <p class="card-text flex-grow-1">{{ $information['excerpt'] ?? '' }}</p>

        <div class="d-flex gap-2 mt-auto">
            <a href="{{ route('information.detail', $information['slug']) }}" class="btn btn-sm btn-outline-primary">
                Detail
            </a>
            @if(!empty($information['file']))
                <x-public.information.document-button
                    :file="$information['file']"
                    button_label="Download"
                />
            @endif
        </div>
    </div>
</div>