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
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('doctor_dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Diagnosis</li>
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
                                            <th>Doctor</th>
                                            <th>Patient</th>
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

                                                <td>{{ $diagnos->doctor->user->first_name }} {{ $diagnos->doctor->user->last_name }}</td>
                                                <td>{{ $diagnos->patient->user->first_name }} {{ $diagnos->patient->user->last_name }}</td>


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
