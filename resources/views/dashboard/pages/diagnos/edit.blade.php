@extends('dashboard.master.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Edit Diagnose</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('doctor_dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Edit Diagnose</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card comman-shadow">
                        <div class="card-body">
                            <form action="{{ route('diagnose_update',$diagnose->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title student-info">Diagnose Information </h5>
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <div class="form-group local-forms">
                                            <label>Diagnose <span class="login-danger">*</span></label>
                                            <input class="form-control" name="diagnose" type="text" value="{{ $diagnose->diagnose }}" >
                                            @error('diagnose')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-12 col-sm-12">
                                        <div class="form-group local-forms">
                                            <label>Notes </label>
                                            <input class="form-control" type="text" name="notes" value="{{ $diagnose->notes }}" >
                                            @error('notes')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-12 col-sm-12">
                                        <div class="form-group local-forms">
                                            <label>Patient <span class="login-danger">*</span></label>


                                            <select class="form-control select" name="patient" required>
                                                <option value="" disabled selected>Select Patient</option>
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
                                            <label>Upload Diagnose Photo (150px X 150px)</label>
                                            <div class="uplod">
                                                <label class="file-upload image-upbtn mb-0">
                                                    Choose File <input type="file" name="diagnosImg">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="student-submit text-end">
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
