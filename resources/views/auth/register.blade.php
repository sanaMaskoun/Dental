@extends('layouts.app')

@section('content')
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                        <img class="img-fluid" src="{{ asset('img/dentist.webp') }}" alt="Logo" style="height: 100%">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>{{ __('auth.sign_up') }}</h1>
                            <p class="account-subtitle">{{ __('auth.details_sign_up') }}</p>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <label>{{ __('pages.first_name') }} <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" name="first_name">
                                    <span class="profile-views"><i class="fas fa-user-circle"></i></span>
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('pages.last_name') }}<span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" name="last_name">
                                    <span class="profile-views"><i class="fas fa-user-circle"></i></span>
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('pages.email') }} <span class="login-danger">*</span></label>
                                    <input class="form-control" type="email" name="email">
                                    <span class="profile-views"><i class="fas fa-envelope"></i></span>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('pages.password') }} <span class="login-danger">*</span></label>
                                    <input class="form-control pass-input" type="password" name="password">
                                    <span class="profile-views feather-eye toggle-password"></span>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('pages.mobile') }} <span class="login-danger">*</span></label>
                                    <input class="form-control pass-confirm" type="text" name="phone">
                                    <span class="profile-views feather-eye reg-toggle-password"></span>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class=" dont-have">{{ __('auth.already_registered') }}? <a href="{{ route('login') }}">{{ __('pages.login') }}</a></div>
                                <div class="form-group mb-0">
                                    <button  type="submit" class="btn btn-primary btn-block">{{ __('auth.register') }}</button>
                                </div>
                            </form>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
