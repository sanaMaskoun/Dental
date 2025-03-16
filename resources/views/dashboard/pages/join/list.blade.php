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
                        <h3 class="page-title">Join Us</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Join Us</li>
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
                                        <h3 class="page-title">Join Us List</h3>
                                    </div>

                                </div>
                            </div>

                            <div class="table-responsive">
                                <table
                                    class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread">
                                        <tr>
                                            <th>name</th>
                                            <th>Email</th>
                                            <th> subject</th>
                                            <th> mobile </th>
                                            <th> Date  </th>

                                            <th>actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($joins as $join)
                                            <tr>

                                                <td>{{ $join->name }}</td>
                                                <td><strong>{{ $join->email }}</strong></td>
                                                  <td><strong>{{ $join->subject }}</strong></td>
                                                  <td><strong>{{ $join->phone }}</strong></td>
                                                  <td><strong>{{ $join->created_at->format('Y-m-d') }}</strong></td>

                                                  <td>
                                                      <div style="display: flex;">
                                                          <form
                                                              action="{{ route('join_approve', $join->id) }}"
                                                              method="post" style="    margin-left: 20px;">
                                                              @csrf
                                                              <button type="submit"
                                                                  style=" background-color: rgb(193, 244, 205);"
                                                                  class="btn btn-success">accepte</button>
                                                          </form>

                                                          <form
                                                              action="{{ route('join_reject', $join->id) }}"
                                                              method="post" style="margin-left: 10px">
                                                              @csrf
                                                              <button type="submit"
                                                                  style="    background-color: rgb(241, 160, 160);
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
        </div>



    </div>
@endsection
