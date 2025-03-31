@extends('interface.master.app')

@section('interface')

<section class="home-slider owl-carousel">
    <div class="slider-item bread-item" style="background-image: url('{{ asset('interface/images/bg_1.jpg') }}');"
      data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container" data-scrollax-parent="true">
        <div class="row slider-text align-items-end">
          <div class="col-md-7 col-sm-12 ftco-animate mb-5">
            <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a
                  href="{{ route('home') }}">Home</a></span> <span>FAQ</span></p>
            <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Read Our FAQ</h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="row">
            @foreach ($faqs as $faq )

            <div class="col-md-12 ftco-animate">
                <div class="blog-entry">
                  <div class="text d-flex py-4">
                    <div class="meta mb-3">
                      <div><a href="#"></a>{{ $faq->created_at->format('Y-m-d') }}</div>
                      <div><a href="#">{{ $faq->user->first_name }} {{ $faq->user->last_name }}</a></div>
                    </div>
                    <div class="desc pl-sm-3 pl-md-5">
                      <h3 class="heading"><a href="#">{{ $faq->question }}</a></h3>
                      <p>{{ $faq->answer }}</p>
                    </div>
                  </div>
                </div>

              </div>
            @endforeach



          </div>

        </div>

      </div>
    </div>
  </section>
@endsection
