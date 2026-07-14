@extends('layouts.master')

@section('content')

    <div class="bg-rpCreamLight flex relative z-20 items-center overflow-hidden">
        <div class="container mx-auto px-6 flex relative py-16 gap-5">
            <div class="sm:w-2/3 lg:w-2/5 flex flex-col relative z-20">
                <h1 class="text-6xl text-black flex flex-col leading-none font-playfair font-extrabold">
                    Turning Ideas Into Interactive Digital Solutions
                </h1>
                <p class="text-xl text-gray-700 font-poppins font-bold my-5">
                    I build modern, responsive, and user-focused websites, web applications, and APIs that bring concepts to life.
                </p>

                <div class="flex-grow">
                    <form action="" method="get" id="searchForm" class="lg:min-w-96 max-w-lg">
                        <div class="relative items-center w-full mx-auto">

                            <input type="text" id="query" name="query" autocomplete="off"
                                class="h-12 ps-12 w-full max-w-lg border-[1px] border-rpGrayMedium rounded-3xl p-2 outline-none pr-12"
                                onkeypress="handleKeyUp(event)"
                                value="{{ request()->routeIs('search') ? request()->get('query') : '' }}"
                                placeholder="Search Services" />
                            <button type="submit"
                                class="absolute inset-y-1 end-1 flex items-center justify-center w-10 h-10 text-white me-2 bg-rpOrange rounded-full">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.7935 12.3535L20.1471 12L19.7935 11.6464L14.2535 6.10644C14.1588 6.0117 14.1588 5.84829 14.2535 5.75355C14.3483 5.65881 14.5117 5.65881 14.6064 5.75355L20.6764 11.8235C20.7712 11.9183 20.7712 12.0817 20.6764 12.1764L14.6064 18.2464C14.5552 18.2977 14.4945 18.32 14.43 18.32C14.3654 18.32 14.3048 18.2977 14.2535 18.2464C14.1588 18.1517 14.1588 17.9883 14.2535 17.8935L19.7935 12.3535Z"
                                        fill="white" stroke="white" />
                                    <path
                                        d="M20.33 12.25H3.5C3.36614 12.25 3.25 12.1339 3.25 12C3.25 11.8661 3.36614 11.75 3.5 11.75H20.33C20.4639 11.75 20.58 11.8661 20.58 12C20.58 12.1339 20.4639 12.25 20.33 12.25Z"
                                        fill="white" stroke="white" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="flex mt-10 items-center">
                    @if(isset($settings->skills) && $settings->skills->count() > 0)
                        @foreach($settings->skills as $index => $skill)
                            <img src="{{ asset('upload/' . $skill->image) }}"
                                class="w-12 h-12 rounded-full border-4 border-rpWhite {{ $index > 0 ? '-ml-2' : '' }}" />
                        @endforeach
                    @else
                        <p class="text-gray-500 text-sm">No skills uploaded yet.</p>
                    @endif
                </div>
            </div>
            <div class=" sm:block sm:w-1/3 lg:w-3/5 relative">
                <img src="{{ asset('backend/images/DP.jpg') }}" class="max-w-xs md:max-w-md m-auto rounded-3xl" />
            </div>
        </div>
    </div>

    <section id="brands" class="py-12 bg-gray-50">
        <div class="container mx-auto px-6">

            <h2 class="text-3xl md:text-4xl font-bold text-amber-500 mb-12 text-center drop-shadow-lg">
                Satisfied Clients
            </h2>

            @if ($brands->count())
                <div class="swiper-container-brands">
                    <div class="swiper-wrapper">
                        @foreach ($brands as $index => $brand)
                            <div class="swiper-slide flex justify-center items-center brand-slide">
                                <div
                                    class="flex justify-center items-center 
                                        h-24 w-30 sm:h-24 sm:w-40 md:h-30 md:w-52">
                                    @if ($brand->image)
                                        <img src="{{ asset('upload/' . $brand->image) }}" alt="{{ $brand->name }}"
                                            class="object-contain h-full w-full">
                                    @else
                                        <span class="text-gray-400">No Image</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <p class="text-center text-gray-500">No brands to display.</p>
            @endif
        </div>
    </section>

    <section id="services" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-amber-500 mb-12 text-center drop-shadow-lg">
                    Services I Offer
                </h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($services as $service)
                    <div
                        class="group bg-white p-8 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 text-center">
                        <div
                            class="flex items-center justify-center h-16 w-16 rounded-full bg-amber-500 text-white mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                            @if ($service->image)
                                <img src="{{ asset('upload/' . $service->image) }}" alt="{{ $service->heading }}"
                                    class="h-12 w-12 object-contain mx-auto">
                            @else
                                <span class="material-symbols-outlined text-3xl">science</span>
                            @endif
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $service->heading }}</h3>
                        <p class="text-gray-600">{{ $service->desc }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="home-products" class="bg-gray-50">
        <div class="max-w-7xl mx-auto card-container">
            <div class="text-center mb-8">
                <h2 class="text-3xl md:text-4xl font-extrabold text-amber-500 mb-12 drop-shadow-lg">
                    My Creation
                </h2>
            </div>

            <div class="flex flex-wrap justify-start gap-4 mb-10 px-2">
                <button class="category-tab {{ !$selectedCategory ? 'active' : '' }}" data-category="all">
                    <span class="inline-flex items-center gap-2">All</span>
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
    </section>

    <section id="about-mission" class="py-10 mb-10 bg-gray-50">
        <div class="container mx-auto ">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-10 rounded-xl shadow-lg transform ">
                    <h2 class="text-3xl md:text-4xl font-bold text-amber-500 mb-12 text-center drop-shadow-lg">
                        About Me
                    </h2>
                    <div class="text-gray-700 text-lg leading-relaxed">
                        @if (!empty($settings->about_desc))
                            {!! $settings->about_desc !!}
                        @endif
                    </div>
                </div>

                <div class="bg-white p-10 rounded-xl shadow-lg transform ">
                    <h2 class="text-3xl md:text-4xl font-bold text-amber-500 mb-12 text-center drop-shadow-lg">
                        Mission & Vision
                    </h2>
                    <div class="text-gray-700 text-lg leading-relaxed">
                        @if (!empty($settings->mission_vision))
                            {!! $settings->mission_vision !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        const swiperBrands = new Swiper('.swiper-container-brands', {
            loop: true,
            slidesPerView: 4,
            spaceBetween: 30,
            speed: 3000,
            autoplay: {
                delay: 1, 
                disableOnInteraction: false,
            },
            freeMode: true,
            freeModeMomentum: false,
            allowTouchMove: true,
            breakpoints: {
                320: { slidesPerView: 2, spaceBetween: 10 },
                640: { slidesPerView: 3, spaceBetween: 20 },
                1024: { slidesPerView: 5, spaceBetween: 30 },
            },
        });
    </script>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#about_desc'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        const swiperBrands = new Swiper('.swiper-container-brands', {
            loop: true,
            slidesPerView: 4,
            spaceBetween: 30,
            speed: 2000,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
            },
            freeMode: true,
            freeModeMomentum: false,
            breakpoints: {
                320: {
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                640: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 30
                },
            },
        });
    </script>

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
                        .then(data => productGrid.innerHTML = data.html)
                        .catch(err => console.error(err));
                });
            });
        });
    </script>

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

        html {
            scroll-behavior: smooth;
        }
        .swiper-container-brands {
            height: 120px; 
            overflow: hidden;
        }

        .brand-slide {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .text-blu{
            color: #1193D4;
        }
    </style>
    

@endsection
