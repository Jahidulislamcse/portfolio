@extends('layouts.master')

@section('title', 'Projects | ' . ($settings->company ?? 'Jahidul Islam'))

@section('content')

<!-- Page Title Start -->
<section class="page-title-section">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="breadcrumb-area">
          <h2 class="page-title">My Creations</h2>
          <ul class="breadcrumbs-link">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="active">Projects</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Page Title End -->

<!-- Project Section Start -->
<section class="project_section_area pdt-120 pdb-120 bg-black">
  <div class="container">
    <div class="row mrb-55 align-items-center">
      <div class="col-xl-6 col-lg-6 col-md-12">
        <div class="title-box">
          <h5 class="sub-title">( Portfolio )</h5>
          <h2 class="title text-white">All Masterpieces & Apps</h2>
        </div>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-12 d-flex justify-content-start justify-content-lg-end">
        <div class="flex flex-wrap justify-start gap-4" id="filters-container">
          <button class="category-tab active" data-category="all">All</button>
          @foreach ($allCategories as $cat)
            <button class="category-tab" data-category="{{ $cat->slug }}">{{ $cat->name }}</button>
          @endforeach
        </div>
      </div>
    </div>
    
    <div class="section-content" id="productGrid">
      @include('products.partials.products-grid', ['categories' => $categories])
    </div>
  </div>
</section>
<!-- Project Section End -->

<!-- Quotation Slide-in Panel & Floating Chip -->
<div id="quotationChip" class="fixed-quote-chip" title="Request a Quotation">
    Make <br> Quote
</div>

<div id="quotationPanel" class="fixed-quote-panel">
    <div class="quote-panel-header">
        <h3 class="text-white">Request a Quotation</h3>
        <button id="closeQuotePanel" class="quote-close-btn">&times;</button>
    </div>
    <div class="quote-panel-body">
        <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <div class="form-group mrb-20">
                <input type="text" name="name" placeholder="Your Name" class="form-control quote-input" required value="{{ old('name') }}" />
                @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mrb-20">
                <input type="email" name="email" placeholder="Your Email" class="form-control quote-input" required value="{{ old('email') }}" />
                @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mrb-25">
                <textarea name="message" placeholder="Your Message" rows="5" class="form-control quote-input" required>{{ old('message') }}</textarea>
                @error('message') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="quote-submit-btn">Send Message</button>
            </div>

            @if(session('success'))
                <div id="success-message" class="alert alert-success mt-4">
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
        </form>
    </div>
</div>

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

  /* Quotation Panel Styles */
  .fixed-quote-chip {
    position: fixed;
    top: 60%;
    left: 0;
    background: #1193d4;
    color: white;
    font-weight: bold;
    padding: 12px 18px;
    border-top-right-radius: 20px;
    border-bottom-right-radius: 20px;
    cursor: pointer;
    z-index: 1000;
    box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    text-align: center;
    line-height: 1.2;
    transition: background 0.3s ease, transform 0.2s ease;
  }
  .fixed-quote-chip:hover {
    background: #0d7cb3;
    transform: scale(1.05);
  }
  
  .fixed-quote-panel {
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 380px;
    background: rgba(15, 15, 15, 0.95);
    backdrop-filter: blur(10px);
    box-shadow: 5px 0 25px rgba(0,0,0,0.5);
    transform: translateX(-100%);
    transition: transform 0.4s cubic-bezier(0.25, 1, 0.5, 1);
    z-index: 9998;
    display: flex;
    flex-direction: column;
    border-right: 1px solid rgba(255,255,255,0.05);
  }
  .fixed-quote-panel.open {
    transform: translateX(0);
  }
  
  .quote-panel-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 30px 24px;
    border-bottom: 1px solid rgba(255,255,255,0.05);
  }
  .quote-close-btn {
    background: transparent;
    border: none;
    color: white;
    font-size: 2rem;
    line-height: 1;
    cursor: pointer;
    opacity: 0.7;
    transition: opacity 0.2s;
  }
  .quote-close-btn:hover {
    opacity: 1;
  }
  
  .quote-panel-body {
    padding: 30px 24px;
    flex: 1;
    overflow-y: auto;
  }
  
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
  
  .quote-submit-btn {
    width: 100%;
    background: #1193d4;
    color: white;
    font-weight: 600;
    padding: 14px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    transition: background 0.3s ease;
  }
  .quote-submit-btn:hover {
    background: #0d7cb3;
  }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
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
                        if(typeof WOW !== 'undefined') {
                            new WOW().init();
                        }
                    })
                    .catch(err => console.error(err));
            });
        });

        // Quotation Panel slide toggle
        const chip = document.getElementById('quotationChip');
        const panel = document.getElementById('quotationPanel');
        const closeBtn = document.getElementById('closeQuotePanel');

        chip.addEventListener('click', () => {
            panel.classList.add('open');
        });

        closeBtn.addEventListener('click', () => {
            panel.classList.remove('open');
        });

        // Close on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && panel.classList.contains('open')) {
                panel.classList.remove('open');
            }
        });
    });
</script>
@endsection
