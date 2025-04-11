@extends('interface.master.app')

@section('interface')
<section class="home-slider owl-carousel">
    <div class="slider-item bread-item" style="background-image: url('{{ asset('interface/images/bg_1.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" data-scrollax-parent="true">
            <div class="row slider-text align-items-end">
                <div class="col-md-7 col-sm-12 ftco-animate mb-5">
                    <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span
                            class="mr-2"><a href="{{ route('home') }}">{{ __('pages.home') }}</a></span> <span>{{ __('pages.doctors') }}</span></p>
                    <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">{{ __('pages.title_doctors') }}</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <h2 class="mb-3">{{ __('pages.title_2_doctors') }}</h2>
                <p>{{ __('pages.description_doctors') }}</p>
            </div>
        </div>
        <div class="row">

            @foreach ($doctors as $doctor)
            <div class="col-lg-3 col-md-6 d-flex mb-sm-4 ftco-animate">
                <div class="staff">
                    <a href="{{ route('doctor_view' , $doctor->id) }}">
                    <div class="img mb-4" style="background-image: url({{ $doctor->getFirstMediaUrl('profile') }});"></div>
                    <div class="info text-center">
                        <h3>{{ $doctor->first_name }} {{ $doctor->last_name }}</h3>
                        <div class="text">
                            <p>{{ $doctor->doctor->location }}</p>

                        </div>

                    </div>
                </a>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</section>

@endsection
