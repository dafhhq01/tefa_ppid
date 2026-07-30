@extends('public.layout')

@section('content')
<section class="max-w-6xl mx-auto p-4 py-10">
    <h1 class="text-2xl font-bold text-blue-8 border-b-2 border-blue-600 inline-block pb-1 mb-6">
        Pengadaan Barang & Jasa
    </h1>

    <div class="space-y-4">
        @forelse($packages as $package)
            <x-procurement-item :package="$package" />
        @empty
            <p class="text-gray-500">Belum ada paket pengadaan.</p>
        @endforelse
    </div>

    <div class="mt-8">{{$package->links() ?? ''}}</div>
</section>
@endsection
