<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Denta<span>Care</span></a>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{ route('service') }}" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="{{ route('doctor') }}" class="nav-link">Doctors</a></li>
                <li class="nav-item"><a href="{{ route('faq') }}" class="nav-link">FAQ</a></li>
                <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact us</a></li>
                <li class="nav-item"><a href="{{ route('join') }}" class="nav-link">Join us</a></li>
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
                                <i class="fa fa-sign-out" style="font-size:24px"></i> Logout
                            </a>
                            <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                @csrf
                            </form>
                        @else
                            <a class="dropdown-item"
                                href="{{ Route::has('login') ? route('login') : 'javascript:void(0)' }}">
                                <i class="me-50" data-feather="log-in"></i> Login
                            </a>
                        @endif
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
