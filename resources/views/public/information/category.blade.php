{{-- resources/views/public/information/category.blade.php --}}
@extends('layouts.public')

@section('title', $category['name'])

@section('content')
<section class="py-5">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('information.index') }}">Klasifikasi Informasi</a></li>
                <li class="breadcrumb-item active">{{ $category['name'] }}</li>
            </ol>
        </nav>

        <h1 class="mb-3">{{ $category['name'] }}</h1>
        <p class="text-muted mb-4">{{ $category['description'] }}</p>

        <x-public.information.search-filter :categories="$categories" :active="$category['slug']" />

        <div class="row g-4 mt-2">
            @forelse ($informations as $info)
                <div class="col-md-6 col-lg-4">
                    <x-public.information.information-card :information="$info" />
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center text-muted py-5">Belum ada informasi pada kategori ini.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection