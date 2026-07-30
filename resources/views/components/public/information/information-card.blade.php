@props(['information'])

<div class="flex h-full flex-col rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
    <span class="mb-2 inline-block w-fit rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-700">
        {{ ucwords(str_replace('-', ' ', $information['category'])) }}
    </span>
    <h3 class="mb-1 text-base font-semibold text-gray-900">{{ $information['title'] }}</h3>
    <p class="mb-2 text-xs text-gray-500">
        {{ \Carbon\Carbon::parse($information['created_at'])->translatedFormat('d F Y') }}
    </p>
    <p class="mb-4 flex-1 text-sm text-gray-600">{{ $information['excerpt'] ?? '' }}</p>

    <div class="mt-auto flex gap-2">
        <a href="{{ route('information.detail', $information['slug']) }}"
           class="rounded-lg border border-gray-300 px-3 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-50">
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