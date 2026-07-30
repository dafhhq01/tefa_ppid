<x-public.layout>
<section class="mx-auto max-w-6xl px-4 py-24">
    <h1 class="mb-2 text-2xl font-bold text-gray-900">Klasifikasi Informasi</h1>
    <p class="mb-8 text-sm text-gray-600">
        Informasi publik dikelompokkan sesuai Undang-Undang No. 14 Tahun 2008
        tentang Keterbukaan Informasi Publik.
    </p>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
        @foreach ($categories as $category)
            <x-public.information.category-card :category="$category" />
        @endforeach
    </div>
</section>
</x-public.layout>