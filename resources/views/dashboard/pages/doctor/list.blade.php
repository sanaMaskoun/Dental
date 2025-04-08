@extends('dashboard.master.app')

@section('content')

    <head>
        <style>
            .switch {
                position: relative;
                display: inline-block;
                width: 40px;
                height: 20px;
                margin-bottom: 0;
            }

            .switch input {
                display: none;
            }

            .slider {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                border-radius: 34px;
                transition: .4s;
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 14px;
                width: 14px;
                left: 3px;
                bottom: 3px;
                background-color: white;
                border-radius: 50%;
                transition: .4s;
            }

            input:checked+.slider {
                background-color: #2ecc71;
            }

            input:checked+.slider:before {
                transform: translateX(20px);
            }

            .slider.round {
                border-radius: 34px;
            }

            .slider.round:before {
                border-radius: 50%;
            }
        </style>
    </head>




    <div class="page-wrapper">
        <div class="content container-fluid">
            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif


            @if (Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Doctors</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Doctors</li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">

                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">Doctors List</h3>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        <a href="{{ route('doctor_create') }}" class="btn btn-primary"><i
                                                class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table
                                    class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread">
                                        <tr>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Joining Date</th>
                                            <th> status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($doctors as $doctor)
                                            <tr>

                                                <td>
                                                    <a href="{{ route('doctor_details', $doctor->id) }}">
                                                        <img style="width: 50px;  height: 50px;  margin-right: 7px; border-radius: 50%;"
                                                            src="{{ asset($doctor->getFirstMediaUrl('profile')) }}">
                                                        {{ $doctor->first_name }} {{ $doctor->last_name }}
                                                    </a>

                                                </td>

                                                <td>{{ $doctor->phone }}</td>
                                                <td>{{ $doctor->email }}</td>
                                                <td>{{ $doctor->created_at->format('Y-m-d') }}</td>

                                                <td>
                                                    <form method="POST" action="{{ route('toggleStatus', $doctor->id) }}">
                                                        @csrf
                                                        <label class="switch">
                                                            <input type="checkbox" name="status"
                                                                onchange="this.form.submit()"
                                                                {{ $doctor->is_active ? 'checked' : '' }}>
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </form>
                                                </td>


                                                <td>
                                                    <a href="{{ route('doctor_edit', $doctor->id) }}"
                                                        class="btn btn-sm bg-danger-light">
                                                        <i class="feather-edit"></i>
                                                    </a>

                                                </td>


                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
