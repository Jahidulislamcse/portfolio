@extends('layouts.master')

@section('title', 'Products | Jahidul Islam')

@section('content')

<div class="max-w-7xl mx-auto card-container">
    <div class="text-center mb-8">
        <h2 class="text-3xl md:text-4xl font-extrabold text-amber-500 mb-12 text-center drop-shadow-lg">
            My Creation
        </h2>
    </div>

    <div class="flex flex-wrap justify-start gap-4 mb-10 px-2">
        <button class="category-tab {{ !$selectedCategory ? 'active' : '' }}" data-category="all">
            <span class="inline-flex items-center gap-2">
                All
            </span>
        </button>

        @foreach ($allCategories as $cat)
            <button class="category-tab {{ $selectedCategory == $cat->slug ? 'active' : '' }}"
                data-category="{{ $cat->slug }}">
                <span class="inline-flex items-center gap-2">
                    @if ($cat->image)
                        <img src="{{ asset('upload/' . $cat->image) }}" alt="{{ $cat->name }}"
                            class="w-6 h-6 rounded-full object-cover">
                    @endif
                    {{ $cat->name }}
                </span>
            </button>
        @endforeach
    </div>

    <div id="productGrid">
        @include('products.partials.products-grid', ['categories' => $categories])
    </div>
</div>

<div id="quotationChip" class="fixed top-2/3 left-0 transform -translate-y-1/2 bg-amber-500 text-white px-3 py-2 rounded-r-2xl cursor-pointer z-50 hover:bg-sky-600 transition-colors">
    Make <br> Quote
</div>

<div id="quotationPanel" class="fixed top-20 left-0 h-full w-96 bg-white shadow-lg transform -translate-x-full transition-transform z-40 overflow-y-auto">
    <div class="p-6 relative">
        <h2 class="text-2xl font-bold mb-4">Request a Quotation</h2>
        <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <input type="text" name="name" placeholder="Your Name"
                       class="block w-full rounded-md border-gray-300 px-4 py-3 text-gray-900 shadow-sm focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)] sm:text-sm"
                       value="{{ old('name') }}" />
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <input type="email" name="email" placeholder="Your Email"
                       class="block w-full rounded-md border-gray-300 px-4 py-3 text-gray-900 shadow-sm focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)] sm:text-sm"
                       value="{{ old('email') }}" />
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <textarea name="message" placeholder="Your Message" rows="4"
                          class="block w-full rounded-md border-gray-300 px-4 py-3 text-gray-900 shadow-sm focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)] sm:text-sm">{{ old('message') }}</textarea>
                @error('message') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <button type="submit"
                        class="w-full bg-[var(--primary-color)] text-white px-6 py-3 rounded-md hover:bg-sky-600 transition-colors duration-200">
                    Send Message
                </button>
            </div>

            @if(session('success'))
                <div id="success-message" class="mt-4 p-4 text-green-800 bg-green-100 border border-green-200 rounded-lg">
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

<style>
    .card-container {
        margin-top: 50px;
        margin-bottom: 80px;
    }
    .category-tab {
        padding: 6px 20px 0 20px;
        border-radius: 9999px;
        border: 2px solid #1193d4;
        background: white;
        color: #1193d4;
        font-weight: 600;
        transition: all 0.2s ease-in-out;
    }
    .category-tab:hover,
    .category-tab.active {
        background: #1193d4;
        color: white;
    }
    .text-blu{
        color: #1193D4;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

<script>
document.addEventListener('DOMContentLoaded', () => {
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
                })
                .catch(err => console.error(err));
        });
    });

    // Quotation Panel toggle
    const chip = document.getElementById('quotationChip');
    const panel = document.getElementById('quotationPanel');

    chip.addEventListener('click', () => {
        if(panel.classList.contains('-translate-x-full')){
            panel.classList.remove('-translate-x-full');
            panel.classList.add('translate-x-0');
        } else {
            panel.classList.add('-translate-x-full');
            panel.classList.remove('translate-x-0');
        }
    });
});
</script>

@endsection
