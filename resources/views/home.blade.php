@extends('layouts.master')

@section('title', ($settings->company ?? 'Jahidul Islam'))

@section('content')

<!-- Home Banner Start -->
<section class="home_banner_01 pdt-200 pdb-lg-120 pdb-sm-0 bg-no-repeat bg-pos-cc" data-background="{{ asset('images/bg/home1-bg1.png') }}">
  <div class="container">
    <div class="banner-item">
      <div class="row align-items-center">
        <div class="col-xl-12 anim-heading animation-style1">
          <h1 class="h1-banner-title text-white f-weight-400 mrb-sm-20 wow fadeInLeft">
            <span class="h1-banner-emoji mrr-20"><img src="{{ asset('images/objects/h1-banner-art1.png') }}" alt="emoji" /></span>I’m {{ 'Jahidul Islam' }}
          </h1>
        </div>
        <div class="col-xl-12 anim-heading animation-style1">
          <h1 class="h1-banner-title text-white f-weight-400 mrb-xxl-30 anim-title">{{ $settings->home_heading ?? 'Web and API Developer' }}</h1>
        </div>
        <div class="col-xl-7">
          <div class="banner-info">
            <p class="h1-banner-text">
              {{ $settings->home_desc ?? 'I build modern, responsive, and user-focused websites, web applications, and APIs that bring concepts to life.' }}
            </p>
            <div class="portivio-btn-block-2">
              <a class="portivio-btn-2 portivio-btn-2-circle" href="https://wa.me/8801612152443" target="_blank"><i class="webexbase-icon-v-align-bottom"></i></a>
              <a class="portivio-btn-2 portivio-btn-2-primary" href="https://wa.me/8801612152443" target="_blank">GET IN TOUCH</a>
              <a class="portivio-btn-2 portivio-btn-2-circle" href="https://wa.me/8801612152443" target="_blank"><i class="webexbase-icon-v-align-bottom"></i></a>
            </div>

            @if(isset($settings->skills) && $settings->skills->count() > 0)
              <div class="skills-bubbles-container">
                @foreach($settings->skills as $skill)
                  <div class="skill-bubble" title="Technology Skill" style="animation-delay: {{ 0.1 * $loop->index }}s;">
                    <img src="{{ asset('upload/' . $skill->image) }}" alt="Skill Logo" />
                  </div>
                @endforeach
              </div>
            @endif
          </div>
        </div>
        <div class="col-xl-5">
          <div class="banner-thumb">
            @if($settings && $settings->logo)
              <img class="banner-profile-img" src="{{ asset('upload/' . $settings->logo) }}" alt="Logo" />
            @else
              <img class="banner-profile-img" src="{{ asset('images/bg/h1-Man.png') }}" alt="Thumb" />
            @endif
            <div class="story-box wow fadeInUp">
              <div class="quote-icon"><i class="webexbase-icon-group-88301"></i></div>
              <div class="story-description">
                <h4 class="title">"Stories live in every line of code"</h4>
              </div>
            </div>
            <div class="h1-obj1 wow fadeInRight"><img src="{{ asset('images/objects/h1-banner-art2.png') }}" alt="art" /></div>
            <div class="h1-obj2 wow zoomIn" style="display: flex; flex-direction: column; align-items: center; justify-content: center; background: #c5ff00; color: black; border-radius: 50%; width: 105px; height: 105px; text-align: center; border: 2px solid #000; padding: 5px; z-index: 10; box-shadow: 0 4px 15px rgba(0,0,0,0.3); font-family: 'Poppins', sans-serif;">
                <span style="font-size: 8px; font-weight: bold; text-transform: uppercase; line-height: 1.2; letter-spacing: 0.05em; color: #000;">Years of<br>Experience</span>
                <span style="font-size: 26px; font-weight: 900; line-height: 1.1; color: #000; margin-top: 2px;">4+</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="h1-banner-social-list">
    <span class="title">Follow Me —</span>
    <ul>
      @if($settings->facebook)
        <li><a href="{{ $settings->facebook }}" target="_blank">Fb.</a></li>
      @endif
      @if($settings->linkedin)
        <li><a href="{{ $settings->linkedin }}" target="_blank">Ln.</a></li>
      @endif
    </ul>
  </div>
