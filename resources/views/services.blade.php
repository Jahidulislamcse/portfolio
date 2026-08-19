@extends('layouts.master')

@section('title', 'Services | ' . ($settings->company ?? 'Jahidul Islam'))

@section('content')

<!-- Minimal Services Hero Start -->
<section class="services-hero-section">
  <div class="container">
    <div class="row">
      <div class="col-xl-12 text-center">
        <div class="breadcrumb-area mrb-15">
          <h2 class="page-title text-white" style="font-size: 2.5rem; font-weight: 800; letter-spacing: -0.5px;">Services</h2>
          <ul class="breadcrumbs-link d-flex justify-content-center gap-3 list-unstyled mt-2" style="font-size: 0.9rem; opacity: 0.7;">
            <li><a href="{{ route('home') }}" class="text-white" style="text-decoration: none;">Home</a></li>
            <li class="text-white">/</li>
            <li class="active text-primary-color" style="color: #1193d4;">Services</li>
          </ul>
        </div>
        <p class="text-white-50 mx-auto mb-0" style="max-width: 540px; font-size: 0.95rem; line-height: 1.5; color: rgba(255,255,255,0.6) !important;">
          Clean, modern web applications & scalable digital solutions.
        </p>
      </div>
    </div>
  </div>
</section>
<!-- Minimal Services Hero End -->

<!-- Minimal Services Section Start -->
<section class="minimal-services-section">
  <div class="container">
    <div class="row g-4">
      @foreach($services as $index => $service)
        <div class="col-xl-4 col-lg-4 col-md-6 mb-3">
          <a href="https://wa.me/8801612152443?text={{ urlencode('Hi Jahidul, I want to discuss: ' . $service->heading) }}" target="_blank" class="minimal-service-card wow fadeInUp" data-wow-delay="0.{{ ($index + 1) * 2 }}s">
            <div>
              <div class="minimal-card-top">
                <span class="minimal-card-num">0{{ $index + 1 }}.</span>
                <div class="minimal-card-arrow">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="7" y1="17" x2="17" y2="7"></line>
                    <polyline points="7 7 17 7 17 17"></polyline>
                  </svg>
                </div>
              </div>
              <h3 class="minimal-card-title">{{ $service->heading }}</h3>
            </div>
            
            <p class="minimal-card-desc">
              {{ Str::limit(strip_tags($service->desc), 75) }}
            </p>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>
<!-- Minimal Services Section End -->

@endsection

@section('styles')
<style>
.services-hero-section {
    padding: 120px 0 40px;
    background: #000000;
    border-bottom: 1px solid rgba(255, 255, 255, 0.06);
}

.minimal-services-section {
    padding: 60px 0 100px;
    background: #000000;
}

.minimal-service-card {
    background: #0a0a0a;
    border: 1px solid rgba(255, 255, 255, 0.07);
    border-radius: 16px;
    padding: 28px 24px 24px;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: border-color 0.3s ease, transform 0.3s ease, background 0.3s ease;
    text-decoration: none !important;
}

.minimal-service-card:hover {
    border-color: rgba(255, 255, 255, 0.25);
    background: #111111;
    transform: translateY(-4px);
}

.minimal-card-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 24px;
}

.minimal-card-num {
    font-size: 0.85rem;
    font-weight: 600;
    color: rgba(255, 255, 255, 0.4);
    font-family: monospace, sans-serif;
    letter-spacing: 1px;
}

.minimal-card-arrow {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    border: 1px solid rgba(255, 255, 255, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    color: rgba(255, 255, 255, 0.6);
    transition: all 0.3s ease;
}

.minimal-service-card:hover .minimal-card-arrow {
    border-color: #1193d4;
    color: #1193d4;
    transform: translate(2px, -2px);
}

.minimal-card-title {
    font-size: 1.35rem;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 8px;
    line-height: 1.3;
}

.minimal-card-desc {
    font-size: 0.88rem;
    line-height: 1.5;
    color: rgba(255, 255, 255, 0.55);
    margin: 0;
}

@media (max-width: 768px) {
    .services-hero-section {
        padding: 85px 0 30px;
    }
    .minimal-services-section {
        padding: 35px 0 60px;
    }
    .minimal-service-card {
        padding: 22px 18px;
        border-radius: 14px;
    }
    .minimal-card-title {
        font-size: 1.2rem;
    }
    .minimal-card-desc {
        font-size: 0.84rem;
    }
}
</style>
@endsection