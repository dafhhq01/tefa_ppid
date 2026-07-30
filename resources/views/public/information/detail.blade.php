<x-public.layout>
<section class="mx-auto max-w-3xl px-4 py-24">
    <nav class="mb-4 text-sm text-gray-500">
        <a href="{{ route('information.index') }}" class="hover:text-blue-600">Klasifikasi Informasi</a>
        <span class="mx-2">/</span>
        <a href="{{ route('information.category', $information['category']) }}" class="hover:text-blue-600">
            {{ ucwords(str_replace('-', ' ', $information['category'])) }}
        </a>
        <span class="mx-2">/</span>
        <span class="text-gray-900">{{ $information['title'] }}</span>
    </nav>

    <article>
        <h1 class="mb-2 text-2xl font-bold text-gray-900">{{ $information['title'] }}</h1>
        <p class="mb-6 text-sm text-gray-500">
            Dipublikasikan: {{ \Carbon\Carbon::parse($information['created_at'])->translatedFormat('d F Y') }}
        </p>

        <div class="prose prose-sm mb-6 max-w-none text-gray-700">
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
</section>
</x-public.layout>