</section>
<!-- Home Banner End -->

<!-- Marquee Section Start -->
<div class="marquee-wrapper marquee-one">
  <div class="marquee-one__inner">
    <div class="swiper marquee-slider">
      <div class="swiper-wrapper slide-transtion">
        @if ($services && $services->count())
          @for ($i = 0; $i < 3; $i++)
            @foreach ($services as $service)
              <div class="swiper-slide">
                <div class="marquee-one__single-item">
                  <img src="{{ asset('images/marquee-shape-01.png') }}" alt="" />
                  <span class="title">{{ $service->heading }}</span>
                </div>
              </div>
            @endforeach
          @endfor
        @else
          @for ($i = 0; $i < 3; $i++)
            <div class="swiper-slide">
              <div class="marquee-one__single-item">
                <img src="{{ asset('images/marquee-shape-01.png') }}" alt="" />
                <span class="title">Digital Agency</span>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="marquee-one__single-item">
                <img src="{{ asset('images/marquee-shape-01.png') }}" alt="" />
                <span class="title">Digital Excellence</span>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="marquee-one__single-item">
                <img src="{{ asset('images/marquee-shape-01.png') }}" alt="" />
                <span class="title">Smart & Efficient</span>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="marquee-one__single-item">
                <img src="{{ asset('images/marquee-shape-01.png') }}" alt="" />
                <span class="title">Powerful Performance</span>
              </div>
            </div>
          @endfor
        @endif
      </div>
    </div>
  </div>
  <div class="marquee-one__inner style-2">
    <div class="swiper marquee-slider" dir="rtl">
      <div class="swiper-wrapper slide-transtion">
        @if ($services && $services->count())
          @for ($i = 0; $i < 3; $i++)
            @foreach ($services as $service)
              <div class="swiper-slide">
                <div class="marquee-one__single-item style-1">
                  <img src="{{ asset('images/marquee-shape-02.png') }}" alt="" />
                  <span class="title">{{ $service->heading }}</span>
                </div>
              </div>
            @endforeach
          @endfor
        @else
          @for ($i = 0; $i < 3; $i++)
            <div class="swiper-slide">
              <div class="marquee-one__single-item style-1">
                <img src="{{ asset('images/marquee-shape-02.png') }}" alt="" />
                <span class="title">Digital Agency</span>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="marquee-one__single-item style-1">
                <img src="{{ asset('images/marquee-shape-02.png') }}" alt="" />
                <span class="title">Digital Excellence</span>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="marquee-one__single-item style-1">
                <img src="{{ asset('images/marquee-shape-02.png') }}" alt="" />
                <span class="title">Smart & Efficient</span>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="marquee-one__single-item style-1">
                <img src="{{ asset('images/marquee-shape-02.png') }}" alt="" />
                <span class="title">Powerful Performance</span>
              </div>
            </div>
          @endfor
        @endif
      </div>
    </div>
  </div>
</div>
<!-- Marquee Section End -->

<!-- About & Mission Section Start -->
<section class="pdt-120 pdb-40 bg-black about-mission-section">
  <div class="container">
    <div class="row">
      <div class="col-xl-6 col-lg-6 mrb-lg-50 wow fadeInLeft about-col-left">
        <div class="title-box mrb-30">
          <h5 class="sub-title">( About Me )</h5>
          <h2 class="title text-white">Who I Am</h2>
        </div>
        <div class="text-white text-lg leading-relaxed about-mission-text" style="opacity: 0.8; text-align: justify;">
          @if (!empty($settings->about_desc))
            {!! $settings->about_desc !!}
          @endif
        </div>
      </div>
      <div class="col-xl-6 col-lg-6 wow fadeInRight about-col-right">
        <div class="title-box mrb-30">
          <h5 class="sub-title">( Mission & Vision )</h5>
          <h2 class="title text-white">My Mission</h2>
        </div>
        <div class="text-white text-lg leading-relaxed about-mission-text" style="opacity: 0.8; text-align: justify;">
          @if (!empty($settings->mission_vision))
            {!! $settings->mission_vision !!}
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
<!-- About & Mission Section End -->

