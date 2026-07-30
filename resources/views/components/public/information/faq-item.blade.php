{{-- resources/views/public/information/components/faq-item.blade.php --}}
@props(['faq', 'index' => 0])

<div class="accordion-item">
    <h2 class="accordion-header" id="heading-{{ $index }}">
        <button class="accordion-button collapsed" type="button"
                data-bs-toggle="collapse" data-bs-target="#collapse-{{ $index }}">
            {{ $faq['question'] }}
        </button>
    </h2>
    <div id="collapse-{{ $index }}" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
            {{ $faq['answer'] }}
        </div>
    </div>
</div>