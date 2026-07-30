{{-- resources/views/public/information/regulation.blade.php --}}
@extends('layouts.public')

@section('title', 'Regulasi PPID')

@section('content')
<section class="py-5">
    <div class="container">
        <h1 class="mb-4">Regulasi PPID</h1>

        @foreach ($regulations as $type => $items)
            <h4 class="mt-4 mb-3 text-capitalize">{{ str_replace('_', ' ', $type) }}</h4>

            @forelse ($items as $reg)
                <div class="d-flex justify-content-between align-items-center border rounded p-3 mb-2">
                    <span>{{ $reg['title'] }}</span>
                    <x-public.information.document-button
                        :file="$reg['file'] ?? null"
                        :external_url="$reg['external_url'] ?? null"
                        button_label="Lihat Dokumen"
                    />
                </div>
            @empty
                <p class="text-muted">Belum ada dokumen.</p>
            @endforelse
        @endforeach
    </div>
</section>
@endsection