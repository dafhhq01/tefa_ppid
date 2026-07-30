<x-public.layout>
<section class="mx-auto max-w-3xl px-4 py-24">
    <h1 class="mb-6 text-2xl font-bold text-gray-900">Pertanyaan Umum (FAQ)</h1>

    <div>
        @foreach ($faqs as $index => $faq)
            <x-public.information.faq-item :faq="$faq" :index="$index" />
        @endforeach
    </div>
</section>
</x-public.layout>