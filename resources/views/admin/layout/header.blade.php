<div class="main-header">
    @php
    $settings = \App\Models\Setting::first();
    @endphp
    <div class="main-header-logo">
        <div class="logo-header" data-background-color="dark">
            <a href="" class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="navbar brand" class="navbar-brand" height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar"><i class="gg-menu-right"></i></button>
                <button class="btn btn-toggle sidenav-toggler"><i class="gg-menu-left"></i></button>
            </div>
            <button class="topbar-toggler more"><i class="gg-more-vertical-alt"></i></button>
        </div>
    </div>

    <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
        <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li class="nav-item topbar-user dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                        @if($settings && $settings->logo)
                        <div class="avatar-sm">
                            <img src="{{ asset('upload/' . $settings->logo) }}" alt="..." class="avatar-img rounded-circle" />
                        </div>
                        @else
                        <svg class="feather feather-shield" fill="none" height="32" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="32" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                        @endif

                        <span class="profile-username">
                            <span class="fw-bold">{{ Auth::user()->name ?? '' }}</span>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    @if($settings && $settings->logo)
                                    <div class="avatar-lg">
                                        <img src="{{ asset('upload/' . $settings->logo) }}" alt="image profile" class="avatar-img rounded" />
                                    </div>
                                    @else
                                    <svg class="feather feather-shield" fill="none" height="32" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="32" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                    </svg>
                                    @endif

                                    <div class="u-text">
                                        <h4>{{ Auth::user()->name ?? '' }}</h4>
                                        <p class="text-muted">{{ Auth::user()->email ?? '' }}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('profile.edit')}}">My Profile</a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                                </form>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>