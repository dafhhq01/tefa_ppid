@extends('public.layout')

@section('content')
<section class="max-w-6xl mx-auto px-4 py-10">
    <h1 class="text-2xl font-bold text-blue-800 border-b-2 border-blue-600 inline-block pb-1 mb-6">Laporan</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @forelse($reports as $report)
            <x-document-card :doc="$report" />
        @empty
            <p class="text-gray-500">Belum ada laporan.</p>
        @endforelse
    </div>

    <div class="mt-8">{{ $reports->links() ?? '' }}</div>
</section>
@endsection
