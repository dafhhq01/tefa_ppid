@props(['faq', 'index' => 0])

<details class="mb-3 rounded-lg border border-gray-200 bg-white p-5">
    <summary class="cursor-pointer text-sm font-semibold text-gray-900">
        {{ $faq['question'] }}
    </summary>
    <p class="mt-3 text-sm text-gray-600">{{ $faq['answer'] }}</p>
</details>