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
                        <h1>Welcome to Dentist Clinic</h1>
                        <p class="account-subtitle">Need an account? <a href="{{ route('register') }}">Sign Up</a></p>
                        <h2>Sign in</h2>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label>Email <span class="login-danger">*</span></label>
                                <input class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus>
                                <span class="profile-views"><i class="fas fa-user-circle"></i></span>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Password <span class="login-danger">*</span></label>
                                <input class="form-control pass-input" type="password" name="password" required>
                                <span class="profile-views feather-eye toggle-password"></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
