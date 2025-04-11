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
                        <h3 class="page-title">{{__('pages.payments')}}</h3>
                        @role('doctor')
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('doctor_dashboard') }}">{{__('pages.dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('pages.payments')}}</li>
                        </ul>
                        @endrole
                        @role('admin')
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">{{__('pages.dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('pages.payments')}}</li>
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
                                        <h3 class="page-title">{{__('pages.payments_list')}}</h3>
                                    </div>

                                </div>
                            </div>

                            <div class="table-responsive">
                                <table
                                    class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread">
                                        <tr>
                                            <th>{{__('pages.patient')}}</th>
                                            <th>{{__('pages.service')}}</th>

                                            <th>{{__('pages.amount')}}</th>


                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($payments as $payment)
                                            <tr>

                                                <td>
                                                    {{ $payment->booking->patient->user->first_name }}
                                                    {{ $payment->booking->patient->user->last_name }}
                                                </td>

                                                <td>
                                                    {{ $payment->booking->service->name }}
                                                </td>




                                                <td> {{ $payment->amount }} </td>


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
