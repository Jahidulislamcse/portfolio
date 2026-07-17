<footer class="footer bg-cover bg-black pos-rel" data-background="{{ asset('images/bg/footer-blur-bg2.png') }}">
  <div class="footer-main-area">
    <div class="container">
      <div class="row justify-content-between pdb-80">
        <div class="col-xl-9 col-lg-9 col-md-12 anim-heading animation-style1">
          <h2 class="footer_big_text anim-title">Like What You See? Let’s Get Started!</h2>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-12 d-flex justify-content-center justify-content-lg-end">
          <div class="xotech_btn_block circle_hover_btn">
            <div class="circle_btn_item">
              <a href="https://wa.me/8801612152443" target="_blank" class="circle-btn-style1">Hire Me <i class="circle-btn-arrow webexbase-icon-black-arrow-1"></i></a>
              <span class="circle_btn_dot"></span>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12">
          <div class="pdt-30 pdb-30 footer-border-top-bottom">
            <div class="row">
              <div class="col-xl-8 col-lg-8 col-md-8">
                <ul class="h1_footer_01_social">
                  @php $settings = \App\Models\Setting::first(); @endphp
                  @if($settings && $settings->facebook)
                    <li><a href="{{ $settings->facebook }}" target="_blank">Facebook</a></li>
                  @endif
                  @if($settings && $settings->linkedin)
                    <li><a href="{{ $settings->linkedin }}" target="_blank">LinkedIn</a></li>
                  @endif
                </ul>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 text-center text-md-end">
                @if($settings && $settings->contact_mail)
                  <span><a href="mailto:{{ $settings->contact_mail }}" style="color: inherit;">{{ $settings->contact_mail }}</a></span>
                @else
                  <span>Info@gmail.com</span>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row pdt-30 pdb-30 footer-copyright-area">
        <div class="col"></div>
        <div class="col-xl-6 col-lg-6">
          <div class="text-center">
            <span>Copyright by <strong>{{ $settings->company ?? 'Jahidul Islam' }}</strong> © 2026. All rights reserved </span>
          </div>
        </div>
        <div class="col"></div>
      </div>
    </div>
  </div>
  <img class="h1_footer_oval_shape" src="{{ asset('images/footer/oval.png') }}" alt="" />
</footer>
