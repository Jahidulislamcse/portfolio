@extends('layouts.master')

@section('title', 'Managing Body')

@section('content')

<section class="py-20 bg-gradient-to-b from-gray-50 to-gray-100">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl md:text-4xl font-extrabold text-amber-500 mb-12 text-center drop-shadow-lg">
            Director's Say
        </h2>

        @foreach($bodies as $index => $body)
        <div class="flex flex-col md:flex-row items-start mb-12 md:mb-16 relative overflow-hidden">
            
            <div class="hidden md:block absolute w-96 h-96 bg-amber-100 rounded-full -z-10 {{ $index % 2 == 0 ? '-left-24' : '-right-24' }} top-1/2 transform -translate-y-1/2 opacity-30"></div>

            <div class="mt-5 w-full md:w-1/2 flex justify-center mb-4 md:mb-0 transition-transform duration-700 ease-in-out hover:scale-105 animate-fade-left {{ $index % 2 != 0 ? 'md:order-2' : '' }}">
                @if($body->image)
                    <img src="{{ asset('upload/'.$body->image) }}" alt="{{ $body->director }}" class="rounded-3xl shadow-xl w-96 h-96 object-cover border-4 border-amber-200">
                @else
                    <div class="w-96 h-96 bg-gray-200 flex items-center justify-center rounded-3xl shadow-xl border-4 border-gray-300">
                        <span class="text-gray-500">No Image</span>
                    </div>
                @endif
            </div>

            <!-- Text Content -->
            <div class="w-full md:w-1/2 md:px-8 mt-2 md:mt-0 text-center md:text-left animate-fade-right">
                <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">{{ $body->director }}</h3>
                
                @if($body->speech)
                <p class="text-gray-700 leading-relaxed text-justify">{!! nl2br(e($body->speech)) !!}</p>
                @endif
            </div>

        </div>
        @endforeach

    </div>
</section>

<!-- Team Structure Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl md:text-4xl font-extrabold text-amber-500 mb-12 text-center drop-shadow-lg">
            Team Structure
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            <!-- Design Section -->
            <div class="bg-gray-50 p-6 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300">
                <h3 class="text-xl font-bold text-gray-900 mb-3">Design Section</h3>
                <p class="text-gray-700 leading-relaxed text-sm text-justify">
                    Our Design Section transforms ideas into reality. With a team of creative professionals and advanced design tools, we craft innovative and trend-setting concepts that meet client expectations and market demands. Every design is carefully refined to ensure functionality, aesthetics, and practicality.
                </p>
            </div>

            <!-- Production Section -->
            <div class="bg-gray-50 p-6 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300">
                <h3 class="text-xl font-bold text-gray-900 mb-3">Production Section</h3>
                <p class="text-gray-700 leading-relaxed text-sm text-justify">
                    The Production Section is the backbone of our operations. Equipped with state-of-the-art machinery and skilled technicians, we efficiently turn designs into high-quality garments and accessories. Our streamlined processes ensure consistency, precision, and timely output for every order.
                </p>
            </div>

            <!-- QC Section -->
            <div class="bg-gray-50 p-6 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300">
                <h3 class="text-xl font-bold text-gray-900 mb-3">QC Section</h3>
                <p class="text-gray-700 leading-relaxed text-sm text-justify">
                    Quality is at the heart of our business. Our Quality Control Section rigorously inspects every product at multiple stages of production. From material checks to finished goods, we ensure that every item meets strict quality standards, maintaining the trust of our clients worldwide.
                </p>
            </div>

            <!-- Delivery Section -->
            <div class="bg-gray-50 p-6 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300">
                <h3 class="text-xl font-bold text-gray-900 mb-3">Delivery Section</h3>
                <p class="text-gray-700 leading-relaxed text-sm text-justify">
                    Our Delivery Section ensures that products reach clients safely and on time. Coordinating logistics with precision, we manage packaging, shipping, and tracking to guarantee smooth and reliable delivery. Timeliness and customer satisfaction are our top priorities in every shipment.
                </p>
            </div>
        </div>
    </div>
</section>



<!-- Animations -->
<style>
@keyframes fadeInLeft {
    0% { opacity: 0; transform: translateX(-50px);}
    100% { opacity: 1; transform: translateX(0);}
}
@keyframes fadeInRight {
    0% { opacity: 0; transform: translateX(50px);}
    100% { opacity: 1; transform: translateX(0);}
}
.animate-fade-left { animation: fadeInLeft 1s ease forwards; }
.animate-fade-right { animation: fadeInRight 1s ease forwards; }
</style>

@endsection
