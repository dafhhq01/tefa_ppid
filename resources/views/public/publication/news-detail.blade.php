@extends('public.layout')

@section('content')
<section class="max-w-3xl mx-auto px-4 py-10">
    <a href="{{ route('news.index') }}" class="text-blue-600 text-sm hover:underline">&larr; Kembali ke Berita</a>

    <h1 class="text-2xl font-bold text-blue-900 mt-3">{{ $item->title ?? 'Judul Berita' }}</h1>
    <p class="text-sm text-gray-500 mt-1">{{ $item->published_at ?? '01 Jan 2026' }}</p>

    <img src="{{ $item->thumbnail ?? 'https://via.placeholder.com/800x400' }}"
        class="w-full rounded-lg my-5 object-cover">

    <div class="prose max-w-none text-gray-700">
        {!! $item->content ?? '<p>Isi berita belum tersedia.</p>' !!}
    </div>
</section>
@endsection
