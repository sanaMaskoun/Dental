@extends('dashboard.master.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Add Appointment</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('doctor_dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add Appointment</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('appointment_store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Appointment Information</span></h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms  calendar-icon">
                                        <label>Date <span class="login-danger">*</span></label>
                                        <input type="text" name="date" class="form-control datetimepicker" placeholder="DD-MM-YYYY">
                                        @error('date')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Start Time <span class="login-danger">*</span></label>
                                        <input type="time" name="start_time" class="form-control">
                                          @error('start_time')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>End Time <span class="login-danger">*</span></label>
                                        <input class="form-control" name="end_time" type="time">
                                          @error('end_time')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="student-submit">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
