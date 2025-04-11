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
                  href="{{ route('home') }}">{{ __('pages.home') }}</a></span> <span>{{ __('pages.about') }}</span></p>
            <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">{{ __('pages.about') }}</h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="container">
      <div class="row d-md-flex">
        <div class="col-md-6 ftco-animate img about-image order-md-last"
          style="background-image: url({{ asset('interface/images/about.jpg') }});">
        </div>

        <div class="col-md-6 ftco-animate pr-md-5 order-md-first">
          <div class="row">
            <div class="col-md-12 nav-link-wrap mb-5">
              <div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-whatwedo-tab" data-toggle="pill" href="#v-pills-whatwedo"
                  role="tab" aria-controls="v-pills-whatwedo" aria-selected="true">{{ __('pages.tab_1') }}</a>

                <a class="nav-link" id="v-pills-mission-tab" data-toggle="pill" href="#v-pills-mission" role="tab"
                  aria-controls="v-pills-mission" aria-selected="false">{{ __('pages.tab_2') }}</a>

                <a class="nav-link" id="v-pills-goal-tab" data-toggle="pill" href="#v-pills-goal" role="tab"
                  aria-controls="v-pills-goal" aria-selected="false">{{ __('pages.tab_3') }}</a>
              </div>
            </div>
            <div class="col-md-12 d-flex align-items-center">

              <div class="tab-content ftco-animate" id="v-pills-tabContent">

                <div class="tab-pane fade show active" id="v-pills-whatwedo" role="tabpanel"
                  aria-labelledby="v-pills-whatwedo-tab">
                  <div>
                    <h2 class="mb-4">{{ __('pages.title_tab_1') }}</h2>
                    <p>{{ __('pages.description_1_tab') }}</p>
                    <p>{{ __('pages.description_2_tab') }}</p>
                  </div>
                </div>

                <div class="tab-pane fade" id="v-pills-mission" role="tabpanel" aria-labelledby="v-pills-mission-tab">
                  <div>
                    <h2 class="mb-4">{{ __('pages.title_tab_2') }}</h2>
                    <p>{{ __('pages.description_1_tab') }}</p>
                    <p>{{ __('pages.description_2_tab') }}</p>
                  </div>
                </div>

                <div class="tab-pane fade" id="v-pills-goal" role="tabpanel" aria-labelledby="v-pills-goal-tab">
                  <div>
                    <h2 class="mb-4">{{ __('pages.title_tab_3') }}</h2>
                    <p>{{ __('pages.description_1_tab') }}</p>
                    <p>{{ __('pages.description_2_tab') }}r</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section-2">
    <div class="container-wrap">
      <div class="row d-flex no-gutters">
        <div class="col-md-6 img" style="background-image: url({{ asset('interface/images/about-2.jpg') }});">
        </div>
        <div class="col-md-6 d-flex">
          <div class="about-wrap">
            <div class="heading-section heading-section-white mb-5 ftco-animate">
              <h2 class="mb-2">{{__('pages.title_section_2')}}</h2>
              <p>{{ __('pages.description_section_2') }}</p>
            </div>
            <div class="list-services d-flex ftco-animate">
              <div class="icon d-flex justify-content-center align-items-center">
                <span class="icon-check2"></span>
              </div>
              <div class="text">
                <h3>{{ __('pages.title_2_section_2') }}</h3>
                <p>{{ __('pages.description_section_2') }}</p>
              </div>
            </div>
            <div class="list-services d-flex ftco-animate">
              <div class="icon d-flex justify-content-center align-items-center">
                <span class="icon-check2"></span>
              </div>
              <div class="text">
                <h3>{{ __('pages.title_3_section_2') }}</h3>
                <p>{{ __('pages.description_section_2') }}</p>
              </div>
            </div>
            <div class="list-services d-flex ftco-animate">
              <div class="icon d-flex justify-content-center align-items-center">
                <span class="icon-check2"></span>
              </div>
              <div class="text">
                <h3>{{ __('pages.title_4_section_2') }}</h3>
                <p>{{ __('pages.description_section_2') }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  
@endsection
