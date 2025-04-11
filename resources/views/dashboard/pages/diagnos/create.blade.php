@extends('dashboard.master.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">{{ __('pages.diagnose_add') }}</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('doctor_dashboard') }}">{{ __('pages.dashboard') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('pages.diagnose_add') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card comman-shadow">
                        <div class="card-body">
                            <form action="{{ route('diagnose_store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title student-info">{{ __('pages.diagnose_information') }} </h5>
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <div class="form-group local-forms">
                                            <label>{{ __('pages.diagnose') }} <span class="login-danger">*</span></label>
                                            <textarea class="form-control" name="diagnose" value="{{ old('diagnose') }}" placeholder="{{ __('pages.enter_diagnose') }}"></textarea>
                                            @error('diagnose')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-12 col-sm-12">
                                        <div class="form-group local-forms">
                                            <label>{{ __('pages.notes') }} </label>
                                            <textarea class="form-control" name="notes" value="{{ old('notes') }}" placeholder="{{ __('pages.enter_notes') }}"></textarea>
                                            @error('notes')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-12 col-sm-12">
                                        <div class="form-group local-forms">
                                            <label>{{ __('pages.patient') }} <span class="login-danger">*</span></label>


                                            <select class="form-control select" name="patient" required>
                                                <option value="" disabled selected>{{ __('pages.select_patient') }}</option>
                                                @foreach ($patients as $patient)
                                                    <option value="{{ $patient->id }}"
                                                        {{ old('patient') == $patient->id ? 'selected' : '' }}>
                                                        {{ $patient->user->first_name }} {{ $patient->user->last_name }}

                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('patient')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror



                                        </div>
                                    </div>



                                    <div class="col-12 col-sm-4">
                                        <div class="form-group students-up-files">
                                            <label>{{ __('pages.upload_diagnose_photo') }} (150px X 150px)</label>
                                            <div class="uplod">
                                                <label class="file-upload mage-upbtn mb-0">
                                                    {{ __('pages.choose_file') }} <input type="file" name="diagnosImg">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="student-submit text-end">
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
