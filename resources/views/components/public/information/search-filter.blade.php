{{-- resources/views/public/information/components/search-filter.blade.php --}}
@props(['categories' => [], 'active' => null])

<form method="GET" class="row g-2 align-items-center">
    <div class="col-md-8">
        <input type="text" name="search" value="{{ request('search') }}"
               class="form-control" placeholder="Cari informasi berdasarkan judul...">
    </div>
    <div class="col-md-3">
        <select name="kategori" class="form-select" onchange="window.location.href='{{ url('/informasi') }}/' + this.value">
            @foreach ($categories as $cat)
                <option value="{{ $cat['slug'] }}" {{ $active === $cat['slug'] ? 'selected' : '' }}>
                    {{ $cat['name'] }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-1">
        <button type="submit" class="btn btn-primary w-100">Cari</button>
    </div>
</form>