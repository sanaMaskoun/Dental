@extends('dashboard.master.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            {{--  <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Doctor Details</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('doctor_dashboard') }}">Doctors</a></li>
                            <li class="breadcrumb-item active">Doctor Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>  --}}
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="student-profile-head">
                                {{--  <div class="profile-bg-img">
                                <img style="max-height:300px" src="{{ asset('img/medical.webp') }}" alt="Profile">
                            </div>  --}}

                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="profile-user-box">
                                            <div class="profile-user-img">
                                                <img src="{{ $doctor->getFirstMediaUrl('profile') }}" alt="Profile">

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
                                            <h4>Personal Details :</h4>
                                        </div>
                                        <div class="personal-activity">
                                            <div class="personal-icons">
                                                <i class="feather-user"></i>
                                            </div>
                                            <div class="views-personal">
                                                <h4>Name </h4>
                                                <h5>{{ $doctor->first_name }} {{ $doctor->last_name }}</h5>
                                            </div>
                                        </div>

                                        <div class="personal-activity">
                                            <div class="personal-icons">
                                                <i class="feather-phone-call"></i>
                                            </div>
                                            <div class="views-personal">
                                                <h4>Mobile</h4>
                                                <h5>{{ $doctor->phone }}</h5>
                                            </div>
                                        </div>

                                        <div class="personal-activity">
                                            <div class="personal-icons">
                                                <i class="feather-mail"></i>
                                            </div>
                                            <div class="views-personal">
                                                <h4>Email</h4>
                                                <h5>{{ $doctor->email }}</a>
                                                </h5>
                                            </div>
                                        </div>

                                        <div class="personal-activity">
                                            <div class="personal-icons">
                                                <i class="fas fa-phone"></i>

                                            </div>
                                            <div class="views-personal">
                                                <h4>land line</h4>
                                                <h5>{{ $doctor->doctor->land_line }}</h5>
                                            </div>
                                        </div>

                                        <div class="personal-activity">
                                            <div class="personal-icons">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                            <div class="views-personal">
                                                <h4>lcation</h4>
                                                <h5>{{ $doctor->doctor->location }}</h5>
                                            </div>
                                        </div>

                                        <div class="personal-activity">
                                            <div class="personal-icons">
                                                <i class="fas fa-user-md"></i>
                                            </div>
                                            <div class="views-personal">
                                                <h4>years f practice</h4>
                                                <h5>{{ $doctor->doctor->years_of_practice }}</h5>
                                            </div>
                                        </div>

                                        <div class="personal-activity ">
                                            <div class="personal-icons">
                                                <i class="fas fa-calendar-alt"></i>
                                            </div>
                                            <div class="views-personal">
                                                <h4>Joining Date</h4>
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
                                                <h5>{{ $doctor->is_active == 0 ? 'Inactive' : 'Active' }}</h5>
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
                                            <h4>About Me</h4>
                                        </div>
                                        <div class="hello-park">
                                            <h5>Hello I am Dr. {{ $doctor->first_name }} {{ $doctor->last_name }}</h5>
                                            <p>{{ $doctor->doctor->bio }} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="student-personals-grp">
                                    <div class="card mb-0">
                                        <div class="card-body">
                                            <div class="heading-detail">
                                                <h4>Specializations:</h4>
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
