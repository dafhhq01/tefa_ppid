@props(['package'])

<div class="bg-white border border-blue-100 rounded-xl p-4 shadow-sm hover:shadow-md transition">
    <div class="flex items-center justify-between">
    <div>
    <h3 class="font-semibold text-blue-900">{{$package->title ?? 'Nama Paket'}}</h3>
    <p class="text-xs text-gray-500 mt-1">
        Tahun {{$package->year ?? '2026'}} · Tahap: {{$package->stage ?? '-'}}
    </p>
</div>
@if ($package->file ?? null)
    <x-download-button :file="$package->file" label="Dokumen"/>
@elseif ($package->external_url ?? null)
        <a href="{{$package->external_url}}" target="_blank"
            class="text-sm text-blue-600 hover:underline"> Lihat detail &rarr;</a>
@endif
        </div>
    </div>
