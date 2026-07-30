@props(['file', 'label' => 'download'])

<a href="{{$file}}" download
    class="inline-flex items-center gap-1 bg-blue-600 text-white text-sm px-4 py-2 rounded-lg hover:bg-blue-700 transition">
    {{$label}}
</a>
