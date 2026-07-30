<x-public.layout>
<section class="py-5">
    <div class="container">
        <h1 class="mb-2">Klasifikasi Informasi</h1>
        <p class="text-muted mb-4">
            Informasi publik dikelompokkan sesuai Undang-Undang No. 14 Tahun 2008
            tentang Keterbukaan Informasi Publik.
        </p>

        <div class="row g-4">
            @foreach ($categories as $category)
                <div class="col-md-6 col-lg-3">
                    <x-public.information.category-card :category="$category" />
                </div>
            @endforeach
        </div>
    </div>
</section>
</x-public.layout>