<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Denta<span>Care</span></a>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">{{ __('pages.home') }}</a></li>
                <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">{{ __('pages.about') }}</a></li>
                <li class="nav-item"><a href="{{ route('service') }}" class="nav-link">{{ __('pages.services') }}</a></li>
                <li class="nav-item"><a href="{{ route('doctor') }}" class="nav-link">{{ __('pages.doctors') }}</a></li>
                <li class="nav-item"><a href="{{ route('faq') }}" class="nav-link">{{ __('pages.faq') }}</a></li>
                <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">{{ __('pages.contact_us') }}s</a></li>
                <li class="nav-item"><a href="{{ route('join') }}" class="nav-link">{{ __('pages.join_us') }}</a></li>
                {{--  <li class="nav-item"><a href="{{ route('login') }}" class="nav-link"><i class="fas fa-user"></i></a></li>  --}}

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu">

                        @if (Auth::check())
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out" style="font-size:24px"></i> {{ __('pages.logout') }}
                            </a>
                            <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                @csrf
                            </form>
                        @else
                            <a class="dropdown-item"
                                href="{{ Route::has('login') ? route('login') : 'javascript:void(0)' }}">
                                <i class="me-50" data-feather="log-in"></i> {{ __('pages.login') }}
                            </a>
                        @endif
                    </div>
                </li>

                <li class="nav-item dropdown language-drop me-2">
                    <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
                        <img src="{{ asset('img/icons/header-icon-01.svg') }}" alt="">
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('language_change', 'en') }}">
                            <i class="flag flag-lr me-2"></i> English
                        </a>
                        <a class="dropdown-item" href="{{ route('language_change', 'tr') }}">
                            <img style="max-width:25px;height:auto;margin-right:5px;"
                                 src="{{ asset('img/Flag_of_Turkey.svg.webp') }}">
                            Türkçe
                        </a>
                    </div>
                </li>


                @if (Auth::check())
                    <li class="nav-item">
                        <a href="{{ route('recharge') }}" class="nav-link">
                            <i class="fa fa-wallet"></i> @role('patient')
                                <span>{{ Auth()->user()->patient->account }}</span>
                            @endrole
                        </a>

                    </li>
                @endif

                {{--  <button id="bookAppointmentBtn" class="btn btn-primary px-4 py-3" data-toggle="modal"
                    data-target="#bookingModal">
                    Book an Appointment
                </button>  --}}

            </ul>
        </div>
    </div>
</nav>
