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
                        <h3 class="page-title">{{__('pages.reject')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">{{__('pages.dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('pages.reject')}}</li>
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
                                        <h3 class="page-title">{{__('pages.reject_list')}}</h3>
                                    </div>

                                </div>
                            </div>

                            <div class="table-responsive">
                                <table
                                    class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread">
                                        <tr>
                                            <th>{{__('pages.name')}}</th>
                                            <th>{{__('pages.email')}}</th>
                                            <th> {{__('pages.subject')}}</th>
                                            <th> {{__('pages.mobile')}} </th>
                                            <th>{{__('pages.admin')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($rejects as $reject)
                                            <tr>

                                                <td>{{ $reject->name }}</td>
                                                <td><strong>{{ $reject->email }}</strong></td>
                                                  <td><strong>{{ $reject->subject }}</strong></td>
                                                  <td><strong>{{ $reject->phone }}</strong></td>
                                                  <td><strong>{{ $reject->user->first_name }} {{ $reject->user->last_name }}</strong></td>



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
