<x-public.layout>
<section class="mx-auto max-w-4xl px-4 py-24">
    <h1 class="mb-6 text-2xl font-bold text-gray-900">Regulasi PPID</h1>

    @foreach ($regulations as $type => $items)
        <h2 class="mb-3 mt-8 text-base font-semibold capitalize text-gray-900">
            {{ str_replace('_', ' ', $type) }}
        </h2>

        @forelse ($items as $reg)
            <div class="mb-2 flex items-center justify-between rounded-lg border border-gray-200 bg-white p-4">
                <span class="text-sm text-gray-800">{{ $reg['title'] }}</span>
                <x-public.information.document-button
                    :file="$reg['file'] ?? null"
                    :external_url="$reg['external_url'] ?? null"
                    button_label="Lihat Dokumen"
                />
            </div>
        @empty
            <p class="text-sm text-gray-500">Belum ada dokumen.</p>
        @endforelse
    @endforeach
</section>
</x-public.layout>