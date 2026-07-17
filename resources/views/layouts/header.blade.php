<header class="header_style_01">
  <nav class="main-menu sticky-header">
    <div class="main-menu-wrapper">
      <div class="main-menu-logo">
        <a href="{{ route('home') }}" class="flex items-center gap-2">
          @php $settings = \App\Models\Setting::first(); @endphp
          @if($settings && $settings->logo)
            <img src="{{ asset('upload/' . $settings->logo) }}" alt="logo" style="width: 55px; height: 55px; border-radius: 50%; object-fit: cover; border: 2px solid rgba(255,255,255,0.2);" />
          @else
            <img src="{{ asset('images/logo-light.png') }}" width="165" height="72" alt="logo" />
          @endif
          @if($settings && $settings->company)
            <span class="header-logo-text">{{ $settings->company }}</span>
          @endif
        </a>
      </div>

<style>
  .header-logo-text {
    font-size: 1.2rem;
    font-weight: 700;
    color: #fff;
    margin-left: 10px;
    vertical-align: middle;
    letter-spacing: 0.5px;
  }
  @media (max-width: 991px) {
    .header-logo-text {
      font-size: 1.0rem;
    }
  }
  @media (max-width: 767px) {
    .header-logo-text {
      font-size: 0.85rem;
      max-width: 180px;
      display: inline-block;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
  }
  @media (max-width: 480px) {
    .header-logo-text {
      max-width: 140px;
    }
  }
</style>
      <ul class="main-nav-menu">
        <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
          <a href="{{ route('home') }}">Home</a>
        </li>
        <li class="{{ request()->routeIs('products.user') ? 'active' : '' }}">
          <a href="{{ route('products.user') }}">Projects</a>
        </li>
      </ul>
      <div class="main-menu-right">
        <div class="portivio-btn-block">
          <a class="portivio-btn portivio-btn-circle" href="https://wa.me/8801612152443" target="_blank"><i class="webexbase-icon-up-right-arrow-1"></i></a>
          <a class="portivio-btn portivio-btn-primary" href="https://wa.me/8801612152443" target="_blank">Hire Me</a>
          <a class="portivio-btn portivio-btn-circle" href="https://wa.me/8801612152443" target="_blank"><i class="webexbase-icon-up-right-arrow-1"></i></a>
        </div>
        <a href="javascript:void(0);" class="mobile-nav-toggler">
          <span></span>
          <span></span>
          <span></span>
        </a>
      </div>
    </div>
  </nav>
</header>
