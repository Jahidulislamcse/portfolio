@extends('layouts.master')

@section('title', 'Services | ' . ($settings->company ?? 'Jahidul Islam'))

@section('content')

<!-- Services Page Hero Start -->
<section class="services-hero-section">
  <div class="container">
    <div class="row">
      <div class="col-xl-12 text-center">
        <div class="breadcrumb-area mrb-30">
          <h2 class="page-title text-white" style="font-size: 3rem; font-weight: 900; letter-spacing: 1px;">My Services</h2>
          <ul class="breadcrumbs-link d-flex justify-content-center gap-3 list-unstyled mt-3" style="font-size: 1rem; opacity: 0.8;">
            <li><a href="{{ route('home') }}" class="text-white" style="text-decoration: none;">Home</a></li>
            <li class="text-white">/</li>
            <li class="active text-primary-color" style="color: #1193d4;">Services</li>
          </ul>
        </div>
        <p class="text-white-50 mx-auto" style="max-width: 680px; font-size: 1.1rem; line-height: 1.6;">
          Crafting high-performance web applications, robust APIs, and modern user interfaces that bring business ideas to life.
        </p>
      </div>
    </div>
  </div>
</section>
<!-- Services Page Hero End -->

<!-- Services Grid Section Start -->
<section class="modern-services-grid-section">
  <div class="container">
    <div class="row g-4 justify-content-center">
      @foreach($services as $index => $service)
        <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
          <div class="modern-service-card wow fadeInUp" data-wow-delay="0.{{ ($index + 1) * 2 }}s">
            <div>
              <div class="service-card-top">
                <span class="service-card-num">({{ sprintf('%02d', $index + 1) }})</span>
                <div class="service-card-icon-box">
                  @if($service->image)
                    <img src="{{ asset('upload/' . $service->image) }}" alt="{{ $service->heading }}" />
                  @else
                    <i class="webexbase-icon-up-right-arrow-1 text-white" style="font-size: 1.5rem; color: #1193d4 !important;"></i>
                  @endif
                </div>
              </div>
              <h3 class="service-card-title">{{ $service->heading }}</h3>
              <p class="service-card-desc">{{ $service->desc }}</p>
            </div>
            
            <div class="service-card-footer">
              <a href="https://wa.me/8801612152443?text={{ urlencode('Hi Jahidul, I would like to discuss: ' . $service->heading) }}" target="_blank" class="service-discuss-link">
                <span>Discuss Project</span>
                <i class="fas fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
<!-- Services Grid Section End -->

@endsection

@section('styles')
<style>
.services-hero-section {
    padding: 130px 0 50px;
    background: #050505;
    position: relative;
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}

.modern-services-grid-section {
    padding: 70px 0 120px;
    background: #080808;
    position: relative;
}

.modern-service-card {
    background: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 24px;
    padding: 35px 30px;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: all 0.4s cubic-bezier(0.25, 1, 0.5, 1);
    position: relative;
    overflow: hidden;
}

.modern-service-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 3px;
    background: linear-gradient(90deg, #1193d4, #00ff88);
    opacity: 0;
    transition: opacity 0.4s ease;
}

.modern-service-card:hover {
    transform: translateY(-8px);
    background: rgba(255, 255, 255, 0.05);
    border-color: rgba(17, 147, 212, 0.4);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5), 0 0 30px rgba(17, 147, 212, 0.15);
}

.modern-service-card:hover::before {
    opacity: 1;
}

.service-card-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 25px;
}

.service-card-num {
    font-size: 1.1rem;
    font-weight: 800;
    color: #1193d4;
    background: rgba(17, 147, 212, 0.12);
    border: 1px solid rgba(17, 147, 212, 0.3);
    padding: 6px 16px;
    border-radius: 30px;
    letter-spacing: 1px;
}

.service-card-icon-box {
    width: 64px;
    height: 64px;
    border-radius: 18px;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.service-card-icon-box img {
    max-width: 40px;
    max-height: 40px;
    object-fit: contain;
}

.service-card-title {
    font-size: 1.5rem;
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 12px;
    line-height: 1.25;
    transition: color 0.3s ease;
}

.modern-service-card:hover .service-card-title {
    color: #1193d4;
}

.service-card-desc {
    font-size: 0.95rem;
    line-height: 1.6;
    color: rgba(255, 255, 255, 0.7);
    margin-bottom: 25px;
}

.service-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 20px;
    border-top: 1px solid rgba(255, 255, 255, 0.06);
}

.service-discuss-link {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    color: #ffffff;
    font-size: 0.9rem;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
}

.service-discuss-link i {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
    transition: all 0.3s ease;
}

.modern-service-card:hover .service-discuss-link {
    color: #1193d4;
}

.modern-service-card:hover .service-discuss-link i {
    background: #1193d4;
    color: #ffffff;
    transform: translateX(4px);
}

@media (max-width: 768px) {
    .services-hero-section {
        padding: 90px 0 35px;
    }
    .modern-services-grid-section {
        padding: 40px 0 80px;
    }
    .modern-service-card {
        padding: 24px 20px;
        border-radius: 20px;
    }
    .service-card-title {
        font-size: 1.3rem;
    }
    .service-card-desc {
        font-size: 0.88rem;
    }
}
</style>
@endsection