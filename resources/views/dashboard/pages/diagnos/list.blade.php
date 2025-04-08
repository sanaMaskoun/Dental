@extends('dashboard.master.app')

@section('content')
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
                        <h3 class="page-title">Diagnosis</h3>
                        @role('doctor')
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('doctor_dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Diagnosis</li>
                        </ul>
                        @endrole
                        @role('admin')
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Diagnosis</li>
                        </ul>
                        @endrole
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
                                        <h3 class="page-title">Diagnosis List</h3>
                                    </div>

                                </div>
                            </div>

                            <div class="table-responsive">
                                <table
                                    class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread">
                                        <tr>
                                            <th>Diagnosis</th>
                                            <th>note</th>
                                            @role('admin')
                                                <th>Doctor</th>
                                            @endrole
                                            <th>Patient</th>
                                            @role('doctor')
                                            <th>Action</th>
@endrole
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($diagnosis as $diagnos)
                                            <tr>

                                                <td>
                                                    <a href="{{ route('diagnose_details', $diagnos->id) }}">
                                                        <img style="width: 50px;  height: 50px;  margin-right: 7px; border-radius: 50%;"
                                                            src="{{ asset($diagnos->getFirstMediaUrl('diagnosImg')) }}">
                                                        {{ Str::limit($diagnos->diagnose, 50) }}
                                                    </a>

                                                </td>

                                                <td>
                                                    {{ Str::limit($diagnos->notes, 50) }}
                                                    @role('admin')
                                                    <td>
                                                        <a href="{{ route('doctor_details', $diagnos->doctor->user->id) }}">

                                                            {{ $diagnos->doctor->user->first_name }}
                                                            {{ $diagnos->doctor->user->last_name }}
                                                        </a>

                                                    </td>
                                                @endrole
                                                <td>
                                                    <a href="{{ route('patient_details', $diagnos->patient->user->id) }}">

                                                        {{ $diagnos->patient->user->first_name }}
                                                        {{ $diagnos->patient->user->last_name }}
                                                    </a>

                                                </td>
                                                @role('doctor')

                                                <td>
                                                    <a href="{{ route('diagnose_edit', $diagnos->id) }}"
                                                        class="btn btn-sm bg-danger-light">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                    <a href="{{ route('diagnose_delete', $diagnos->id) }}"
                                                        class="btn btn-sm bg-danger-light">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                                @endrole

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
