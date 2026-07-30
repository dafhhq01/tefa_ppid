@props([
    'member',
])

<div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-xl">

    {{-- Foto --}}
    @if ($member['photo'])

        <img
            src="{{ asset($member['photo']) }}"
            alt="{{ $member['name'] }}"
            class="h-64 w-full object-cover"
        >

    @else

        <div class="flex h-64 items-center justify-center bg-blue-100">

            <i class="fa-solid fa-user text-7xl text-blue-600"></i>

        </div>

    @endif


    {{-- Informasi --}}
    <div class="p-7 text-center">

        <span class="inline-block rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-700">

            {{ $member['position'] }}

        </span>


        <h3 class="mt-5 text-xl font-semibold text-gray-900">

            {{ $member['name'] }}

        </h3>


        <p class="mt-3 leading-7 text-gray-600">

            {{ $member['description'] }}

        </p>

    </div>

</div>