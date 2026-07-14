@foreach($categories as $category)
    @if($category->products->count())
        <div class="mb-12 px-2">
            <h2 class="text-2xl font-bold text-blu mb-6">{{ $category->name }}</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($category->products as $product)
                    <div class="flex flex-col bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:scale-105 hover:shadow-xl group relative">
                        <div class="relative flex-shrink-0">
                            @if($product->cover_image)
                                <img alt="{{ $product->name }}" class="h-48 w-full object-cover" src="{{ asset('upload/' . $product->cover_image) }}">
                            @elseif($product->images->first())
                                <img alt="{{ $product->name }}" class="h-48 w-full object-cover" src="{{ asset('upload/' . $product->images->first()->image) }}">
                            @else
                                <img alt="{{ $product->name }}" class="h-48 w-full object-cover" src="https://via.placeholder.com/400x200?text=No+Image">
                            @endif
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/25">
                                <a href="{{ route('products.show', $product->slug) }}" class="px-6 py-2 border border-white text-white font-medium rounded-md transition-transform duration-200 transform hover:scale-105">
                                    View Detail
                                </a>
                            </div>
                        </div>
                        <div class="flex-1 p-4 flex flex-col justify-between">
                            <h3 class="mt-2 text-xl font-semibold text-gray-900">{{ Str::limit($product->name, 40) }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endforeach

