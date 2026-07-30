@extends('public.layout')

@section('content')
<section class="max-w-6xl mx-auto px-4 py-10">
    <h1 class="text-2xl font-bold text-blue-800 border-b-2 border-blue-600 inline-block pb-1 mb-6">Download Center</h1>

    <x-publication-filter :route="route('document.index')" :categories="['Umum', 'Formulir', 'Kebijakan']" />

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
        @forelse($documents as $doc)
            <x-document-card :doc="$doc" />
        @empty
            <p class="text-gray-500">Belum ada dokumen.</p>
        @endforelse
    </div>

    <div class="mt-8">{{ $documents->links() ?? '' }}</div>
</section>
@endsection
