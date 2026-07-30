<x-public.layout>

    {{-- Header --}}
    <x-public.profile.components.page-header
        title="Struktur Organisasi PPID"
        breadcrumb="Struktur Organisasi"
    />


    {{-- Organisasi --}}
    <section class="bg-gray-50 py-24">

        <div class="mx-auto max-w-7xl px-6">

            {{-- Judul --}}
            <div class="text-center">

                <p class="text-sm font-semibold uppercase tracking-[0.25em] text-blue-600">
                    PPID SMK Negeri 1 Katapang
                </p>

                <h2 class="mt-3 text-4xl font-bold text-gray-900">
                    Struktur Organisasi
                </h2>

                <div class="mx-auto mt-4 h-1 w-20 rounded bg-blue-600"></div>

                <p class="mx-auto mt-5 max-w-2xl text-gray-600">
                    Susunan pengelola dan petugas layanan informasi publik.
                </p>

            </div>


            {{-- Card --}}
            <div class="mt-16 grid gap-8 sm:grid-cols-2 lg:grid-cols-4">

                @foreach ($members as $member)

                    <x-public.profile.components.organization-card
                        :member="$member"
                    />

                @endforeach

            </div>

        </div>

    </section>

</x-public.layout>