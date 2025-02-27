<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Dental</title>

    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}">

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/feather/feather.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/icons/flags/flags.css') }}">



    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>


    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>




    <div id="main-wrapper">

        @include('dashboard.master.header')
        @include('dashboard.master.sidebar')

        @yield('content')
    </div>



    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>


    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/feather.min.js') }}"></script>

    <script src="{{ asset('plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('plugins/morris/raphael-min.js') }}"></script>
    <script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('plugins/morris/chart-data.js') }}"></script>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
