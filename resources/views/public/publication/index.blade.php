{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>publication</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <section class="bg-blue-700 text-white py-20">
        <div class="max-w-7xl mx-auto px-6">
            <h1 class="text-5xl font-bold">
                Publication & Document
            </h1>
            <p class="mt-4 text-lg text-blue-100">
                informasi berita, publikasi, laporan, dokumen dan pengadaan
            </p>
        </div>
    </section>
    <section class="max-w-7xl mx-auto px-6 py-12">
        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-bold">
                Berita Terbaru
            </h2>
            <a href="#"
            class="text-blue-600 hover:underline">
            Lihat Semua ->
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
            @include('public.publication.components.news-card')
            @include('public.publication.components.news-card')
            @include('public.publication.components.news-card')
        </div>

    </section>

</body>
</html> --}}


@extends('public.layout')

@section('content')
<section class="max-w-6xl mx-auto px-4 py-10">
    <h1 class="text-2xl font-bold text-blue-800 mb-8"> Publikasi</h1>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
        @foreach ([
            ['title' => 'Berita', 'desc' => 'Kabar terbaru sekolah', 'route' => 'news.index'],
            ['title' => 'Laporan', 'desc' => 'Publikasi laporan resmi', 'route' => 'publication.report'],
            ['title' => 'Download Center', 'desc' => 'Dokumen publik', 'route' => 'document.index'],
            ['title' => 'Pengadaan Barang & Jasa', 'desc' => 'Paket & Dokumen pengadaan', 'route' => 'procurement.index'],
        ] as $menu)
            <a href="{{route($menu['route'])}}"
            class="block bg-white border border-blue-100 rounded-xl p-5 shadow-sm hover:shadow-md hover:border-blue-300 transition">
            <h3 class="font-semibold text-blue-900">{{$menu['title']}}</h3>
            <p class="text-sm text-gray-500 mt-1">{{$menu['desc']}}</p>
            </a>
        @endforeach
    </div>
</section>
@endsection
