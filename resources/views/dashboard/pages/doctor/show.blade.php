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
                                                <img src="{{ $doctor->getFirstMediaUrl('profile') }}" alt="Profile">
                                                @role('doctor')
                                                    <div class="form-group students-up-files profile-edit-icon mb-0"
                                                        style="bottom: -53px; left: 62rem;">
                                                        <div class="uplod d-flex">
                                                            <label class="file-upload profile-upbtn mb-0">
                                                                <a href="{{ route('doctor_edit_profile', $doctor->id) }}"
                                                                    class="btn">
                                                                    <i class="feather-edit-3"></i>
                                                                </a>
                                                            </label>

                                                        </div>
                                                    </div>
                                                @endrole

                                            </div>
                                            {{--  <div class="names-profiles">
                                                <h4>{{ $doctor->first_name }} {{ $doctor->last_name }}</h4>
                                            </div>  --}}
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="student-personals-grp">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="heading-detail">
                                            <h4>{{ __('pages.personal_details') }} :</h4>
                                        </div>
                                        <div class="personal-activity">
                                            <div class="personal-icons">
                                                <i class="feather-user"></i>
                                            </div>
                                            <div class="views-personal">
                                                <h4>{{ __('pages.name') }} </h4>
                                                <h5>{{ $doctor->first_name }} {{ $doctor->last_name }}</h5>
                                            </div>
                                        </div>

                                        <div class="personal-activity">
                                            <div class="personal-icons">
                                                <i class="feather-phone-call"></i>
                                            </div>
                                            <div class="views-personal">
                                                <h4>{{ __('pages.mobile') }}</h4>
                                                <h5>{{ $doctor->phone }}</h5>
                                            </div>
                                        </div>

                                        <div class="personal-activity">
                                            <div class="personal-icons">
                                                <i class="feather-mail"></i>
                                            </div>
                                            <div class="views-personal">
                                                <h4>{{ __('pages.email') }}</h4>
                                                <h5>{{ $doctor->email }}</a>
                                                </h5>
                                            </div>
                                        </div>

                                        <div class="personal-activity">
                                            <div class="personal-icons">
                                                <i class="fas fa-phone"></i>

                                            </div>
                                            <div class="views-personal">
                                                <h4>{{ __('pages.land_line') }}</h4>
                                                <h5>{{ $doctor->doctor?->land_line }}</h5>
                                            </div>
                                        </div>

                                        <div class="personal-activity">
                                            <div class="personal-icons">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                            <div class="views-personal">
                                                <h4>{{ __('pages.location') }}</h4>
                                                <h5>{{ $doctor->doctor?->location }}</h5>
                                            </div>
                                        </div>

                                        <div class="personal-activity">
                                            <div class="personal-icons">
                                                <i class="fas fa-user-md"></i>
                                            </div>
                                            <div class="views-personal">
                                                <h4>{{ __('pages.years_of_practic') }}</h4>
                                                <h5>{{ $doctor->doctor?->years_of_practice }}</h5>
                                            </div>
                                        </div>

                                        <div class="personal-activity ">
                                            <div class="personal-icons">
                                                <i class="fas fa-calendar-alt"></i>
                                            </div>
                                            <div class="views-personal">
                                                <h4>{{ __('pages.joining_date') }}</h4>
                                                <h5>{{ $doctor->created_at->format('Y-m-d') }}</h5>
                                            </div>
                                        </div>

                                        <div class="personal-activity">
                                            <div class="personal-icons">
                                                <i
                                                    class="fas fa-circle {{ $doctor->is_active == 0 ? 'text-danger' : 'text-success' }}"></i>
                                            </div>
                                            <div class="views-personal">
                                                <h4>Status</h4>
                                                <h5>{{ $doctor->is_active == 0 ? __('pages.Inactive') : __('pages.active') }}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-8">
                            <div class="student-personals-grp">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="heading-detail">
                                            <h4>{{ __('pages.about_me') }}</h4>
                                        </div>
                                        <div class="hello-park">
                                            <h5>{{ __('pages.hello') }} {{ $doctor->first_name }}
                                                {{ $doctor->last_name }}</h5>
                                            <p>{{ $doctor->doctor?->bio }} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="student-personals-grp">
                                    <div class="card mb-0">
                                        <div class="card-body">
                                            <div class="heading-detail">
                                                <h4>{{ __('pages.specializations') }}:</h4>
                                            </div>

                                            <div class="skill-blk">
                                                <div class="skill-statistics">
                                                    <div class="skills-head">
                                                        @foreach ($doctor->doctor?->specializations as $specialization)
                                                            <p>{{ $specialization->name }}</p>
                                                        @endforeach

                                                    </div>

                                                </div>


                                            </div>
                                        </div>
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
