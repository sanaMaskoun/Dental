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
                        <h3 class="page-title">{{ __('pages.contact_us') }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">{{ __('pages.dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('pages.contact_us') }}</li>
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
                                        <h3 class="page-title">{{ __('pages.contact_us_list') }}</h3>
                                    </div>

                                </div>
                            </div>

                            <div class="table-responsive">
                                <table
                                    class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread">
                                        <tr>
                                            <th>{{ __('pages.name') }}</th>
                                            <th>{{ __('pages.email') }}</th>
                                            <th> {{ __('pages.subject') }}  </th>
                                            <th> {{ __('pages.user_name') }}</th>
                                            <th>{{ __('pages.date') }}  </th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($contacts as $contact)
                                            <tr>

                                                <td>{{ $contact->name }}</td>
                                                <td><strong>{{ $contact->email }}</strong></td>
                                                  <td><strong>{{ $contact->subject }}</strong></td>
                                                  <td><strong>{{ $contact->user->first_name }} {{ $contact->user->last_name }}</strong></td>
                                                  <td><strong>{{ $contact->created_at->format('Y-m-d') }}</strong></td>



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
