@props(['category'])

<div class="flex h-full flex-col rounded-xl border border-gray-200 bg-white p-6 shadow-sm transition hover:shadow-md">
    <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
        <i class="fa-solid fa-folder-open text-xl"></i>
    </div>
    <h3 class="mb-2 text-lg font-semibold text-gray-900">{{ $category['name'] }}</h3>
    <p class="mb-4 flex-1 text-sm text-gray-600">{{ $category['description'] }}</p>
    <span class="mb-4 inline-block w-fit rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-700">
        {{ $category['count'] ?? 0 }} informasi
    </span>
    <a href="{{ route('information.category', $category['slug']) }}"
       class="mt-auto inline-flex items-center justify-center rounded-lg border border-blue-600 px-4 py-2 text-sm font-semibold text-blue-600 transition hover:bg-blue-600 hover:text-white">
        Lihat Informasi
    </a>
</div>