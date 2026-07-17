@foreach($categories as $category)
    @if($category->products->count())
        <div class="mb-80">
            <h2 class="text-white mrb-55" style="font-size: 2.25rem; font-weight: bold; border-left: 4px solid #1193d4; padding-left: 15px;">{{ $category->name }}</h2>
            <div class="row">
                <!-- Left Column -->
                <div class="col-md-6 col-lg-6 col-xl-6">
                    @php $leftIndex = 0; @endphp
                    @foreach($category->products as $index => $product)
                        @if($index % 2 == 0)
                            <div class="project_style1_item" style="margin-bottom: 50px; {{ $leftIndex > 0 ? 'margin-top: 50px;' : '' }}">
                                <div class="project_thumb scale-img">
                                    @if($product->cover_image)
                                        <img class="img-full" src="{{ asset('upload/' . $product->cover_image) }}" alt="{{ $product->name }}" style="height: 420px; width: 100%; object-fit: cover;" />
                                    @elseif($product->images->first())
                                        <img class="img-full" src="{{ asset('upload/' . $product->images->first()->image) }}" alt="{{ $product->name }}" style="height: 420px; width: 100%; object-fit: cover;" />
                                    @else
                                        <img class="img-full" src="https://via.placeholder.com/400x200?text=No+Image" alt="{{ $product->name }}" style="height: 420px; width: 100%; object-fit: cover;" />
                                    @endif
                                </div>
                                <div class="project_content">
                                    <div class="project_title_area">
                                        <div class="project_category">
                                            <ul>
                                                <li><a href="javascript:void(0);">{{ $category->name }}</a></li>
                                            </ul>
                                        </div>
                                        <h4 class="title"><a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a></h4>
                                    </div>
                                    <a class="project_link" href="{{ route('products.show', $product->slug) }}"><i class="webexbase-icon-up-right-arrow-1"></i></a>
                                </div>
                            </div>
                            @php $leftIndex++; @endphp
                        @endif
                    @endforeach
                </div>
                <!-- Right Column -->
                <div class="col-md-6 col-lg-6 col-xl-6">
                    @foreach($category->products as $index => $product)
                        @if($index % 2 != 0)
                            <div class="project_style1_item" style="margin-bottom: 50px; margin-top: 100px;">
                                <div class="project_thumb scale-img">
                                    @if($product->cover_image)
                                        <img class="img-full" src="{{ asset('upload/' . $product->cover_image) }}" alt="{{ $product->name }}" style="height: 420px; width: 100%; object-fit: cover;" />
                                    @elseif($product->images->first())
                                        <img class="img-full" src="{{ asset('upload/' . $product->images->first()->image) }}" alt="{{ $product->name }}" style="height: 420px; width: 100%; object-fit: cover;" />
                                    @else
                                        <img class="img-full" src="https://via.placeholder.com/400x200?text=No+Image" alt="{{ $product->name }}" style="height: 420px; width: 100%; object-fit: cover;" />
                                    @endif
                                </div>
                                <div class="project_content">
                                    <div class="project_title_area">
                                        <div class="project_category">
                                            <ul>
                                                <li><a href="javascript:void(0);">{{ $category->name }}</a></li>
                                            </ul>
                                        </div>
                                        <h4 class="title"><a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a></h4>
                                    </div>
                                    <a class="project_link" href="{{ route('products.show', $product->slug) }}"><i class="webexbase-icon-up-right-arrow-1"></i></a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endforeach
