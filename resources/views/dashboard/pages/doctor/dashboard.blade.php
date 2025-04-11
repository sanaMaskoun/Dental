@extends('dashboard.master.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">{{ __('pages.welcome_doctor') }}</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('pages.home') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('pages.doctor') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>{{ __('pages.patients') }}</h6>
                                    <h3>{{ $num_patients }}</h3>
                                </div>
                                <div class="db-icon">
                                    <i class="fas fa-user-injured" style="color: black;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>{{ __('pages.specializations') }}</h6>
                                    <h3>{{ $num_specializations }}</h3>
                                </div>
                                <div class="db-icon">
                                    <i class="fas fa-user-md" style="color: black;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>{{ __('pages.services') }}</h6>
                                    <h3>{{ $num_services }}</h3>

                                </div>
                                <div class="db-icon">
                                    <i class="fas fa-hand-holding-medical" style="color: black;"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>{{ __('pages.incoms') }}</h6>
                                    <h3>{{ $doctor_earnings }}</h3>

                                </div>
                                <div class="db-icon">
                                    <i class="fas fa-money-bill-alt" style="color: black;"></i>
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
                                <h5 class="card-title">{{ __('pages.overview') }}</h5>
                            </div>
                            <div class="col-6">
                                <ul class="chart-list-out">
                                    <li><span class="circle-green"></span>{{ __('pages.patients') }}</li>
                                    <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="patients-chart"></div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.35.0/dist/apexcharts.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var options = {
            series: [{
                name: '{{ __('pages.patients') }}',
                data: @json(array_values($patients_data))
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            colors: ['#3F80EA'],
            xaxis: {
                categories: @json(array_values($months))
            },
            tooltip: {
                y: {
                    formatter: function(value) {
                        return value + ' patient(s)';
                    }
                }
            }
        };

        var chart = new ApexCharts(document.getElementById("patients-chart"), options);
        chart.render();
    });
    </script>
@endsection
