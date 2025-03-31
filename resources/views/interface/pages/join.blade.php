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
                                class="mr-2"><a href="{{ route('home') }}">Home</a></span></p>
                        <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Join Us</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section ftco-degree-bg">
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                <div class="col-md-12 mb-4">
                    <h2 class="h4">Join Information</h2>
                </div>

            </div>

            <div class="row block-9">
                <div class="col-md-6 pr-md-5">
                    <form action="{{ route('join_store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Your Name">
                            @error('name')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Your Email">
                            @error('email')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" placeholder="Subject">
                            @error('subject')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" placeholder="Phone">
                            @error('phone')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                        </div>



                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </section>
@endsection
