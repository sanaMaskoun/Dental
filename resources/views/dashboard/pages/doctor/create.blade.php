@extends('dashboard.master.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{ __('pages.doctor_add') }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">{{ __('pages.dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('pages.doctor_add') }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('doctor_store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>{{ __('pages.basic_details') }}</span></h5>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group fallback w-100">
                                            <input type="file" name="profile" class="dropify" >
                                            @error('profile')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>{{ __('pages.first_name') }} <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="first_name"
                                                value="{{ old('first_name') }}" placeholder="{{ __('pages.enter_first_name') }}">
                                            @error('first_name')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>{{ __('pages.last_name') }} <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="last_name"
                                                value="{{ old('last_name') }}" placeholder="{{ __('pages.enter_last_name') }}">
                                            @error('last_name')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>{{ __('pages.mobile') }} <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="phone"
                                                value="{{ old(key: 'phone') }}" placeholder="{{ __('pages.enter_mobile') }}">
                                            @error('phone')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>{{ __('pages.land_line') }} <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="land_line"
                                                value="{{ old(key: 'land_line') }}" placeholder="{{ __('pages.enter_land_line') }}">
                                            @error('land_line')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>{{ __('pages.bio') }} <span class="login-danger">*</span></label>
                                            <input type="textarea" class="form-control" name="bio"
                                                value="{{ old(key: 'bio') }}" placeholder="{{ __('pages.enter_bio') }}">
                                            @error('bio')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>{{ __('pages.years_of_practic') }} <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="years_of_practice"
                                                value="{{ old(key: 'years_of_practice') }}"
                                                placeholder="{{ __('pages.enter_years_of_practic') }}">
                                            @error('years_of_practice')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>





                                    <div class="col-12">
                                        <h5 class="form-title"><span>{{ __('pages.login_details') }}</span></h5>
                                    </div>


                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>{{ __('pages.email') }} <span class="login-danger">*</span></label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ old(key: 'email') }}" placeholder="{{ __('pages.enter_email') }}">
                                            @error('email')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>{{ __('pages.password') }} <span class="login-danger">*</span></label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="{{ __('pages.enter_password') }}">
                                            @error('password')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <h5 class="form-title"><span>{{ __('pages.address') }}</span></h5>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group local-forms">
                                            <label>{{ __('pages.address') }} <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="location"
                                                value="{{ old(key: 'location') }}" placeholder="{{ __('pages.enter_address') }}">
                                            @error('location')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="student-submit">
                                            <button type="submit" class="btn btn-primary">{{ __('pages.submit') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
