@extends('dashboard.master.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            @if ($message = Session::get('success'))
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                </div>
            @endif
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Credit </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Credit</li>
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
                                        <h3 class="page-title">Credits List</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread">
                                        <tr>
                                            <th>User name </th>
                                            <th>Balance</th>
                                            <th> link</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($credits as $credit)
                                            <tr>
                                                <td><strong>{{ $credit->patient?->user->first_name }} {{ $credit->patient?->user->last_name }}</strong></td>
                                                <td><strong>{{ $credit->amount }}</strong></td>
                                                <td>
                                                    <a href="{{ asset($credit->getFirstMediaUrl('link')) }}" data-lightbox="image-{{ $credit->id }}">
                                                        <img style="width: 39px; height: 39px; border-radius: 50%; margin-right: 7px; cursor: pointer;"
                                                             src="{{ asset($credit->getFirstMediaUrl('link')) }}"
                                                             alt="photo">
                                                    </a>
                                                </td>
                                                <td>
                                                    <div style="display: flex;">
                                                        <form action="{{ route('accept_payment', $credit->id) }}" method="post">
                                                            @csrf
                                                            <button type="submit" style="background-color: rgb(193, 244, 205);" class="btn btn-success">accepte</button>
                                                        </form>
                                                        <form style="margin-left: 10px;" action="{{ route('reject_payment', $credit->id) }}" method="post">
                                                            @csrf
                                                            <button type="submit" style="background-color: rgb(241, 160, 160); border: 1px solid red;" class="btn btn-danger">reject</button>
                                                        </form>
                                                    </div>
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

    <!-- Lightbox CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <!-- Lightbox JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
@endsection
