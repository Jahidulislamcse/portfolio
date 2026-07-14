@extends('layouts.master')

@section('title', $product->name)

@section('content')

    <a href="{{ route('products.user') }}"
        class="absolute top-0 left-0 mt-4 ml-4 inline-flex items-center px-4 py-2 border border-[var(--primary-color)] text-[var(--primary-color)] font-medium rounded-md hover:bg-[var(--primary-color)] hover:text-white transition-colors duration-200">
        Go Back
    </a>
    <div class="max-w-5xl mx-auto mt-12 px-4 py-5 my-10 relative">
        @if (session('success'))
            <div id="success-message" class="mb-6 p-4 text-green-800 bg-green-100 border border-green-200 rounded-lg">
                {{ session('success') }}
            </div>
            <script>
                setTimeout(function() {
                    const msg = document.getElementById('success-message');
                    if (msg) {
                        msg.style.transition = "opacity 0.5s";
                        msg.style.opacity = "0";
                        setTimeout(() => msg.remove(), 500);
                    }
                }, 3000);
            </script>
        @endif

        <div class="flex flex-col lg:flex-row gap-8">
            <div class="flex-1">
                <div class="mb-4 relative">
                    <img id="mainImage"
                        src="{{ asset('upload/' . ($product->cover_image ?? ($product->images->first()->image ?? ''))) }}"
                        alt="{{ $product->name }}" class="w-full rounded shadow-md object-cover"
                        style="width: 600px; cursor: zoom-in;">
                </div>

                @if ($product->images->count())
                    <div class="flex gap-2 flex-wrap">
                        @foreach ($product->images as $img)
                            <img src="{{ asset('upload/' . $img->image) }}"
                                class="w-20 h-20 object-cover rounded cursor-pointer thumbnail"
                                data-full="{{ asset('upload/' . $img->image) }}">
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="flex-1">
                <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
                <p class="text-sm text-[var(--primary-color)] mb-2">{{ $product->category->name ?? 'Uncategorized' }}</p>
                <div class="text-gray-700 mb-4">{!! $product->description !!}</div>

                <button id="openQuotationModal"
                    class="px-6 py-3 bg-amber-500 text-white rounded-md font-medium hover:bg-sky-600 transition-colors duration-200">
                    Request Quotation
                </button>
            </div>
        </div>
    </div>

    <div id="quotationModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6 relative">
            <button id="closeQuotationModal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                &times;
            </button>
            <h2 class="text-2xl font-bold mb-4">Request a Quotation</h2>

            <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <input type="text" name="name" id="name" placeholder="Your Name" autocomplete="name"
                        class="block w-full rounded-md border-gray-300 px-4 py-3 text-gray-900 shadow-sm focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)] sm:text-sm"
                        value="{{ old('name') }}" />
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <input type="email" name="email" id="email" placeholder="Your Email" autocomplete="email"
                        class="block w-full rounded-md border-gray-300 px-4 py-3 text-gray-900 shadow-sm focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)] sm:text-sm"
                        value="{{ old('email') }}" />
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <textarea name="message" id="message" placeholder="Your Message" rows="4"
                        class="block w-full rounded-md border-gray-300 px-4 py-3 text-gray-900 shadow-sm focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)] sm:text-sm">{{ old('message') }}</textarea>
                    @error('message')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                        class="w-full bg-[var(--primary-color)] text-white px-6 py-3 rounded-md hover:bg-sky-600 transition-colors duration-200">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <script>
        const mainImage = document.getElementById('mainImage');
        const thumbnails = document.querySelectorAll('.thumbnail');

        thumbnails.forEach(th => {
            th.addEventListener('click', () => {
                mainImage.src = th.dataset.full;
            });
        });

        mainImage.addEventListener('mousemove', function(e) {
            const rect = mainImage.getBoundingClientRect();
            const x = ((e.clientX - rect.left) / rect.width) * 100;
            const y = ((e.clientY - rect.top) / rect.height) * 100;
            mainImage.style.transformOrigin = `${x}% ${y}%`;
            mainImage.style.transform = 'scale(2)';
        });

        mainImage.addEventListener('mouseleave', function() {
            mainImage.style.transform = 'scale(1)';
            mainImage.style.transformOrigin = 'center center';
        });

        const openModalBtn = document.getElementById('openQuotationModal');
        const closeModalBtn = document.getElementById('closeQuotationModal');
        const modal = document.getElementById('quotationModal');

        openModalBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        });

        closeModalBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
        });
    </script>

    <style>
        #mainImage {
            transition: transform 0.2s ease;
        }

        .thumbnail:hover {
            border: 2px solid var(--primary-color);
        }
    </style>
@endsection
