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
                                class="mr-2"><a href="{{ route('home') }}">{{ __('pages.home') }}</a></span> <span>{{ __('pages.specialization_details') }}</span></p>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section testimony-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-2">{{ $specialization->name }}</h2>
                    <span class="subheading">{{ $specialization->description }}</span>
                </div>
            </div>
            <p class="text text-center name" style="color: #203e50; font-size: 20px;">{{ __('pages.services') }}</p>
            <div class="row justify-content-center ftco-animate">
                <div class="col-md-8">
                    <div class="carousel-testimony owl-carousel ftco-owl">

                        @foreach ($specialization->services as $service)
                            <div class="item">
                                <div class="testimony-wrap p-4 pb-5">
                                    <a href="{{ route('service_details', parameters: $service->id) }}">
                                        <div class="user-img mb-5"
                                            style="background-image: url({{ $service->getFirstMediaUrl('img') }})"></div>
                                        <div class="text text-center">
                                            <p class="name">{{ $service->name }}</p>
                                            <p class="mb-5">{{ $service->description }}</p>
                                            <span class="position">{{ $service->price }}</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
