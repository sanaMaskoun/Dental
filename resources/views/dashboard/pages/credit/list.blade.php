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
                                <table
                                    class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
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

                                                <td><strong>{{ $credit->patient?->user->first_name }}
                                                        {{ $credit->patient?->user->last_name }}</strong></td>
                                                <td><strong>{{ $credit->amount }}</strong></td>

                                                <td>
                                                    <img style="width: 39px; height: 39px; border-radius: 50%; margin-right: 7px; cursor: pointer;"
                                                        src="{{ asset($credit->getFirstMediaUrl('link')) }}"
                                                        data-toggle="modal" data-target="#imageModal"
                                                        onclick="showModalImage('{{ asset($credit->getFirstMediaUrl('link')) }}')">
                                                </td>



                                                <td>
                                                    <div style="display: flex;">
                                                        <form action="{{ route('accept_payment', $credit->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit"
                                                                style=" background-color: rgb(193, 244, 205); "
                                                                class="btn btn-success">accepte</button>
                                                        </form>

                                                        <form style="margin-left: 10px;"
                                                            action="{{ route('reject_payment', $credit->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit"
                                                                style="   background-color: rgb(241, 160, 160);
                                                                border: 1px solid red;"
                                                                class="btn btn-danger">reject</button>
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

            <div class="modal fade" id="imageModal" style="z-index: 9999;" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">photo </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <img id="modalImage" style="max-width: 100%;" src="" alt="photo ">
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <script>
        function showModalImage(imageUrl) {
            $('#modalImage').attr('src', imageUrl);
        }
    </script>
@endsection
