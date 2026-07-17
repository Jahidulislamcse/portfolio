<header class="header_style_01">
  <nav class="main-menu sticky-header">
    <div class="main-menu-wrapper">
      <div class="main-menu-logo">
        <a href="{{ route('home') }}" class="flex items-center gap-2">
          @php $settings = \App\Models\Setting::first(); @endphp
          @if($settings && $settings->logo)
            <img src="{{ asset('upload/' . $settings->logo) }}" alt="logo" style="max-height: 55px; border-radius: 50%; object-fit: cover; border: 2px solid rgba(255,255,255,0.2);" />
          @else
            <img src="{{ asset('images/logo-light.png') }}" width="165" height="72" alt="logo" />
          @endif
          @if($settings && $settings->company)
            <span style="font-size: 1.25rem; font-weight: bold; color: #fff; margin-left: 10px; vertical-align: middle;">{{ $settings->company }}</span>
          @endif
        </a>
      </div>
      <ul class="main-nav-menu">
        <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
          <a href="{{ route('home') }}">Home</a>
        </li>
        <li class="{{ request()->routeIs('products.user') ? 'active' : '' }}">
          <a href="{{ route('products.user') }}">Projects</a>
        </li>
        <li class="{{ request()->routeIs('contact') ? 'active' : '' }}">
          <a href="{{ route('contact') }}">Contact</a>
        </li>
      </ul>
      <div class="main-menu-right">
        <div class="portivio-btn-block">
          <a class="portivio-btn portivio-btn-circle" href="{{ route('contact') }}"><i class="webexbase-icon-up-right-arrow-1"></i></a>
          <a class="portivio-btn portivio-btn-primary" href="{{ route('contact') }}">Hire Me</a>
          <a class="portivio-btn portivio-btn-circle" href="{{ route('contact') }}"><i class="webexbase-icon-up-right-arrow-1"></i></a>
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
