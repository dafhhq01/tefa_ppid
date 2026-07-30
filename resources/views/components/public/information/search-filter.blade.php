@props(['categories' => [], 'active' => null])

<form method="GET" class="mb-6 flex flex-col gap-3 md:flex-row md:items-center">
    <input type="text" name="search" value="{{ request('search') }}"
           placeholder="Cari informasi berdasarkan judul..."
           class="flex-1 rounded-lg border border-gray-300 px-4 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">

    <select name="kategori"
            onchange="window.location.href='{{ url('/informasi') }}/' + this.value"
            class="rounded-lg border border-gray-300 px-4 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
        @foreach ($categories as $cat)
            <option value="{{ $cat['slug'] }}" {{ $active === $cat['slug'] ? 'selected' : '' }}>
                {{ $cat['name'] }}
            </option>
        @endforeach
    </select>

    <button type="submit"
            class="rounded-lg bg-blue-600 px-5 py-2 text-sm font-semibold text-white hover:bg-blue-700">
        Cari
    </button>
</form>