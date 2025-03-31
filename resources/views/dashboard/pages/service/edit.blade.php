
@extends('dashboard.master.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Edit Service </h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('doctor_dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Service</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('service_update',$service->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label> Service Name <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $service->name }}">
                                        @error('name')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label> Description <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" name="description"
                                            value="{{ $service->description }}">
                                        @error('description')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label> Price <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" name="price"
                                            value="{{ $service->price }}" >
                                        @error('price')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Service pictures <span class="login-danger">*</span></label>

                                        @if ($service->getFirstMediaUrl('img'))
                                            <div style="margin-bottom: 10px;">
                                                <img src="{{ $service->getFirstMediaUrl('img') }}" alt="Service Image" style="max-width: 100px; border-radius: 5px;">
                                            </div>
                                        @endif

                                        <input type="file" class="form-control" name="img">

                                        @error('img')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Specialization <span class="login-danger">*</span></label>
                                        <select class="form-control" name="specialization" required>
                                            <option value="" disabled selected>Select Specialization</option>
                                            @foreach($specializations as $specialization)
                                            <option value="{{ $specialization->id }}"
                                                {{ (old('specialization', $service->specialization_id) == $specialization->id) ? 'selected' : '' }}>
                                                {{ $specialization->name }}
                                            </option>
                                        @endforeach
                                        </select>
                                        @error('specialization')
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
