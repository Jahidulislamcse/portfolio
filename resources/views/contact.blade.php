@extends('layouts.master')

@section('title', 'Contact | ' . ($settings->company ?? 'Jahidul Islam'))

@section('content')

<!-- Page Title Start -->
<section class="page-title-section">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="breadcrumb-area">
          <h2 class="page-title">Contact Me</h2>
          <ul class="breadcrumbs-link">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="active">Contact</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Page Title End -->

<!-- Contact Section Start -->
<section class="contact-section bg-no-repeat bg-cover pdt-110 pdb-110 bg-black" data-background="{{ asset('images/bg/home1-bg1.png') }}">
  <div class="container">
    <div class="row mrb-80">
      <div class="col-xl-12">
        <div class="row">
          @if($settings && $settings->address)
            <div class="col-lg-6 col-xl-4">
              <div class="contact_info_02 d-flex mrb-30" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.05); padding: 25px 20px; border-radius: 12px; height: 100%;">
                <div class="contact-icon" style="color: #1193d4; font-size: 2.2rem; line-height: 1;">
                  <i class="webexbase-icon-pin-1"></i>
                </div>
                <div class="contact-details mrl-20">
                  <h5 class="icon-box-title mrb-10 text-white" style="font-size: 1.15rem; font-weight: bold;">Address</h5>
                  <p class="mrb-0 text-white-50" style="font-size: 0.95rem;">{{ $settings->address }}</p>
                </div>
              </div>
            </div>
          @endif
          @if($settings && $settings->contact_mail)
            <div class="col-lg-6 col-xl-4">
              <div class="contact_info_02 d-flex mrb-30" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.05); padding: 25px 20px; border-radius: 12px; height: 100%;">
                <div class="contact-icon" style="color: #1193d4; font-size: 2.2rem; line-height: 1;">
                  <i class="webexbase-icon-145-envelope"></i>
                </div>
                <div class="contact-details mrl-20">
                  <h5 class="icon-box-title mrb-10 text-white" style="font-size: 1.15rem; font-weight: bold;">Email Us</h5>
                  <p class="mrb-0 text-white-50" style="font-size: 0.95rem;"><a href="mailto:{{ $settings->contact_mail }}" style="color: inherit;">{{ $settings->contact_mail }}</a></p>
                </div>
              </div>
            </div>
          @endif
          @if($settings && $settings->phone_number)
            <div class="col-lg-6 col-xl-4">
              <div class="contact_info_02 d-flex mrb-30" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.05); padding: 25px 20px; border-radius: 12px; height: 100%;">
                <div class="contact-icon" style="color: #1193d4; font-size: 2.2rem; line-height: 1;">
                  <i class="webexbase-icon-call"></i>
                </div>
                <div class="contact-details mrl-20">
                  <h5 class="icon-box-title mrb-10 text-white" style="font-size: 1.15rem; font-weight: bold;">Phone Number</h5>
                  <p class="mrb-0 text-white-50" style="font-size: 0.95rem;"><a href="tel:{{ $settings->phone_number }}" style="color: inherit;">{{ $settings->phone_number }}</a></p>
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-xl-5">
        <div class="title-box anim-heading animation-style1">
          <h5 class="sub-title">( Get In Touch )</h5>
          <h2 class="title faq-title mrb-30 anim-title text-white">Have Any Questions?</h2>
        </div>
        <ul class="social-list list-lg list-primary-color mrb-lg-60 clearfix" style="display: flex; gap: 15px; list-style: none; padding: 0;">
          @if($settings && $settings->facebook)
            <li><a href="{{ $settings->facebook }}" target="_blank" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.1); border-radius: 50%; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; color: white;"><i class="fab fa-facebook-f"></i></a></li>
          @endif
          @if($settings && $settings->linkedin)
            <li><a href="{{ $settings->linkedin }}" target="_blank" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.1); border-radius: 50%; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; color: white;"><i class="fab fa-linkedin-in"></i></a></li>
          @endif
        </ul>
      </div>
      <div class="col-xl-7">
        <div class="contact-form">
          <form method="POST" action="{{ route('contact.store') }}">
            @csrf
            
            @if(session('success'))
                <div id="success-message" class="alert alert-success mrb-25" style="border-radius: 8px;">
                    {{ session('success') }}
                </div>
                <script>
                    setTimeout(function() {
                        const msg = document.getElementById('success-message');
                        if(msg) {
                            msg.style.transition = "opacity 0.5s";
                            msg.style.opacity = "0";
                            setTimeout(() => msg.remove(), 500);
                        }
                    }, 3000);
                </script>
            @endif

            <div class="row">
              <div class="col-lg-6">
                <div class="form-group mrb-25">
                  <input type="text" name="name" placeholder="Name" class="form-control quote-input" required value="{{ old('name') }}" />
                  @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group mrb-25">
                  <input type="email" name="email" placeholder="Email" class="form-control quote-input" required value="{{ old('email') }}" />
                  @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group mrb-25">
                  <textarea rows="5" name="message" placeholder="Message" class="form-control quote-input" required>{{ old('message') }}</textarea>
                  @error('message') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="col-lg-8">
                <div class="form-group">
                  <button type="submit" class="cs-btn-one btn-circle" style="background: #1193d4; color: white; border: none; padding: 12px 35px; border-radius: 30px; font-weight: 600; cursor: pointer; transition: background 0.3s ease;">Submit Now</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Contact Section End -->

<!-- Google Map Section Start -->
<div class="map-section pos-rel bg-black" style="border-top: 1px solid rgba(255,255,255,0.05); margin-bottom: -10px;">
  <div class="container-fluid p-0">
    <div class="row m-0">
      <div class="col-12 p-0">
        <iframe src="{{ $settings->google_map ?? 'https://maps.google.com' }}"
          class="w-full" height="480" style="border:0; width: 100%; filter: grayscale(100%) invert(92%) contrast(1.1);"
          allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
</div>
<!-- Google Map Section End -->

@endsection

@section('styles')
<style>
  .quote-input {
    background: rgba(255,255,255,0.03) !important;
    border: 1px solid rgba(255,255,255,0.1) !important;
    color: white !important;
    border-radius: 8px !important;
    padding: 14px 18px !important;
    font-size: 0.95rem !important;
    transition: border-color 0.3s !important;
  }
  .quote-input:focus {
    border-color: #1193d4 !important;
    box-shadow: 0 0 10px rgba(17, 147, 212, 0.2) !important;
  }
  .contact-form button:hover {
    background: #0d7cb3 !important;
  }
</style>
@endsection
