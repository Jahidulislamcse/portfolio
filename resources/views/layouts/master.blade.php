<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title', 'Jahidul Islam')</title>
    
    @php $settings = \App\Models\Setting::first(); @endphp
    @if($settings && $settings->logo)
        <link href="{{ asset('upload/' . $settings->logo) }}" rel="shortcut icon" type="image/x-icon" />
    @else
        <link href="{{ asset('images/favicon.png') }}" rel="shortcut icon" type="image/png" />
    @endif

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" />
    
    @yield('styles')
  </head>

  <body class="layout-dark-mood">
    <!-- Preloader Start -->
    <section>
      <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
          <div class="animation-preloader">
            <div class="spinner"></div>
            <div class="txt-loading">
              <span data-text-preloader="J" class="letters-loading">J</span>
              <span data-text-preloader="A" class="letters-loading">A</span>
              <span data-text-preloader="H" class="letters-loading">H</span>
              <span data-text-preloader="I" class="letters-loading">I</span>
              <span data-text-preloader="D" class="letters-loading">D</span>
            </div>
          </div>
          <div class="loader-section section-left"></div>
          <div class="loader-section section-right"></div>
        </div>
      </div>
    </section>
    <!-- Preloader End -->

    <!-- Header Area Start -->
    @include('layouts.header')
    <!-- Header Area End -->

    <div id="smooth-wrapper">
      <div id="smooth-content">
        @yield('content')

        <!-- Footer Area Start -->
        @include('layouts.footer')
        <!-- Footer Area End -->
      </div>
    </div>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/8801612152443" target="_blank"
        class="whatsapp-btn"
        title="Chat with me on WhatsApp">
       <img src="{{ asset('backend/images/whatsapp.png') }}" 
         alt="WhatsApp" 
         style="width: 80px; height: 80px; display: block;">
    </a>

    <style>
      .whatsapp-btn {
        position: fixed;
        bottom: 24px;
        right: 24px;
        z-index: 9999;
        animation: whatsapp-pulse 2s infinite ease-in-out;
        border-radius: 50%;
        transition: transform 0.2s;
      }
      .whatsapp-btn:hover {
        transform: scale(1.15) !important;
        animation: none;
      }
      @keyframes whatsapp-pulse {
        0% {
          transform: scale(1);
          box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.6);
        }
        70% {
          transform: scale(1.08);
          box-shadow: 0 0 0 15px rgba(37, 211, 102, 0);
        }
        100% {
          transform: scale(1);
          box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
        }
      }
    </style>

    <!-- Mobile Nav Sidebar Content Start -->
    <div class="mobile-nav-wrapper">
      <div class="mobile-nav-overlay mobile-nav-toggler"></div>
      <div class="mobile-nav-content">
        <a href="javascript:void(0);" class="mobile-nav-close mobile-nav-toggler">
          <span></span>
          <span></span>
        </a>
        <div class="side-panel-logo logo-box">
          <a href="{{ route('home') }}">
            @if($settings && $settings->logo)
                <img src="{{ asset('upload/' . $settings->logo) }}" alt="logo" style="max-height: 70px; border-radius: 50%;" />
            @else
                <img src="{{ asset('images/logo-light.png') }}" alt="logo" />
            @endif
          </a>
        </div>
        <div class="mobile-nav-container"></div>
        <ul class="list-items mobile-sidebar-contact">
          @if($settings && $settings->address)
            <li><span class="fa fa-map-marker-alt mrr-10 text-primary-color"></span>{{ $settings->address }}</li>
          @endif
          @if($settings && $settings->contact_mail)
            <li><span class="fas fa-envelope mrr-10 text-primary-color"></span><a href="mailto:{{ $settings->contact_mail }}">{{ $settings->contact_mail }}</a></li>
          @endif
          @if($settings && $settings->phone_number)
            <li><span class="fas fa-phone-alt mrr-10 text-primary-color"></span><a href="tel:{{ $settings->phone_number }}">{{ $settings->phone_number }}</a></li>
          @endif
        </ul>
        <ul class="social-list list-primary-color">
          @if($settings && $settings->facebook)
            <li><a href="{{ $settings->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
          @endif
          @if($settings && $settings->linkedin)
            <li><a href="{{ $settings->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
          @endif
        </ul>
      </div>
    </div>
    <!-- Mobile Nav Sidebar Content End -->

    <!-- Back to Top Start -->
    <div class="anim-scroll-to-top">
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
    </div>
    <!-- Back to Top end -->

    <!-- Integrated important scripts here -->
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/swiper.min.js') }}"></script>
    <!-- Counter Up Animation Start -->
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
    <!-- Counter Up Animation End -->
    <script src="{{ asset('js/jquery.event.move.js') }}"></script>
    <!-- Gsap Animation Start -->
    <script src="{{ asset('js/gsap-plugins.js') }}"></script>
    <script src="{{ asset('js/gsap-trigger.js') }}"></script>
    <script src="{{ asset('js/title-animations.js') }}"></script>
    <!-- Gsap Animation End -->
    <!-- Parallax Start -->
    <script src="{{ asset('js/ukiyo.min.js') }}"></script>
    <!-- Parallax End -->
    <!-- Image Distortion Effect Start -->
    <script src="{{ asset('js/three.js') }}"></script>
    <script src="{{ asset('js/hover-effect.umd.js') }}"></script>
    <!-- Image Distortion Effect End -->
    <script src="{{ asset('js/tilt.jquery.min.js') }}"></script>
    <script src="{{ asset('js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/backtotop.js') }}"></script>
    <script src="{{ asset('js/trigger.js') }}"></script>
    
    @yield('scripts')
  </body>
</html>
