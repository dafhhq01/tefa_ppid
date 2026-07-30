<x-public.layout>
<section class="mx-auto max-w-6xl px-4 py-24">
    <nav class="mb-4 text-sm text-gray-500">
        <a href="{{ route('information.index') }}" class="hover:text-blue-600">Klasifikasi Informasi</a>
        <span class="mx-2">/</span>
        <span class="text-gray-900">{{ $category['name'] }}</span>
    </nav>

    <h1 class="mb-2 text-2xl font-bold text-gray-900">{{ $category['name'] }}</h1>
    <p class="mb-6 text-sm text-gray-600">{{ $category['description'] }}</p>

    <x-public.information.search-filter :categories="$categories" :active="$category['slug']" />

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
        @forelse ($informations as $info)
            <x-public.information.information-card :information="$info" />
        @empty
            <div class="col-span-full py-16 text-center text-sm text-gray-500">
                Belum ada informasi pada kategori ini.
            </div>
        @endforelse
    </div>
</section>
</x-public.layout>