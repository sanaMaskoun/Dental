@extends('dashboard.master.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Add Service </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('doctor_dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Service</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('service_store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label> Service Name <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ old('name') }}" placeholder="Enter Service Name">
                                            @error('name')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-12 col-sm-4">

                                        <div class="form-group local-forms">
                                            <label> Description <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="description"
                                                value="{{ old('description') }}" placeholder="Enter Service description">
                                            @error('description')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label> Price <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="price"
                                                value="{{ old('price') }}" placeholder="Enter Price">
                                            @error('price')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label> Service pictures <span class="login-danger">*</span></label>
                                            <input type="file" class="form-control" name="img"
                                                placeholder="Enter Service Picture">
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
                                                @foreach ($specializations as $specialization)
                                                    <option value="{{ $specialization->id }}"
                                                        {{ old('specialization') == $specialization->id ? 'selected' : '' }}>
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
