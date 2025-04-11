
@extends('dashboard.master.app')

@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="student-profile-head">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="profile-user-box">
                                            <div class="profile-user-img">
                                                <img src="{{ $patient->getFirstMediaUrl('profile') }}" alt="Profile">
                                            </div>

                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="student-personals-grp">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="heading-detail">
                                            <h4>{{__('pages.personal_details')}}</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="personal-activity">
                                                    <div class="personal-icons">
                                                        <i class="feather-user"></i>
                                                    </div>
                                                    <div class="views-personal">
                                                        <h4>{{__('pages.name')}}</h4>
                                                        <h5>{{ $patient->first_name }} {{ $patient->last_name }}</h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="personal-activity">
                                                    <div class="personal-icons">
                                                        <i class="feather-phone-call"></i>
                                                    </div>
                                                    <div class="views-personal">
                                                        <h4>{{__('pages.mobile')}}</h4>
                                                        <h5>{{ $patient->phone }}</h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="personal-activity">
                                                    <div class="personal-icons">
                                                        <i class="feather-mail"></i>
                                                    </div>
                                                    <div class="views-personal">
                                                        <h4>{{__('pages.email')}}</h4>
                                                        <h5>{{ $patient->email }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="personal-activity">
                                                    <div class="personal-icons">
                                                        <i class="fa fa-wallet"></i>
                                                    </div>
                                                    <div class="views-personal">
                                                        <h4>{{__('pages.account')}}</h4>
                                                        <h5>{{ $patient->patient->account }}</h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="personal-activity">
                                                    <div class="personal-icons">
                                                        <i class="fas fa-calendar-alt"></i>
                                                    </div>
                                                    <div class="views-personal">
                                                        <h4>{{__('pages.joining_date')}}</h4>
                                                        <h5>{{ $patient->created_at->format('Y-m-d') }}</h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="personal-activity">
                                                    <div class="personal-icons">
                                                        <i class="fas fa-circle {{ $patient->is_active == 0 ? 'text-danger' : 'text-success' }}"></i>
                                                    </div>
                                                    <div class="views-personal">
                                                        <h4>{{__('pages.status')}}</h4>
                                                        <h5>{{ $patient->is_active == 0 ? __('pages.inactive') : __('pages.active') }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="student-personals-grp">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="heading-detail">
                                            <h4>{{__('pages.diagnosis_history')}}</h4>
                                        </div>

                                        @isset($patient->patient->diagnoses)
                                            <div class="row flex-nowrap overflow-auto" style="gap: 15px;">
                                                @forelse ($patient->patient->diagnoses as $diagnosis)
                                                    <div class="col-sm-6 col-lg-4 col-xl-3 d-flex">
                                                        <div class="card invoices-grid-card w-100">
                                                            <div class="card-middle">
                                                                <h2 class="card-middle-avatar">

                                                                        <img class="avatar avatar-sm me-2 avatar-img rounded-circle"
                                                                            src="{{ asset('img/diagnoses.webp') }}" alt="User Image">
                                                                        {{ Str::limit($diagnosis->diagnose, 50) }}

                                                                </h2>
                                                            </div>

                                                            <div class="card-body">
                                                                <div class="row align-items-center">
                                                                    <div class="col">
                                                                        <span><i class="fas fa-stethoscope"></i> {{__('pages.doctor')}}</span>
                                                                        <h6 class="mb-0">{{ $diagnosis->doctor->user->first_name }} {{ $diagnosis->doctor->user->last_name }}</h6>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <span><i class="far fa-calendar-alt"></i> {{__('pages.due_date')}}</span>
                                                                        <h6 class="mb-0">{{ $diagnosis->created_at->format('Y-m-d') }}</h6>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card-footer">
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto">
                                                                      <a href="{{ route('diagnose_details' ,$diagnosis->id) }}">
                                                                        <span class="badge bg-success-dark">{{__('pages.more')}} ..</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <p class="text-muted">{{__('pages.no_diagnoses_found.')}}</p>
                                                @endforelse
                                            </div>
                                        @endisset
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
@endsection
