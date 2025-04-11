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
                                                <div class="form-group students-up-files profile-edit-icon mb-0">
                                                    <div class="uplod d-flex">
                                                        <label for="profile" class="btn">
                                                            <i class="feather-edit-3"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{ route('doctor_update_profile', $doctor->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="file" id="profile" name="profile" accept="image/*" style="display: none;">

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
                                                            <input type="text" name="first_name" class="form-control" value="{{ $doctor->first_name }}">
                                                            <input type="text" name="last_name" class="form-control mt-2" value="{{ $doctor->last_name }}">
                                                        </div>
                                                    </div>

                                                    <div class="personal-activity">
                                                        <div class="personal-icons">
                                                            <i class="feather-phone-call"></i>
                                                        </div>
                                                        <div class="views-personal">
                                                            <h4>{{ __('pages.mobile') }}</h4>
                                                            <input type="text" name="phone" class="form-control" value="{{ $doctor->phone }}">
                                                        </div>
                                                    </div>

                                                    <div class="personal-activity">
                                                        <div class="personal-icons">
                                                            <i class="feather-mail"></i>
                                                        </div>
                                                        <div class="views-personal">
                                                            <h4>{{ __('pages.email') }}</h4>
                                                            <input type="email" name="email" class="form-control" value="{{ $doctor->email }}">
                                                        </div>
                                                    </div>

                                                    <div class="personal-activity">
                                                        <div class="personal-icons">
                                                            <i class="fas fa-phone"></i>
                                                        </div>
                                                        <div class="views-personal">
                                                            <h4>{{ __('pages.land_line') }}</h4>
                                                            <input type="text" name="land_line" class="form-control" value="{{ $doctor->doctor->land_line }}">
                                                        </div>
                                                    </div>

                                                    <div class="personal-activity">
                                                        <div class="personal-icons">
                                                            <i class="fas fa-map-marker-alt"></i>
                                                        </div>
                                                        <div class="views-personal">
                                                            <h4>{{ __('pages.location') }}</h4>
                                                            <input type="text" name="location" class="form-control" value="{{ $doctor->doctor->location }}">
                                                        </div>
                                                    </div>

                                                    <div class="personal-activity">
                                                        <div class="personal-icons">
                                                            <i class="fas fa-user-md"></i>
                                                        </div>
                                                        <div class="views-personal">
                                                            <h4>{{ __('pages.years_of_practic') }}</h4>
                                                            <input type="number" name="years_of_practice" class="form-control" value="{{ $doctor->doctor->years_of_practice }}">
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
                                                            <i class="fas fa-circle {{ $doctor->is_active == 0 ? 'text-danger' : 'text-success' }}"></i>
                                                        </div>
                                                        <div class="views-personal">
                                                            <h4>{{ __('pages.status') }}</h4>
                                                            <h5>{{ $doctor->is_active == 0 ? __('pages.inactive') : __('pages.active') }}</h5>
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
                                                    <div class="hello-park mb-3">
                                                        <textarea name="bio" class="form-control">{{ $doctor->doctor->bio }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="student-personals-grp">
                                                <div class="card mb-0">
                                                    <div class="card-body">
                                                        <div class="heading-detail">
                                                            <h4>{{ __('pages.services') }}:</h4>
                                                        </div>

                                                        <div class="skill-blk">
                                                            <div class="skill-statistics">
                                                                <div class="row">
                                                                    @foreach ($services as $index => $service)
                                                                        <div class="col-md-3">
                                                                            <div class="form-check">
                                                                                <input type="checkbox" name="services[]" value="{{ $service->id }}" {{ in_array($service->id, $selected_services) ? 'checked' : '' }}>
                                                                                <label>{{ $service->name }}</label>
                                                                            </div>
                                                                        </div>
                                                                        @if (($index + 1) % 4 == 0)
                                                                </div>
                                                                <div class="row">
                                                                    @endif
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3">{{ __('pages.save_changes') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
