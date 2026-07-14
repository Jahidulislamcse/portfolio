<footer class="bg-gray-800 text-white">
    <div class="container mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="text-[var(--primary-color)]">
                        @php
                            $settings = \App\Models\Setting::first();
                        @endphp

                        @if ($settings && $settings->logo)
                            <img src="{{ asset('upload/' . $settings->logo) }}" alt="Logo" height="50" width="50"
                                class="rounded-full object-cover border-2 border-gray-300 shadow-md">
                        @else
                            <svg class="feather feather-shield" fill="none" height="32" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                width="32" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                        @endif

                    </div>
                    <h1 class="text-xl font-bold text-white tracking-tight">
                        @if ($settings && $settings->company)
                            {{ $settings->company }}
                        @else
                            Company Name
                        @endif
                    </h1>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-semibold mb-4">More</h3>
                <ul class="space-y-2">
                    <li><a class="text-gray-400 hover:text-white transition-colors duration-300"
                            href="{{ route('contact') }}">Contact Me</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Find Me On</h3>
                <div class="flex space-x-6">
                    @if (optional($settings)->facebook)
                        <a href="{{ $settings->facebook }}" class="text-gray-400 hover:text-white" target="_blank">
                            <span class="sr-only">Facebook</span>
                            <i class="fab fa-facebook text-3xl"></i>
                        </a>
                    @endif

                    @if (optional($settings)->linkedin)
                        <a href="{{ $settings->linkedin }}" class="text-gray-400 hover:text-white" target="_blank">
                            <span class="sr-only">LinkedIn</span>
                            <i class="fab fa-linkedin text-3xl"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="mt-12 border-t border-gray-700 pt-8 text-center text-gray-500">
            <div class="copyright">
                Copyright © 2025 Developed & Maintained By
                <a  target="_blank" rel="noopener noreferrer">Jahidul Islam
                    (jahidcse181@gmail.com)</a>
            </div>
        </div>
    </div>
</footer>
