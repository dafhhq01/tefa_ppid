@extends('public.layout')

@section('content')
<section class="max-w-6xl mx-auto px-4 py-10">
    <h1 class="text-2xl font-bold text-blue-800 border-b-2 border-blue-600 inline-block pb-1 mb-6">Berita</h1>
    <x-publication-filter :route="route('news.index')" :categories="['Akademik', 'Kegiatan', 'Pengumuman']"/>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
        @forelse ($news as $item)
        <x-news-card :item="$item"/>
        @empty
        <p class="text-gray-500 col-span-3">Belum Ada Berita. </p>
        @endforelse
    </div>

    <div class="mt-8"> {{$news->links()?? ''}}</div>
</section>
        @endforelse
