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
                                class="mr-2"><a href="{{ route('home') }}">{{ __('pages.home') }}</a></span> <span>{{ __('pages.services') }}</span></p>
                        <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">{{ __('pages.title_1_service') }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-2">{{ __('pages.title_1_service') }}</h2>
                    <p>{{ __('pages.description_doctors') }}.</p>
                </div>
            </div>

            <div class="row">
                @foreach ($services as $service)
                    <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services d-block text-center">
                            <a href="{{ route('service_details', $service->id) }}">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <img style="width: 150px;  height: 150px;  margin-right: 7px; border-radius: 50%;"
                                        src="{{ $service->getFirstMediaUrl('img') }}"> </span>
                                </div>
                                <div class="media-body p-2 mt-3">
                                    <h3 class="heading">{{ $service->name }}</h3>
                                    <p>{{ __('pages.price') }}: {{ $service->price }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </section>
@endsection
