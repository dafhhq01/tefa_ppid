<x-public.layout>

    {{-- Header --}}
    <x-public.profile.components.page-header
        :title="$page['title']"
        :breadcrumb="$page['title']"
        :background="$page['banner_image']"
    />


    {{-- Isi --}}
    <section class="bg-gray-50 py-24">

        <div class="mx-auto max-w-5xl px-6">

            <div class="rounded-2xl bg-white p-8 shadow-md md:p-12">

                <x-public.profile.components.content-section
                    :title="$page['title']"
                    :image="$page['banner_image']"
                    :content="$page['content']"
                    :file="$page['file']"
                />

            </div>

        </div>

    </section>

</x-public.layout>