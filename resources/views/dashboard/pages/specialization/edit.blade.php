@extends('dashboard.master.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{ __('pages.specializations_edit') }} </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">{{ __('pages.dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('pages.specializations_edit') }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('specialization_update', $specialization->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">



                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label> {{ __('pages.specialization_name') }} <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $specialization->name }}">
                                            @error('name')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label> {{ __('pages.description') }} <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="description"
                                                value="{{ $specialization->description }}">
                                            @error('description')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>{{ __('pages.specialization_pictures') }} <span class="login-danger">*</span></label>



                                            <input type="file" class="form-control" name="img" style="height: 44px;">
                                            @if ($specialization->getFirstMediaUrl('img'))
                                            <div style="margin-top: 10px;">
                                                <img src="{{ $specialization->getFirstMediaUrl('img') }}" alt="specialization Image" style="max-width: 100px; border-radius: 5px;">
                                            </div>
                                        @endif
                                            @error('img')
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
