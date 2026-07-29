<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Informasi Publik</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
    body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">
    <div class="max-w-6xl mx-auto px-4 py-12">
        <!-- Header Judul -->
        <div class="text-center max-w-2xl mx-auto mb-10">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-3">Daftar Informasi Publik</h1>
            <p class="text-gray-600 text-lg py-3">
                Akses berbagai dokumen, data, dan informasi publik secara transparan melalui daftar di bawah ini.
            </p>
        </div>

        <!-- Search and Filter Form -->
        <div class="max-w-3xl mx-auto mb-8 bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <form method="GET" action="{{ route('public.service.information-list') }}" class="flex flex-col md:flex-row gap-3">
                
                <!-- Search Input -->
                <div class="flex-1">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari informasi..."
                    class="w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all">
                </div>

                <!-- Filter Kategori -->
                <div class="w-full md:w-52">
                    <select name="kategori" 
                        class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm bg-white">
                        <option value="">Semua Kategori</option>
                        @if(isset($kategoriList) && is_array($kategoriList))
                            @foreach($kategoriList as $kategori)
                                <option value="{{ $kategori }}" {{ request('kategori') == $kategori ? 'selected' : '' }}>{{ $kategori }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <!-- Tombol Cari -->
                <div>
                    <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-xl shadow-sm hover:shadow transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search-icon lucide-search"><path d="m21 21-4.34-4.34"/><circle cx="11" cy="11" r="8"/></svg>
                    </button>
                </div>
            </form>
        </div>

        <!-- Tabel List Informasi Publik -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-900 text-white text-xs uppercase tracking-wider">
                            <th scope="col" class="py-3.5 px-6 font-semibold">No</th>
                            <th scope="col" class="py-3.5 px-6 font-semibold">Judul Informasi</th>
                            <th scope="col" class="py-3.5 px-6 font-semibold">Kategori</th>
                            <th scope="col" class="py-3.5 px-6 font-semibold">Tanggal</th>
                            <th scope="col" class="py-3.5 px-6 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-sm">
                        @forelse($informationList as $index => $info)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-4 px-6 font-medium text-gray-500">{{ $index + 1 }}</td>
                                <td class="py-4 px-6 font-medium text-gray-900">{{ $info->judul }}</td>
                                <td class="py-4 px-6">
                                    <span class="inline-block px-2.5 py-1 text-xs font-semibold bg-blue-50 text-blue-700 rounded-full">
                                        {{ $info->kategori }}
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <a href="{{ route('public.service.information-detail', ['id' => $info->id]) }}" 
                                        class="inline-block items-center px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium rounded-lg transition-colors">
                                        Lihat Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-8 text-center text-gray-500">
                                    Tidak ada informasi publik yang ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if(method_exists($informationList, 'links'))
                <div class="p-4 border-t border-gray-200 bg-gray-50 flex justify-center">
                    {{ $informationList->appends(request()->query())->links() }}
                </div>
            @endif
        </div>
    </div>
</body>
</html>