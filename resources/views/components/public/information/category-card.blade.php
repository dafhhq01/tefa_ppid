{{-- resources/views/public/information/components/category-card.blade.php --}}
@props(['category'])

<div class="card h-100 shadow-sm">
    <div class="card-body d-flex flex-column">
        <i class="bi bi-folder2-open fs-2 text-primary mb-3"></i>
        <h5 class="card-title">{{ $category['name'] }}</h5>
        <p class="card-text text-muted flex-grow-1">{{ $category['description'] }}</p>
        <span class="badge bg-light text-dark mb-3 align-self-start">{{ $category['count'] ?? 0 }} informasi</span>
        <a href="{{ route('information.category', $category['slug']) }}" class="btn btn-outline-primary mt-auto">
            Lihat Informasi
        </a>
    </div>
</div>