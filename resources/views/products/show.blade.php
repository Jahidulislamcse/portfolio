@extends('layouts.master')

@section('title', $product->name . ' | ' . ($settings->company ?? 'Jahidul Islam'))

@section('content')

<!-- Page Title Start -->
<section class="page-title-section">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="breadcrumb-area">
          <h2 class="page-title">{{ $product->name }}</h2>
          <ul class="breadcrumbs-link">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('products.user') }}">Projects</a></li>
            <li class="active">Details</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Page Title End -->

<!-- Project Details Section Start -->
<section class="project-details-page bg-black pdt-110 pdb-80">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="project-thumb mrb-40" style="position: relative; overflow: hidden; border-radius: 16px; border: 1px solid rgba(255,255,255,0.05);">
          <img id="mainImage" class="img-full border-radius-10px" src="{{ asset('upload/' . ($product->cover_image ?? ($product->images->first()->image ?? ''))) }}" alt="{{ $product->name }}" style="max-height: 550px; width: 100%; object-fit: cover; transition: transform 0.3s ease;" />
        </div>
        
        @if ($product->images->count())
          <div class="flex flex-wrap gap-3 mrb-40" style="display: flex; gap: 12px; margin-bottom: 40px; flex-wrap: wrap;">
            @foreach ($product->images as $img)
              <img src="{{ asset('upload/' . $img->image) }}" class="thumbnail" data-full="{{ asset('upload/' . $img->image) }}" style="width: 90px; height: 90px; object-fit: cover; border-radius: 8px; cursor: pointer; border: 2px solid rgba(255,255,255,0.05); transition: border-color 0.3s ease;">
            @endforeach
          </div>
        @endif
      </div>
    </div>
    
    <div class="row mrb-45">
      <div class="col-xl-8 col-lg-8 col-md-12">
        <div class="project-detail-text mrb-30">
          <h3 class="text-white mrb-20" style="font-size: 2rem;">About Project</h3>
          <div class="text-white-50" style="font-size: 1.05rem; line-height: 1.8; opacity: 0.8;">
            {!! $product->description !!}
          </div>
        </div>
      </div>
      
      <div class="col-xl-4 col-lg-4 col-md-12">
        <div class="project-info" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.05); padding: 35px 30px; border-radius: 16px;">
          <div class="project-info-title mrb-25">
            <h5 class="title text-white" style="font-size: 1.3rem; font-weight: bold; border-left: 3px solid #1193d4; padding-left: 12px;">Project Information</h5>
          </div>
          <div class="project-info-body">
            <div class="project-info-list d-flex align-items-center mrb-20" style="display: flex; align-items: center; margin-bottom: 20px;">
              <div class="project-info-icon" style="color: #1193d4; font-size: 1.8rem; line-height: 1; width: 40px;">
                <i class="webexbase-icon-categories1"></i>
              </div>
              <div class="info-details mrl-15" style="margin-left: 15px;">
                <span class="text-white-50 small d-block" style="font-size: 0.85rem; opacity: 0.6; display: block;">Category:</span>
                <h5 class="name text-white m-0" style="font-size: 1.05rem; font-weight: 600; margin: 0;">{{ $product->category->name ?? 'Uncategorized' }}</h5>
              </div>
            </div>
            
            <div class="portivio-btn-block mrt-30" style="margin-top: 30px;">
              <a href="https://wa.me/8801612152443?text=Hi%20Jahidul,%20I'm%20interested%20in%20your%20project:%20{{ urlencode($product->name) }}" target="_blank" class="cs-btn-one btn-circle" style="background: #1193d4; color: white; display: block; text-align: center; width: 100%; border-radius: 30px; padding: 12px 25px; font-weight: bold; transition: background 0.3s ease; text-decoration: none;">Discuss This Project</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Project Details Section End -->

@endsection

@section('styles')
<style>
  .thumbnail:hover, .thumbnail.active {
    border-color: #1193d4 !important;
  }
  .cs-btn-one:hover {
    background: #0d7cb3 !important;
    color: white !important;
  }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const mainImage = document.getElementById('mainImage');
        const thumbnails = document.querySelectorAll('.thumbnail');

        if(thumbnails.length > 0) {
            thumbnails[0].classList.add('active');
        }

        thumbnails.forEach(th => {
            th.addEventListener('click', () => {
                thumbnails.forEach(t => t.classList.remove('active'));
                th.classList.add('active');
                mainImage.src = th.dataset.full;
            });
        });
    });
</script>
@endsection
