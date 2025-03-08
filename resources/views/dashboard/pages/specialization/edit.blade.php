
@extends('dashboard.master.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Edit Specialization </h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('doctor_dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Specialization</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('specialization_update',$specialization->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                
                               

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label> Specialization Name <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{$specialization->name}}" >
                                        @error('name')
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