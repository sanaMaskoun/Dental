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
                  href="{{ route('home') }}">Home</a></span> <span>About</span></p>
            <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">About Us</h1>
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
                  role="tab" aria-controls="v-pills-whatwedo" aria-selected="true">What we do</a>

                <a class="nav-link" id="v-pills-mission-tab" data-toggle="pill" href="#v-pills-mission" role="tab"
                  aria-controls="v-pills-mission" aria-selected="false">Our mission</a>

                <a class="nav-link" id="v-pills-goal-tab" data-toggle="pill" href="#v-pills-goal" role="tab"
                  aria-controls="v-pills-goal" aria-selected="false">Our goal</a>
              </div>
            </div>
            <div class="col-md-12 d-flex align-items-center">

              <div class="tab-content ftco-animate" id="v-pills-tabContent">

                <div class="tab-pane fade show active" id="v-pills-whatwedo" role="tabpanel"
                  aria-labelledby="v-pills-whatwedo-tab">
                  <div>
                    <h2 class="mb-4">We Offer High Quality Services</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                      live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a
                      large language ocean.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste
                      dolores consequatur</p>
                  </div>
                </div>

                <div class="tab-pane fade" id="v-pills-mission" role="tabpanel" aria-labelledby="v-pills-mission-tab">
                  <div>
                    <h2 class="mb-4">To Accomodate All Patients</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                      live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a
                      large language ocean.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste
                      dolores consequatur</p>
                  </div>
                </div>

                <div class="tab-pane fade" id="v-pills-goal" role="tabpanel" aria-labelledby="v-pills-goal-tab">
                  <div>
                    <h2 class="mb-4">Help Our Customers Needs</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                      live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a
                      large language ocean.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste
                      dolores consequatur</p>
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
              <h2 class="mb-2">Dentacare with a personal touch</h2>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            </div>
            <div class="list-services d-flex ftco-animate">
              <div class="icon d-flex justify-content-center align-items-center">
                <span class="icon-check2"></span>
              </div>
              <div class="text">
                <h3>Well Experience Dentist</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                  the blind texts.</p>
              </div>
            </div>
            <div class="list-services d-flex ftco-animate">
              <div class="icon d-flex justify-content-center align-items-center">
                <span class="icon-check2"></span>
              </div>
              <div class="text">
                <h3>High Technology Facilities</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                  the blind texts.</p>
              </div>
            </div>
            <div class="list-services d-flex ftco-animate">
              <div class="icon d-flex justify-content-center align-items-center">
                <span class="icon-check2"></span>
              </div>
              <div class="text">
                <h3>Comfortable Clinics</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                  the blind texts.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url({{ asset('interface/images/bg_1.jpg') }});"
    data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-md-3 aside-stretch py-5">
          <div class=" heading-section heading-section-white ftco-animate pr-md-4">
            <h2 class="mb-3">Achievements</h2>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>
        </div>
        <div class="col-md-9 py-5 pl-md-5">
          <div class="row">
            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
              <div class="block-18">
                <div class="text">
                  <strong class="number" data-number="14">0</strong>
                  <span>Years of Experience</span>
                </div>
              </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
              <div class="block-18">
                <div class="text">
                  <strong class="number" data-number="4500">0</strong>
                  <span>Qualified Dentist</span>
                </div>
              </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
              <div class="block-18">
                <div class="text">
                  <strong class="number" data-number="4200">0</strong>
                  <span>Happy Smiling Customer</span>
                </div>
              </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
              <div class="block-18">
                <div class="text">
                  <strong class="number" data-number="320">0</strong>
                  <span>Patients Per Year</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
