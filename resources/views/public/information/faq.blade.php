<x-public.layout>
<section class="py-5">
    <div class="container">
        <h1 class="mb-4">Pertanyaan Umum (FAQ)</h1>

        <div class="accordion" id="faqAccordion">
            @foreach ($faqs as $index => $faq)
                <x-public.information.faq-item :faq="$faq" :index="$index" />
            @endforeach
        </div>
    </div>
</section>
</x-public.layout>