<!-- Service Section Start -->
<section class="pdb-40 pdt-40 bg-black pos-rel" style="border-top: 1px solid rgba(255,255,255,0.05);">
  <div class="section-title mrb-55 mrb-lg-60">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 mrb-md-30">
          <div class="title-box anim-heading animation-style1">
            <h5 class="sub-title">( OUR SERVICES )</h5>
            <h2 class="title wt-split-text anim-title text-white">Where Code Meets Design</h2>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 d-flex justify-content-start justify-content-lg-end align-items-center">
          <div class="portivio-btn-block">
            <a class="portivio-btn portivio-btn-circle" href="https://wa.me/8801612152443" target="_blank"><i class="webexbase-icon-up-right-arrow-1"></i></a>
            <a class="portivio-btn portivio-btn-primary" href="https://wa.me/8801612152443" target="_blank">GET IN TOUCH</a>
            <a class="portivio-btn portivio-btn-circle" href="https://wa.me/8801612152443" target="_blank"><i class="webexbase-icon-up-right-arrow-1"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section-content">
    <div class="container">
      <div class="services_list_style1">
        @foreach ($services as $index => $service)
          <div class="service_item wow fade_In_Up" data-wow-delay="0.{{ ($index + 1) * 2 }}s">
            <div class="service_head">
              <span class="service_count">({{ sprintf('%02d', $index + 1) }})</span>
              <h2 class="service_title text-white">{{ $service->heading }}</h2>
            </div>
            <div class="service_content">
              <div class="service_content_left">
                @if ($service->image)
                  <img src="{{ asset('upload/' . $service->image) }}" alt="{{ $service->heading }}" style="max-height: 250px; width: 100%; object-fit: cover; border-radius: 12px;" />
                @else
                  <img src="{{ asset('images/service/h1-s1-img1.jpg') }}" alt="default service" style="max-height: 250px; width: 100%; object-fit: cover; border-radius: 12px;" />
                @endif
              </div>
              <div class="service_content_right">
                <h3 class="text-white">{{ $service->heading }}</h3>
                <p class="text-white" style="opacity: 0.8; font-size: 1.05rem; line-height: 1.6; margin-bottom: 25px;">{{ $service->desc }}</p>
                <div class="portivio-btn-block">
                  <a class="portivio-btn portivio-btn-circle" href="https://wa.me/8801612152443" target="_blank"><i class="webexbase-icon-up-right-arrow-1"></i></a>
                  <a class="portivio-btn portivio-btn-primary" href="https://wa.me/8801612152443" target="_blank">Discuss Project</a>
                  <a class="portivio-btn portivio-btn-circle" href="https://wa.me/8801612152443" target="_blank"><i class="webexbase-icon-up-right-arrow-1"></i></a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
<!-- Service Section End -->

<!-- Project Section Start -->
<section class="project_section_area pdt-40 pdb-120 bg-black" style="border-top: 1px solid rgba(255,255,255,0.05);">
  <div class="section-title mrb-55 mrb-lg-60 wow fadeInUp">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-xl-6 col-lg-6 col-md-12">
          <div class="title-box">
            <h5 class="sub-title">( Portfolio )</h5>
            <h2 class="title text-white">Featured Projects & Creation</h2>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 d-flex justify-content-start justify-content-lg-end">
          <div class="flex flex-wrap justify-start gap-4 mb-4" id="filters-container">
            <button class="category-tab active" data-category="all">All</button>
            @foreach ($allCategories as $cat)
              <button class="category-tab" data-category="{{ $cat->slug }}">{{ $cat->name }}</button>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section-content">
    <div class="container" id="productGrid">
      @include('products.partials.products-grid', ['categories' => $categories])
    </div>
    
    <div class="container">
      <div class="row mrt-60">
        <div class="col d-flex align-items-center justify-content-center">
          <div class="portivio-btn-block">
            <a class="portivio-btn portivio-btn-circle" href="{{ route('products.user') }}"><i class="webexbase-icon-up-right-arrow-1"></i></a>
            <a class="portivio-btn portivio-btn-primary" href="{{ route('products.user') }}">ALL PROJECTS</a>
            <a class="portivio-btn portivio-btn-circle" href="{{ route('products.user') }}"><i class="webexbase-icon-up-right-arrow-1"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Project Section End -->

