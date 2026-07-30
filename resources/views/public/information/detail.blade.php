<x-public.layout>
<section class="py-5">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('information.index') }}">Klasifikasi Informasi</a></li>
                <li class="breadcrumb-item">
                    <a href="{{ route('information.category', $information['category']) }}">
                        {{ ucwords(str_replace('-', ' ', $information['category'])) }}
                    </a>
                </li>
                <li class="breadcrumb-item active">{{ $information['title'] }}</li>
            </ol>
        </nav>

        <article>
            <h1 class="mb-2">{{ $information['title'] }}</h1>
            <p class="text-muted mb-4">
                Dipublikasikan: {{ \Carbon\Carbon::parse($information['created_at'])->translatedFormat('d F Y') }}
            </p>

            <div class="content mb-4">
                {!! $information['content'] ?? $information['excerpt'] ?? '' !!}
            </div>

            @if(!empty($information['file']) || !empty($information['external_url']))
                <x-public.information.document-button
                    :file="$information['file'] ?? null"
                    :external_url="$information['external_url'] ?? null"
                    button_label="Download Dokumen"
                />
            @endif
        </article>
    </div>
</section>
</x-public.layout>