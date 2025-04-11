@extends('layouts.app')

@section('content')
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
        @endif
            <div class="loginbox">
                <div class="login-left">
                    <img class="img-fluid" src="{{ asset('img/dentist.webp') }}" alt="Logo" style="height: 100%;">
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>{{ __('auth.welcome_login') }}</h1>
                        <p class="account-subtitle">{{ __('auth.need_account') }}? <a href="{{ route('register') }}">{{ __('auth.sign_up') }}</a></p>
                        <h2>{{ __('auth.sign_in') }}</h2>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label>{{ __('pages.email') }} <span class="login-danger">*</span></label>
                                <input class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus>
                                <span class="profile-views"><i class="fas fa-user-circle"></i></span>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>{{ __('pages.password') }} <span class="login-danger">*</span></label>
                                <input class="form-control pass-input" type="password" name="password" required>
                                <span class="profile-views feather-eye toggle-password"></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">{{ __('pages.login') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
