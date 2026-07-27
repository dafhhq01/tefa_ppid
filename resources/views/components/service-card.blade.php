@props(['title', 'description', 'url' , 'icon' => 'bi-file-text'])

<div class="col-md-4 mb-4">
    <div class="card h-100 shadow-sm">
        <div class="card-body text-center">
            <i class="bi {{ $icon }} mb-3" style="font-size: 2rem;"></i>
            <h5 class="card-title">{{ $title }}</h5>
            <p class="card-text">{{ $description }}</p>
            <a href="{{ $url }}" class="btn btn-primary">Learn More</a>
        </div>
    </div>
</div>