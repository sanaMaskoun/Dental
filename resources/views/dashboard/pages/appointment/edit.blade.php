@extends('dashboard.master.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{ __('pages.edit_appointment') }}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('doctor_dashboard') }}">{{ __('pages.dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('pages.edit_appointment') }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('appointment_update',$appointment->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>{{ __('pages.appointment_information') }}</span></h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms  calendar-icon">
                                        <label>{{ __('pages.date') }} <span class="login-danger">*</span></label>
                                        <input type="text" name="date" class="form-control datetimepicker" value="{{ $appointment->date }}">
                                        @error('date')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>{{ __('pages.start_time') }}<span class="login-danger">*</span></label>
                                        <input type="time" name="start_time" class="form-control" value="{{ $appointment->start_time }}">
                                          @error('start_time')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>{{ __('pages.end_time') }} <span class="login-danger">*</span></label>
                                        <input class="form-control" name="end_time" type="time" value="{{ $appointment->end_time }}">
                                          @error('end_time')
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
