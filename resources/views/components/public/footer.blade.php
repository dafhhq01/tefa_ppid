@props([
    'email',
    'no_telp',
    'logo',
])

<footer class="bg-[#06081a] text-white pt-16 relative overflow-hidden">
    <div class="max-w-7lg mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-16">

        {{-- Logo --}}
        <div class="flex flex-col items-center text-center">
            <img src="{{ $logo }}" class="w-25 mb-3">

            <h2 class="text-lg font-bold mb-8">
                SMKN 1 KATAPANG
            </h2>

            {{-- Social Media --}}
            <div class="flex gap-5">
                <a target="_blank" href="https://www.youtube.com/@smkn1katapang"
                class="w-14 h-14 rounded-full bg-gray-800 flex items-center justify-center hover:bg-red-600 transition">
                    <i class="fa-brands fa-youtube text-xl"></i>
                </a>

                <a target="_blank" href="https://www.instagram.com/smkn1katapang/?hl=en"
                class="w-14 h-14 rounded-full bg-gray-800 flex items-center justify-center hover:bg-pink-500 transition">
                    <i class="fa-brands fa-instagram text-xl"></i>
                </a>
            </div>
        </div>

        {{-- Kontak --}}
        <div>
            <h2 class="text-lg font-bold mb-10">
                Kontak Kami
            </h2>
            <div class="space-y-8">

                <div>
                    <h3 class="font-bold text-xs mb-2">
                        EMAIL:
                    </h3>

                    <p class="text-gray-300 text-xs">
                        {{ $email }}
                    </p>
                </div>

                <div>
                    <h3 class="font-bold text-xs mb-2">
                        NO TELEPON:
                    </h3>

                    <p class="text-gray-300 text-xs">
                        {{ $no_telp }}
                    </p>
                </div>
            </div>
        </div>

        {{-- lokasi --}}

            <div>
                <h2 class="text-lg font-bold mb-10">
                    Lokasi Kami
                </h2>
                <div>

                    <h3 class="font-bold text-xs mb-2">
                        ALAMAT:
                    </h3>

                    <p class="text-gray-300 leading-4 text-xs">
                        Ceuri Jalan Terusan Kopo No.KM 13, RW.5, Katapang, Kec. Katapang, Kabupaten Bandung, Jawa Barat 40971
                    </p>

                    <a href="https://maps.app.goo.gl/qaEqYPobSEv1eNYKA" target="_blank" class="inline-block mt-4 text-blue-400 hover:text-blue-300 hover:underline">Lihat di Google Maps</a>
                </div>
            </div>

    </div>

    {{-- Copyright --}}
    <div class="text-center py-10 mt-16 border-t border-gray-800 text-gray-300">
        Copyright © 2026. SMKN 1 Katapang
    </div>

</footer>
