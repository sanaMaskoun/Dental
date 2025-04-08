<div class="header">

    <div class="header-left">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('img/logo.png') }}" alt="Logo">
        </a>

        <a href="" class="logo logo-small">
            <img src="{{ asset('img/logo.png') }}" width="30" height="30">
        </a>
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
                <a class="dropdown-item" href="javascript:;"><i class="flag flag-lr me-2"></i>English</a>
                <a class="dropdown-item" href="javascript:;"><img style="max-width: 25px; height: auto; margin-right: 10px;" src="{{ asset('img/Flag_of_Turkey.svg.webp') }}"> Turkce</a>
            </div>
        </li>

        {{--  <li class="nav-item dropdown noti-dropdown me-2">
        <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
            <img src="{{ asset('img/icons/header-icon-05.svg') }}" alt="">
        </a>

        <div class="dropdown-menu notifications">
            <div class="topnav-dropdown-header">
                <span class="notification-title">Notifications</span>
                <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
            </div>
            <div class="noti-content">
                <ul class="notification-list">
                    <li class="notification-message">
                        <a href="#">
                            <div class="media d-flex">
                                <span class="avatar avatar-sm flex-shrink-0">
                                    <img class="avatar-img rounded-circle" alt="User Image"
                                        src="assets/img/profiles/avatar-02.jpg">
                                </span>
                                <div class="media-body flex-grow-1">
                                    <p class="noti-details"><span class="noti-title">Carlson Tech</span> has
                                        approved <span class="noti-title">your estimate</span></p>
                                    <p class="noti-time"><span class="notification-time">4 mins ago</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="notification-message">
                        <a href="#">
                            <div class="media d-flex">
                                <span class="avatar avatar-sm flex-shrink-0">
                                    <img class="avatar-img rounded-circle" alt="User Image"
                                        src="assets/img/profiles/avatar-11.jpg">
                                </span>
                                <div class="media-body flex-grow-1">
                                    <p class="noti-details"><span class="noti-title">International Software
                                            Inc</span> has sent you a invoice in the amount of <span
                                            class="noti-title">$218</span></p>
                                    <p class="noti-time"><span class="notification-time">6 mins ago</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="notification-message">
                        <a href="#">
                            <div class="media d-flex">
                                <span class="avatar avatar-sm flex-shrink-0">
                                    <img class="avatar-img rounded-circle" alt="User Image"
                                        src="assets/img/profiles/avatar-17.jpg">
                                </span>
                                <div class="media-body flex-grow-1">
                                    <p class="noti-details"><span class="noti-title">John Hendry</span> sent
                                        a cancellation request <span class="noti-title">Apple iPhone
                                            XR</span></p>
                                    <p class="noti-time"><span class="notification-time">8 mins ago</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="notification-message">
                        <a href="#">
                            <div class="media d-flex">
                                <span class="avatar avatar-sm flex-shrink-0">
                                    <img class="avatar-img rounded-circle" alt="User Image"
                                        src="assets/img/profiles/avatar-13.jpg">
                                </span>
                                <div class="media-body flex-grow-1">
                                    <p class="noti-details"><span class="noti-title">Mercury Software
                                            Inc</span> added a new product <span class="noti-title">Apple
                                            MacBook Pro</span></p>
                                    <p class="noti-time"><span class="notification-time">12 mins ago</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="topnav-dropdown-footer">
                <a href="#">View all Notifications</a>
            </div>
        </div>

    </li>  --}}

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
                    <a class="dropdown-item" href="{{ route('doctor_details', Auth()->user()->id) }}">My Profile</a>
                @endrole
                @if (Auth::check())
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out" style="font-size:24px"></i> Logout
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
