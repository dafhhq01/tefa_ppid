@props(['route', 'categories' => []])

<form action="{{ $route }}" method="GET" class="flex flex-wrap gap-3">
    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari..."
        class="flex-1 min-w-[200px] border border-blue-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">

    <select name="category" class="border border-blue-200 rounded-lg px-3">
        <option value="">Semua Kategori</option>
        @foreach($categories as $cat)
            <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
        @endforeach
    </select>

    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Cari</button>
</form>
