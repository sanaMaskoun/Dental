@extends('dashboard.master.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Welcome Doctor!</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Doctor</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-xl-4 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Patient</h6>
                                    <h3>{{ $num_patients }}</h3>
                                </div>
                                <div class="db-icon">
                                    <i class="fas fa-user-injured" style="color: black;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>specialization</h6>
                                    <h3>{{ $num_specializations }}</h3>
                                </div>
                                <div class="db-icon">
                                    <i class="fas fa-user-md" style="color: black;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>services</h6>
                                    <h3>{{ $num_services }}</h3>

                                </div>
                                <div class="db-icon">
                                    <i class="fas fa-hand-holding-medical" style="color: black;"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12">

                <div class="card card-chart">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title">Overview</h5>
                            </div>
                            <div class="col-6">
                                <ul class="chart-list-out">
                                    <li><span class="circle-green"></span>Patients</li>
                                    <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="registrations-chart"></div>
                                     </div>
                </div>

            </div>

        </div>

    </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var options = {
                series: [{
                    name: 'Doctors',
                    data: @json(array_values($doctorsData))
                }, {
                    name: 'Patients',
                    data: @json(array_values($patientsData))
                }],
                chart: {
                    type: 'area',
                    height: 350,
                    toolbar: { show: true }
                },
                colors: ['#3F80EA', '#66CB9F'],
                dataLabels: { enabled: false },
                stroke: { curve: 'smooth' },
                xaxis: {
                    categories: @json(array_values($months)),
                    labels: { trim: false }
                },
                tooltip: {
                    x: { format: 'MMM' }
                }
            };

            var chart = new ApexCharts(document.getElementById("registrations-chart"), options);
            chart.render();
        });
        </script>
@endsection