@php
  $displayReviews = $reviews;
  if ($displayReviews->isEmpty()) {
      $displayReviews = collect([
          (object)[
              'image' => null,
              'name' => 'Bayezed Bostamy',
              'designation' => 'Founder, Fleepness',
              'comment' => 'Outstanding experience working on our Laravel e-commerce system. Jahid has deep technical skills in Laravel, APIs, and responsive design. Deliveries were fast, efficient, and extremely professional.'
          ],
          (object)[
              'image' => null,
              'name' => 'Nadir Ahmed Khan',
              'designation' => 'Founder and Publisher, Amar Bangla 24',
              'comment' => 'Jahid is an exceptional developer who provided high-quality web applications tailored to my business needs. His clean code, secure solutions, and prompt communication made the entire project a seamless success! I highly recommend his services.'
          ]
      ]);
  }
@endphp

<!-- Testimonials Section Start -->
<section class="pdb-40 pdt-40 bg-black pos-rel" style="border-top: 1px solid rgba(255,255,255,0.05);">
  <div class="section-title mrb-55 mrb-lg-60">
    <div class="container">
      <div class="row">
        <div class="col-xl-5 col-lg-5 col-md-12 mrb-md-30">
          <div class="title-box anim-heading animation-style1">
            <h5 class="sub-title">( TESTIMONIALS )</h5>
            <h2 class="title wt-split-text anim-title text-white">What My Clients Say</h2>
          </div>
        </div>
        <div class="col-xl-7 col-lg-7 col-md-12 d-flex justify-content-start justify-content-lg-end align-items-center">
          <div class="portivio-btn-block">
            <a class="portivio-btn portivio-btn-circle" href="https://wa.me/8801612152443" target="_blank"><i class="webexbase-icon-up-right-arrow-1"></i></a>
            <a class="portivio-btn portivio-btn-primary" href="https://wa.me/8801612152443" target="_blank">DISCUSS PROJECT</a>
            <a class="portivio-btn portivio-btn-circle" href="https://wa.me/8801612152443" target="_blank"><i class="webexbase-icon-up-right-arrow-1"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section-content">
    <div class="container">
      <div class="row">
        <div class="col-xl-3">
          <div class="testimonial_01_quote_box mrb-xl-30" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.05); padding: 30px; border-radius: 12px; margin-bottom: 30px;">
            <img src="{{ asset('images/testimonials/man.png') }}" alt="quote icon" />
            <h5 class="rate text-white" style="font-size: 2rem; font-weight: bold; margin-top: 15px;">5.0/5</h5>
            <div class="ratings" style="color: #ffb400; margin-bottom: 10px;">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <p class="text-white" style="opacity: 0.6; font-size: 0.95rem;">Based on Client Feedback</p>
          </div>
        </div>
        <div class="col-xl-9 pos-rel">
          <div class="testimonial_01_carousel swiper" style="overflow: hidden;">
            <div class="swiper-wrapper">
              @foreach($displayReviews as $review)
              <div class="swiper-slide">
                <div class="testimonial_01_item" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.05); padding: 30px; border-radius: 12px; display: flex; gap: 20px; align-items: flex-start; height: 100%;">
                  @if($review->image)
                  <div class="testimonial_thumbnail" style="flex-shrink: 0; width: 80px; height: 80px; border-radius: 50%; overflow: hidden; border: 2px solid rgba(255,255,255,0.1);">
                    <img class="img-full" src="{{ asset('upload/'.$review->image) }}" alt="{{ $review->name }}" style="width: 100%; height: 100%; object-fit: cover;" />
                  </div>
                  @else
                  <div class="testimonial_thumbnail" style="flex-shrink: 0; width: 80px; height: 80px; border-radius: 50%; overflow: hidden; border: 2px solid rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; background: #1193d4; color: #fff; font-weight: bold; font-size: 1.5rem;">
                    {{ strtoupper(substr($review->name ?? 'C', 0, 1)) }}
                  </div>
                  @endif
                  <div class="testimonial_content" style="flex-grow: 1;">
                    <p class="comments text-white" style="font-size: 1.05rem; line-height: 1.6; opacity: 0.85; margin-bottom: 20px; font-style: italic;">
                      "{{ $review->comment }}"
                    </p>
                    <div class="testimonial-bottom-part">
                      <h4 class="testimonial-title text-white" style="font-size: 1.25rem; font-weight: bold; margin-bottom: 5px;">{{ $review->name }}</h4>
                      <span class="testimonial-subtitle" style="color: #1193d4; font-size: 0.9rem; font-weight: 500;">{{ $review->designation ?? 'Verified Client' }}</span>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>

          <!-- Navigation -->
          <div class="testimonial_01_nav" style="display: flex; gap: 15px; margin-top: 30px; align-items: center;">
            <div class="testimonial_01_pagination" style="color: #ffffff; opacity: 0.7; font-size: 0.95rem;"></div>
            <div class="testimonial_01_button_prev" style="cursor: pointer; color: #ffffff; width: 40px; height: 40px; border: 1px solid rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: all 0.3s;"><i class="fas fa-chevron-left"></i></div>
            <div class="testimonial_01_button_next" style="cursor: pointer; color: #ffffff; width: 40px; height: 40px; border: 1px solid rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: all 0.3s;"><i class="fas fa-chevron-right"></i></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Testimonials Section End -->

