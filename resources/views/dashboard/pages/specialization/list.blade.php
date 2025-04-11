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
                        <h3 class="page-title">{{ __('pages.specializations') }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">{{ __('pages.dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('pages.specializations') }}</li>
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
                                        <h3 class="page-title">{{ __('pages.specializations_list') }}</h3>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        <a href="{{ route('specialization_create') }}" class="btn btn-primary"><i
                                                class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table
                                    class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread">
                                        <tr>
                                            <th>{{ __('pages.name') }}</th>
                                            <th>{{ __('pages.description') }}</th>

                                            <th>{{ __('pages.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($specializations as $specialization)
                                            <tr>



                                                <td>
                                                    <img style="width: 50px;  height: 50px;  margin-right: 7px; border-radius: 50%;"
                                                    src="{{ asset($specialization->getFirstMediaUrl('img')) }}">

                                                    {{ $specialization->name }}</td>
                                                <td>{{ $specialization->description }}</td>


                                                <td>
                                                    <a href="{{ route('specialization_edit', $specialization->id) }}"
                                                        class="btn btn-sm bg-danger-light">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                    <a href="{{ route('specialization_delete', $specialization->id) }}"
                                                        class="btn btn-sm bg-danger-light">
                                                        <i class="fas fa-trash-alt"></i>
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
