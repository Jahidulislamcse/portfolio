@extends('layouts.master')
@section('title', 'Gallery')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">
     <h2 class="text-3xl md:text-4xl font-extrabold text-amber-500 mb-12 text-center drop-shadow-lg">
       Gallery
    </h2>

    @if($galleries->count())
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
            @foreach($galleries as $gallery)
                <div class="bg-white rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                    <a data-fancybox="gallery" href="{{ asset('upload/' . $gallery->image) }}">
                        <img src="{{ asset('upload/' . $gallery->image) }}" alt="Gallery Image" class="w-full h-48 object-cover">
                    </a>
                    <div class="p-3">
                        <p class="text-gray-700 text-sm truncate">{{ $gallery->description ?? 'No Description' }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-gray-500 mt-6">No images available in the gallery.</p>
    @endif
</div>

<!-- Fancybox CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />

<!-- Fancybox JS -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>

<style>
/* Optional hover zoom for images */
a img {
    transition: transform 0.3s ease;
}
a:hover img {
    transform: scale(1.05);
}
</style>
@endsection