<!-- Brands Section Start -->
<section class="pdb-120 pdt-120 bg-cover bg-black" style="border-top: 1px solid rgba(255,255,255,0.05);">
  <div class="container">
    <div class="row mrb-55">
      <div class="col text-center">
        <div class="title-box anim-heading animation-style1">
          <h5 class="sub-title">( Satisfied Clients )</h5>
          <h2 class="title text-white">Brands I've Worked With</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        @if ($brands->count())
          <div class="swiper-container-brands" style="overflow: hidden; height: 110px;">
            <div class="swiper-wrapper">
              @foreach ($brands as $brand)
                <div class="swiper-slide flex justify-center items-center brand-slide" style="display: flex; align-items: center; justify-content: center;">
                  <div style="display: flex; align-items: center; justify-content: center; height: 90px; width: 180px; padding: 15px; background: #ffffff; border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.1); box-shadow: 0 4px 10px rgba(0,0,0,0.15);">
                    @if ($brand->image)
                      <img src="{{ asset('upload/' . $brand->image) }}" alt="{{ $brand->name }}" style="max-height: 60px; max-width: 140px; object-fit: contain; transition: all 0.3s ease;">
                    @else
                      <span class="text-dark" style="font-size: 0.95rem; font-weight: 600; color: #111;">{{ $brand->name }}</span>
                    @endif
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        @else
          <p class="text-center text-white" style="opacity: 0.5;">No brands to display.</p>
        @endif
      </div>
    </div>
  </div>
</section>
<!-- Brands Section End -->

@endsection

