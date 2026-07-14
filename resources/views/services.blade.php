 @extends('layouts.master')

 @section('title', 'Contact')

 @section('content')


<section id="services" class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Our Services</h2>
            <p class="text-lg text-gray-600 mt-2">Pioneering advancements from discovery to delivery.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($services as $service)
                <div class="group bg-white p-8 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 text-center">
                    <div class="flex items-center justify-center h-16 w-16 rounded-full bg-[var(--primary-color)] text-white mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        @if($service->image)
                            <img src="{{ asset('upload/'.$service->image) }}" alt="{{ $service->heading }}" class="h-12 w-12 object-contain mx-auto">
                        @else
                            <span class="material-symbols-outlined text-3xl">science</span>
                        @endif
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $service->heading }}</h3>
                    <p class="text-gray-600">{{ $service->desc }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

 @endsection