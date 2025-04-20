
<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-4">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">DentaCare.</h2>
            <p>{{ __('pages.description_footer') }}</p>
          </div>
          <ul class="ftco-footer-social list-unstyled float-md-left float-lft ">
            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
          </ul>
        </div>

        <div class="col-md-4">
          <div class="ftco-footer-widget mb-4 ml-md-5">
            <h2 class="ftco-heading-2">{{ __('pages.quick_links') }}</h2>
            <ul class="list-unstyled">
              <li><a href="{{ route('home') }}" class="py-2 d-block">{{ __('pages.home') }}</a></li>
              <li><a href="{{ route('about') }}" class="py-2 d-block">{{ __('pages.about') }}</a></li>
              <li><a href="{{ route('service') }}" class="py-2 d-block">{{ __('pages.service') }}</a></li>
              <li><a href="{{ route('doctor') }}" class="py-2 d-block">{{ __('pages.doctors') }}</a></li>
              <li><a href="{{ route('faq') }}" class="py-2 d-block">{{ __('pages.faq') }}</a></li>
              <li><a href="{{ route('contact') }}" class="py-2 d-block">{{ __('pages.contact_us') }}</a></li>
              <li><a href="{{ route('join') }}" class="py-2 d-block">{{ __('pages.join_us') }}</a></li>
            </ul>
          </div>
        </div>


        <div class="col-md-4">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">{{ __('pages.office') }}</h2>
            <div class="block-23 mb-3">
              <ul>
                <li><span class="icon icon-map-marker"></span><span class="text">{{ __('pages.location_footer') }}</span></li>
                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                <li><a href="#"><span class="icon icon-envelope"></span><span
                      class="text">info@yourdomain.com</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div>
  </footer>