@section('styles')
<style>
  .category-tab {
    padding: 8px 24px;
    border-radius: 30px;
    border: 1px solid rgba(255, 255, 255, 0.15);
    background: transparent;
    color: rgba(255, 255, 255, 0.7);
    font-weight: 600;
    transition: all 0.3s ease;
    margin: 5px;
  }
  .category-tab:hover,
  .category-tab.active {
    background: #1193d4;
    border-color: #1193d4;
    color: white;
    box-shadow: 0 4px 15px rgba(17, 147, 212, 0.3);
  }
  
  /* Custom Font Size and Styling Adjustments */
  .h1-banner-title {
    font-size: 50px !important;
    line-height: 1.15 !important;
  }
  @media (max-width: 991px) {
    .h1-banner-title {
      font-size: 38px !important;
    }
  }
  @media (max-width: 767px) {
    .h1-banner-title {
      font-size: 30px !important;
    }
  }
  
  .service_title {
    font-size: 28px !important;
  }
  .service_content_right h3 {
    font-size: 22px !important;
  }
  @media (max-width: 767px) {
    .service_title {
      font-size: 17px !important;
    }
    .service_content_right h3 {
      font-size: 16px !important;
    }
    
    /* Apply mini service images on mobile view */
    .services_list_style1 .service_item .service_content {
      display: flex !important;
      flex-direction: column !important;
      gap: 15px !important;
      padding: 20px 15px !important;
    }
    .services_list_style1 .service_item .service_content .service_content_left {
      display: block !important;
      max-width: 130px !important;
      margin: 0 !important;
    }
    .services_list_style1 .service_item .service_content .service_content_left img {
      height: 90px !important;
      width: 130px !important;
      object-fit: contain !important;
      background-color: #111111 !important;
      border: 1px solid rgba(255,255,255,0.08) !important;
      border-radius: 8px !important;
    }
    .services_list_style1 .service_item .service_content .service_content_right {
      width: 100% !important;
    }
  }

  /* Star icon emoji sizing and alignment */
  .h1-banner-emoji {
    display: inline-block !important;
    vertical-align: middle !important;
    margin-right: 15px !important;
  }
  .h1-banner-emoji img {
    max-height: 45px !important;
    width: auto !important;
    vertical-align: middle !important;
  }

  /* Prevent cutting off the quote card at the bottom of the banner */
  .home_banner_01 {
    overflow: visible !important;
  }

  /* Profile image styling */
  .banner-profile-img {
    height: 380px !important;
    width: 100% !important;
    border-radius: 24px !important;
    box-shadow: 0 20px 45px rgba(0,0,0,0.5) !important;
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
    object-fit: cover !important;
    object-position: center top !important;
    display: block !important;
    margin: 0 auto !important;
  }

  /* Reduce gap below the main hero headings and justify text */
  .home_banner_01 .banner-item .h1-banner-text {
    margin-top: 15px !important;
    margin-bottom: 25px !important;
    text-align: justify !important;
  }

  /* Reduce font size for the quote title globally */
  .home_banner_01 .banner-item .banner-thumb .story-box .story-description .title {
    font-size: 20px !important;
    line-height: 28px !important;
  }

  /* Desktop layout overrides for modern compact card */
  @media (min-width: 992px) {
    .home_banner_01 .banner-item .banner-info {
      margin-left: 0px !important; /* Move text block left to make space */
    }
    .home_banner_01 .banner-item .h1-banner-text {
      margin-top: 60px !important; /* Apply margin top on desktop view */
      margin-bottom: 30px !important;
    }
    .home_banner_01 .banner-item .banner-thumb {
      max-width: 280px !important;
      margin-left: auto !important;
      margin-right: 0 !important;
      margin-top: -190px !important; /* Move up slightly on desktop */
      position: relative !important;
    }
    .home_banner_01 .banner-item .banner-thumb .banner-profile-img {
      height: 360px !important; /* Make image shorter on desktop to fit reduced size */
    }
    .home_banner_01 .banner-item .banner-thumb .story-box {
      position: absolute !important;
      width: 120% !important;
      left: -10% !important;
      right: -10% !important;
      bottom: -55px !important; /* Push card lower to avoid covering the face */
      padding: 16px 20px !important;
      border-radius: 16px !important;
      background: #ffffff !important;
      box-shadow: 0 15px 35px rgba(0,0,0,0.3) !important;
      display: flex !important;
    }
    .home_banner_01 .banner-item .banner-thumb .h1-obj2 {
      position: absolute !important;
      left: auto !important;
      right: -30px !important;
      top: 170px !important; /* Adjust badge height for the shorter card */
    }
    .about-col-left {
      padding-right: 50px !important;
    }
    .about-col-right {
      padding-left: 50px !important;
    }
  }

  /* Mobile and Tablet layout overrides */
  @media (max-width: 991px) {
    .home_banner_01 {
      padding-top: 130px !important; /* Increase gap on top for mobile view */
      padding-bottom: 40px !important; /* Reduce padding bottom on mobile view */
    }
    .home_banner_01 .banner-item .banner-info {
      margin-left: 0px !important;
    }
    .home_banner_01 .banner-item .banner-thumb {
      position: relative !important;
      margin-top: 40px !important;
      margin-bottom: 60px !important;
      bottom: auto !important;
      right: auto !important;
      left: auto !important;
      width: 100% !important;
      max-width: 240px !important; /* Decrease my photo width on mobile view */
      margin-left: auto !important;
      margin-right: auto !important;
    }
    .home_banner_01 .banner-item .banner-thumb .story-box {
      position: absolute !important;
      bottom: -40px !important;
      left: -15% !important;
      right: -15% !important;
      width: 130% !important;
      padding: 10px 14px !important;
      border-radius: 12px !important;
      background: #ffffff !important;
      box-shadow: 0 10px 25px rgba(0,0,0,0.2) !important;
      display: flex !important;
      align-items: center !important;
      gap: 12px !important;
    }
    .home_banner_01 .banner-item .banner-thumb .story-box .quote-icon {
      height: 40px !important;
      width: 40px !important;
      font-size: 16px !important;
    }
    .home_banner_01 .banner-item .banner-thumb .story-box .story-description .title {
      font-size: 11px !important;
      line-height: 1.4 !important;
      margin-bottom: 0 !important;
      white-space: nowrap !important;
    }
    .home_banner_01 .banner-item .banner-thumb .h1-obj2 {
      position: absolute !important;
      width: 90px !important; /* Scale down badge size on mobile */
      height: 90px !important;
      left: auto !important;
      right: -15px !important; /* Adjust coordinates to align with smaller photo card */
      top: 90px !important;
      display: flex !important;
      flex-direction: column !important;
      align-items: center !important;
      justify-content: center !important;
    }
    .home_banner_01 .banner-item .banner-thumb .h1-obj2 span:first-child {
      font-size: 7px !important;
    }
    .home_banner_01 .banner-item .banner-thumb .h1-obj2 span:last-child {
      font-size: 22px !important;
    }
    .home_banner_01 .banner-item .banner-thumb .banner-profile-img {
      height: 260px !important; /* Decrease my photo height on mobile view */
    }
    .home_banner_01 .banner-item .h1-banner-text {
      font-size: 12px !important;
      line-height: 1.5 !important;
      padding-left: 15px !important;
    }
    .home_banner_01 .banner-item .h1-banner-text:before {
      height: 8px !important;
      width: 8px !important;
      top: 5px !important;
    }
    .portivio-btn-block-2 .portivio-btn-2-primary,
    .portivio-btn-2-primary {
      padding: 10px 18px !important;
      font-size: 11px !important;
    }
    .portivio-btn-block-2 .portivio-btn-2-circle,
    .portivio-btn-2-circle {
      width: 36px !important;
      height: 36px !important;
      font-size: 12px !important;
    }
  }

  /* Marquee Section Styles */
  .marquee-wrapper.marquee-one {
    background: transparent;
    padding: 120px 0;
    overflow: hidden;
    position: relative;
    z-index: 2;
  }
  .marquee-one__inner {
    position: relative;
    padding: 30px 0 26px 0;
    -webkit-transform: rotate(-2deg);
            transform: rotate(-2deg);
    background: #2d1ee2;
    z-index: 2;
  }
  .marquee-one__inner.style-2 {
    margin-top: -65px;
    -webkit-transform: rotate(3deg);
            transform: rotate(3deg);
    background: #b4e019;
    z-index: 1;
  }
  .marquee-one__single-item {
    display: flex;
    align-items: center;
    gap: 20px;
    font-weight: 700;
    font-size: 40px;
    line-height: 1;
    letter-spacing: -0.8px;
    color: #ffffff;
    font-family: 'Poppins', sans-serif;
  }
  .marquee-one__single-item img {
    height: auto;
    width: auto;
    max-height: 35px;
  }
  .marquee-one__single-item.style-1 {
    color: #0f0f11;
  }
  .marquee-slider .swiper-slide {
    width: auto !important;
  }
  .marquee-slider .swiper-wrapper {
    transition-timing-function: linear !important;
  }
  
  @media (max-width: 768px) {
    .marquee-wrapper.marquee-one {
      padding: 70px 0;
    }
    .marquee-one__single-item {
      font-size: 22px !important;
      gap: 12px !important;
    }
    .marquee-one__single-item img {
      max-height: 20px !important;
    }
    .marquee-one__inner {
      padding: 16px 0 12px 0 !important;
    }
    .marquee-one__inner.style-2 {
      margin-top: -38px !important;
    }
  }
  
  @media (max-width: 576px) {
    .marquee-wrapper.marquee-one {
      padding: 30px 0;
    }
    .marquee-one__single-item {
      font-size: 11px !important;
      gap: 6px !important;
    }
    .marquee-one__single-item img {
      max-height: 9px !important;
    }
    .marquee-one__inner {
      padding: 6px 0 5px 0 !important;
    }
    .marquee-one__inner.style-2 {
      margin-top: -16px !important;
    }
  }

  /* Skills Bubbles Styling */
  @keyframes fadeInUpBubble {
    from {
      opacity: 0;
      transform: translateY(15px) scale(0.9);
    }
    to {
      opacity: 1;
      transform: translateY(0) scale(1);
    }
  }
  .skills-bubbles-container {
    display: flex;
    flex-wrap: wrap;
    margin-top: 25px;
    align-items: center;
    justify-content: flex-start;
  }
  .skill-bubble {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: #ffffff !important;
    border: 2px solid #000000 !important;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: all 0.3s cubic-bezier(0.25, 1, 0.5, 1);
    cursor: pointer;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    padding: 8px;
    opacity: 0;
    animation: fadeInUpBubble 0.6s cubic-bezier(0.25, 1, 0.5, 1) forwards;
    margin-right: -12px;
    position: relative;
    z-index: 1;
  }
  .skill-bubble:hover {
    background: #1193d4;
    border-color: #1193d4;
    transform: translateY(-5px) scale(1.15);
    box-shadow: 0 8px 20px rgba(17, 147, 212, 0.4);
    z-index: 10;
  }
  .skill-bubble img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
  }
  @media (max-width: 991.98px) {
    .skills-bubbles-container {
      justify-content: center;
      margin-top: 20px;
    }
    .skill-bubble {
      width: 32px !important;
      height: 32px !important;
      padding: 5px !important;
      margin-right: -8px !important;
      border-width: 1.5px !important;
    }
  }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Swiper for brands carousel
        const swiperBrands = new Swiper('.swiper-container-brands', {
            loop: true,
            slidesPerView: 5,
            spaceBetween: 30,
            speed: 2500,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
            },
            freeMode: true,
            freeModeMomentum: false,
            breakpoints: {
                320: { slidesPerView: 2, spaceBetween: 15 },
                640: { slidesPerView: 3, spaceBetween: 20 },
                1024: { slidesPerView: 5, spaceBetween: 30 },
            },
        });

        // AJAX Category Filtering
        const tabs = document.querySelectorAll('.category-tab');
        const productGrid = document.getElementById('productGrid');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                const category = tab.dataset.category;

                fetch(`{{ route('products.user') }}?category=${category}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        productGrid.innerHTML = data.html;
                        // Trigger animations or scroll effects if needed
                        if(typeof WOW !== 'undefined') {
                            new WOW().init();
                        }
                    })
                    .catch(err => console.error(err));
            });
        });

        // Initialize Swiper for marquee slider
        const marqueeSliders = document.querySelectorAll('.marquee-slider');
        marqueeSliders.forEach(slider => {
            new Swiper(slider, {
                loop: true,
                slidesPerView: 'auto',
                spaceBetween: 50,
                speed: 10000,
                autoplay: {
                    delay: 0,
                    disableOnInteraction: false,
                },
                freeMode: {
                    enabled: true,
                    momentum: false,
                },
                allowTouchMove: false,
            });
        });
    });
</script>
@endsection
