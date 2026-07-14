    @php
    $settings = \App\Models\Setting::first();
    @endphp

    <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
            <div class="logo-header" data-background-color="dark">

                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar"><i class="gg-menu-right"></i></button>
                    <button class="btn btn-toggle sidenav-toggler"><i class="gg-menu-left"></i></button>
                </div>
                <button class="topbar-toggler more"><i class="gg-more-vertical-alt"></i></button>
            </div>
        </div>

        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <ul class="nav flex-column nav-secondary">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}"
                            class="nav-link d-flex align-items-center {{ request()->routeIs('admin.dashboard') ? 'active bg-warning text-white' : 'text-dark' }}">
                            <img src="{{ asset('backend/icons/dashboard.png') }}" alt="Dashboard Icon" class="me-2" style="width:32px; height:32px;">
                            <span class="text-white text-lg">Dashboard</span>
                        </a>
                    </li>

                     <li class="nav-item">
                        <a href="{{ route('admin.categories.index') }}"
                            class="nav-link d-flex align-items-center {{ request()->routeIs('admin.categories.index') ? 'active bg-warning text-white' : 'text-dark' }}">
                            <img src="{{ asset('backend/icons/category.png') }}" alt="Settings Icon" class="me-2" style="width:32px; height:32px;">
                            <span class="text-white text-lg">Category</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.products.index') }}"
                            class="nav-link d-flex align-items-center {{ request()->routeIs('admin.products.*') ? 'active bg-warning text-white' : 'text-dark' }}">
                            <img src="{{ asset('backend/icons/products.png') }}" alt="products Icon" class="me-2" style="width:32px; height:32px;">
                            <span class="text-white text-lg">Projects</span>
                        </a>
                    </li>

                     <li class="nav-item">
                        <a href="{{ route('admin.brands.index') }}"
                            class="nav-link d-flex align-items-center {{ request()->routeIs('admin.brands.index') ? 'active bg-warning text-white' : 'text-dark' }}">
                            <img src="{{ asset('backend/icons/shop.png') }}" alt="Settings Icon" class="me-2" style="width:32px; height:32px;">
                            <span class="text-white text-lg">Brands</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.messages') }}"
                            class="nav-link d-flex align-items-center {{ request()->routeIs('admin.messages') ? 'active bg-warning text-white' : 'text-dark' }}">
                            <img src="{{ asset('backend/icons/messages.png') }}" alt="Settings Icon" class="me-2" style="width:32px; height:32px;">
                            <span class="text-white text-lg">Messages</span>
                        </a>
                    </li>

                     <li class="nav-item">
                        <a href="{{ route('admin.sliders.index') }}"
                            class="nav-link d-flex align-items-center {{ request()->routeIs('admin.sliders.index') ? 'active bg-warning text-white' : 'text-dark' }}">
                            <img src="{{ asset('backend/icons/slider.png') }}" alt="Settings Icon" class="me-2" style="width:32px; height:32px;">
                            <span class="text-white text-lg">Sliders</span>
                        </a>
                    </li>
                   
                    <li class="nav-item">
                        <a href="{{ route('admin.services.index') }}"
                            class="nav-link d-flex align-items-center {{ request()->routeIs('admin.services.index') ? 'active bg-warning text-white' : 'text-dark' }}">
                            <img src="{{ asset('backend/icons/services.png') }}" alt="Settings Icon" class="me-2" style="width:32px; height:32px;">
                            <span class="text-white text-lg">Services</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.managing-body.index') }}"
                            class="nav-link d-flex align-items-center {{ request()->routeIs('admin.managing-body.index') ? 'active bg-warning text-white' : 'text-dark' }}">
                            <img src="{{ asset('backend/icons/management.png') }}" alt="Settings Icon" class="me-2" style="width:32px; height:32px;">
                            <span class="text-white text-lg">Management</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.settings.index') }}"
                            class="nav-link d-flex align-items-center {{ request()->routeIs('admin.settings.*') ? 'active bg-warning text-white' : 'text-dark' }}">
                            <img src="{{ asset('backend/icons/settings.png') }}" alt="Settings Icon" class="me-2" style="width:32px; height:32px;">
                            <span class="text-white text-lg">Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>