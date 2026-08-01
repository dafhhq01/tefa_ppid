@props([
    'email',
    'no_telp',
    'logo',
])

<footer class="bg-[#06081a] text-white pt-12 sm:pt-14 md:pt-16 relative overflow-hidden">
    <div class="max-w-7lg mx-auto px-6">

        {{-- Logo --}}
        <div class="flex flex-col items-center text-center pb-8 sm:pb-10 md:hidden">
            <img src="{{ $logo }}" class="w-20 sm:w-24 mb-3">

            <h2 class="text-base sm:text-lg font-bold mb-6">
                SMKN 1 KATAPANG
            </h2>

            <div class="flex gap-4">
                <a target="_blank" href="https://www.youtube.com/@smkn1katapang"
                class="w-12 h-12 rounded-full bg-gray-800 flex items-center justify-center hover:bg-red-600 transition">
                    <i class="fa-brands fa-youtube text-lg"></i>
                </a>

                <a target="_blank" href="https://www.instagram.com/smkn1katapang/?hl=en"
                class="w-12 h-12 rounded-full bg-gray-800 flex items-center justify-center hover:bg-pink-500 transition">
                    <i class="fa-brands fa-instagram text-lg"></i>
                </a>
            </div>
        </div>

        {{-- Kontak & Lokasi--}}
        <div class="grid grid-cols-2 gap-6 text-left md:grid-cols-3 md:gap-16 md:text-left">

            {{-- Logo --}}
            <div class="hidden md:flex md:flex-col md:items-center md:text-center">
                <img src="{{ $logo }}" class="w-25 mb-3">

                <h2 class="text-lg font-bold mb-8">
                    SMKN 1 KATAPANG
                </h2>

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
                <h2 class="text-sm sm:text-lg font-bold mb-4 sm:mb-6 md:mb-10">
                    Kontak Kami
                </h2>
                <div class="space-y-5 sm:space-y-6 md:space-y-8">

                    <div>
                        <h3 class="font-bold text-xs mb-2">
                            EMAIL:
                        </h3>

                        <p class="text-gray-300 text-xs break-words">
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

            {{-- Lokasi --}}
            <div>
                <h2 class="text-sm sm:text-lg font-bold mb-4 sm:mb-6 md:mb-10">
                    Lokasi Kami
                </h2>
                <div>

                    <h3 class="font-bold text-xs mb-2">
                        ALAMAT:
                    </h3>

                    <p class="text-gray-300 leading-5 md:leading-4 text-xs">
                        Ceuri Jalan Terusan Kopo No.KM 13, RW.5, Katapang, Kec. Katapang, Kabupaten Bandung, Jawa Barat 40971
                    </p>

                    <a href="https://maps.app.goo.gl/qaEqYPobSEv1eNYKA" target="_blank" class="inline-block mt-4 text-xs sm:text-sm text-blue-400 hover:text-blue-300 hover:underline">Lihat di Google Maps</a>
                </div>
            </div>

        </div>
    </div>

    {{-- Copyright --}}
    <div class="text-center px-6 py-8 sm:py-10 mt-10 sm:mt-12 md:mt-16 border-t border-gray-800 text-xs sm:text-sm text-gray-300">
        Copyright © 2026. SMKN 1 Katapang
    </div>

</footer>
