<div class="header">

    <div class="header-left">
        @role('admin')
        <a href="{{ route('admin_dashboard') }}" class="logo">
            <img src="{{ asset('img/logo.png') }}" alt="Logo">
        </a>
        @endrole
        @role('doctor')
        <a href="{{ route('doctor_dashboard') }}" class="logo">
            <img src="{{ asset('img/logo.png') }}" alt="Logo">
        </a>
        @endrole

        @role('admin')
        <a href="{{ route('admin_dashboard') }}" class="logo logo-small">
            <img src="{{ asset('img/logo.png') }}" width="30" height="30">
        </a>
        @endrole
        @role('doctor')
        <a href="{{ route('doctor_dashboard') }}" class="logo logo-small">
            <img src="{{ asset('img/logo.png') }}" width="30" height="30">
        </a>
        @endrole

    </div>

    <div class="menu-toggle">
        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fas fa-bars"></i>
        </a>
    </div>




    <a class="mobile_btn" id="mobile_btn">
        <i class="fas fa-bars"></i>
    </a>


    <ul class="nav user-menu">
        <li class="nav-item dropdown language-drop me-2">
            <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
                <img src="{{ asset('img/icons/header-icon-01.svg') }}" alt="">
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('language_change', 'en') }}">
                    <i class="flag flag-lr me-2"></i> English
                </a>
                <a class="dropdown-item" href="{{ route('language_change', 'tr') }}">
                    <img style="max-width:25px;height:auto;margin-right:10px;"
                         src="{{ asset('img/Flag_of_Turkey.svg.webp') }}">
                    Türkçe
                </a>
            </div>
        </li>


        <li class="nav-item zoom-screen me-2">
            <a href="#" class="nav-link header-nav-list">
                <img src="{{ asset('img/icons/header-icon-04.svg') }}" alt="">
            </a>
        </li>

        <li class="nav-item dropdown has-arrow new-user-menus">

            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img">
                    <img class="rounded-circle" src="{{ Auth()->user()->getFirstMediaUrl('profile') }}" width="31"
                        alt="Soeng Souy">
                    <div class="user-text">
                        <h6>{{ Auth()->user()->first_name }} {{ Auth()->user()->last_name }}</h6>
                    </div>
                </span>
            </a>

            <div class="dropdown-menu">
                @role('doctor')
                    <a class="dropdown-item" href="{{ route('doctor_details', Auth()->user()->id) }}">{{ __('pages.my_profile') }}</a>
                @endrole
                @if (Auth::check())
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out" style="font-size:24px"></i> {{ __('pages.logout') }}
                    </a>
                    <form method="POST" id="logout-form" action="{{ route('logout') }}">
                        @csrf
                    </form>
                @else
                    <a class="dropdown-item" href="{{ Route::has('login') ? route('login') : 'javascript:void(0)' }}">
                        <i class="me-50" data-feather="log-in"></i> Login
                    </a>
                @endif
            </div>
        </li>

    </ul>

</div>
