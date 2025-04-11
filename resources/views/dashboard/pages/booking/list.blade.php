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
                        <h3 class="page-title">{{ __('pages.bookings') }}</h3>
                        @role('doctor')
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('doctor_dashboard') }}">{{ __('pages.dashboard') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('pages.bookings') }}</li>
                            </ul>
                        @endrole
                        @role('admin')
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">{{ __('pages.dashboard') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('pages.bookings') }}</li>
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
                                        <h3 class="page-title">{{ __('pages.bookings_list') }}</h3>
                                    </div>

                                </div>
                            </div>

                            <div class="table-responsive">
                                <table
                                    class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread">
                                        <tr>
                                            <th>{{ __('pages.patient') }}</th>
                                            <th>{{ __('pages.service') }}</th>
                                            @role('admin')
                                                <th>{{ __('pages.doctor') }}</th>
                                            @endrole
                                            <th>{{ __('pages.start_time') }}</th>
                                            <th>{{ __('pages.end_time') }}</th>
                                            <th>{{ __('pages.payment_method') }}</th>
                                            <th>{{ __('pages.status') }}</th>


                                            @role('doctor')
                                                <th>{{ __('pages.action') }}</th>
                                            @endrole

                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($bookings as $booking)
                                            <tr>

                                                <td>
                                                    {{ $booking->patient->user->first_name }}
                                                    {{ $booking->patient->user->last_name }}
                                                </td>

                                                <td>
                                                    {{ $booking->service->name }}
                                                </td>


                                                @role('admin')
                                                    <td>
                                                        {{ $booking->doctor->user->first_name }}
                                                        {{ $booking->doctor->user->last_name }}
                                                    </td>
                                                @endrole

                                                <td> {{ $booking->start_time }} </td>
                                                <td> {{ $booking->end_time }} </td>
                                                <td>{{ $booking->payment_method == 1 ? __('EnumFile.full') : __('EnumFile.installment') }}</td>
                                                <td> {{ $booking->status == 1 ? __('EnumFile.complete') : __('EnumFile.pending') }} </td>
                                                @role('doctor')
                                                    <td>
                                                        <form action="{{ route('completed_payment', $booking->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit"
                                                                sstyle="
                                                            background-color: green;
                                                            color: white;
                                                            padding: 8px;
                                                        "
                                                                class="btn btn-success">{{ __('pages.compeleted') }}</button>
                                                        </form>

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
