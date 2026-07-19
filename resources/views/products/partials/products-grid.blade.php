<style>
  .project_style1_item .project_thumb.scale-img {
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
    background: #0d0d0d !important;
    height: 420px !important;
    overflow: hidden !important;
    border-radius: 10px 10px 0 0 !important;
  }
  .project_style1_item .project_thumb.scale-img img {
    max-height: 100% !important;
    max-width: 100% !important;
    width: auto !important;
    height: auto !important;
    object-fit: contain !important;
    border-radius: 10px 10px 0 0 !important;
  }
  
  @media (max-width: 768px) {
    .project_style1_item .project_thumb.scale-img {
      height: 300px !important;
    }
  }
  @media (max-width: 576px) {
    .project_style1_item .project_thumb.scale-img {
      height: 240px !important;
    }
  }
</style>

@foreach($categories as $category)
    @if($category->products->count())
        <div class="mb-80">
            <h2 class="text-white mrb-55" style="font-size: 2.25rem; font-weight: bold; border-left: 4px solid #1193d4; padding-left: 15px;">{{ $category->name }}</h2>
            <div class="row">
                <!-- Left Column -->
                <div class="col-6 col-md-6 col-lg-6 col-xl-6">
                    @php $leftIndex = 0; @endphp
                    @foreach($category->products as $index => $product)
                        @if($index % 2 == 0)
                            <div class="project_style1_item" onclick="window.location='{{ route('products.show', $product->slug) }}'" style="cursor: pointer; margin-bottom: 50px; {{ $leftIndex > 0 ? 'margin-top: 50px;' : '' }}">
                                <div class="project_thumb scale-img">
                                    @if($product->cover_image)
                                        <img class="img-full" src="{{ asset('upload/' . $product->cover_image) }}" alt="{{ $product->name }}" />
                                    @elseif($product->images->first())
                                        <img class="img-full" src="{{ asset('upload/' . $product->images->first()->image) }}" alt="{{ $product->name }}" />
                                    @else
                                        <img class="img-full" src="https://via.placeholder.com/400x200?text=No+Image" alt="{{ $product->name }}" />
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
                <div class="col-6 col-md-6 col-lg-6 col-xl-6">
                    @foreach($category->products as $index => $product)
                        @if($index % 2 != 0)
                            <div class="project_style1_item" onclick="window.location='{{ route('products.show', $product->slug) }}'" style="cursor: pointer; margin-bottom: 50px; margin-top: 100px;">
                                <div class="project_thumb scale-img">
                                    @if($product->cover_image)
                                        <img class="img-full" src="{{ asset('upload/' . $product->cover_image) }}" alt="{{ $product->name }}" />
                                    @elseif($product->images->first())
                                        <img class="img-full" src="{{ asset('upload/' . $product->images->first()->image) }}" alt="{{ $product->name }}" />
                                    @else
                                        <img class="img-full" src="https://via.placeholder.com/400x200?text=No+Image" alt="{{ $product->name }}" />
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

