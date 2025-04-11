@extends('interface.master.app')

@section('interface')
    @use(App\Enums\PaymentMethodEnum)

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('info') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url({{ asset('interface/images/bg_1.jpg') }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text align-items-center" data-scrollax-parent="true">
                    <div class="col-md-6 col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{ __('pages.title_1_home') }}</h1>
                        <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{ __('pages.description_doctors') }}</p>
                        <button id="bookAppointmentBtn" class="btn btn-primary px-4 py-3" data-toggle="modal"
                            data-target="#bookingModal">
                            {{ __('pages.book_appointment') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item" style="background-image: url({{ asset('interface/images/bg_2.jpg') }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text align-items-center" data-scrollax-parent="true">
                    <div class="col-md-6 col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{ __('pages.title_2_home') }}</h1>
                        <p class="mb-4">{{ __('pages.description_doctors') }}</p>

                        <button id="bookAppointmentBtn" class="btn btn-primary px-4 py-3" data-toggle="modal"
                            data-target="#bookingModal">
                            {{ __('pages.book_appointment') }}
                        </button>
                    </div>
                </div>
            </div>
    </section>


    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-2"> {{ __('pages.our_specialization') }}  </h2>
                </div>
            </div>

            <div class="row">
                @foreach ($specializations as $specialization)
                    <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services d-block text-center">\
                            <a href="{{ route('specialization_details', $specialization->id) }}">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <img style="width: 150px;  height: 150px;  margin-right: 7px; border-radius: 50%;"
                                        src="{{ $specialization->getFirstMediaUrl('img') }}"> </span>
                                </div>
                                <div class="media-body p-2 mt-3">
                                    <h3 class="heading">{{ $specialization->name }}</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </section>

    <!-- Booking Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingModalLabel">{{ __('pages.book_appointment') }}  </h5>

                </div>
                <div class="modal-body">
                    <form id="bookingForm" action="{{ route('book_appointment') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="service" class="form-label">{{ __('pages.select_service') }}</label>
                            <select class="form-select" id="service" name="service">
                                <option value="">{{ __('pages.choose_service') }}</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="doctor" class="form-label">{{ __('pages.select_doctor') }}</label>
                            <select class="form-select" id="doctor" name="doctor" disabled>
                                <option value="">{{ __('pages.choose_doctor') }}</option>
                            </select>
                        </div>

                        <!-- Select Appointment Time (dynamic) -->
                        <div class="mb-3">
                            <label for="appointment" class="form-label">{{ __('pages.select_time_date') }}</label>
                            <select class="form-select" id="appointment" name="appointment" disabled>
                                <option value="">{{ __('pages.choose_time') }}</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="payment_method" class="form-label">{{ __('pages.select_method') }}</label>
                            <select class="form-select" id="payment_method" name="payment_method">
                                <option value="">{{ __('pages.choose_method') }}</option>
                                <option value="{{ PaymentMethodEnum::full }}">{{ __('EnumFile.full') }}</option>
                                <option value="{{ PaymentMethodEnum::installment }}">{{ __('EnumFile.installment') }}</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">{{ __('pages.confirm_booking') }}</button>
                    </form>
                </div>


            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        $(document).ready(function() {
            @if (session('success') || session('info'))
                $('#bookingModal').modal('hide');
            @endif

            const translations = {
                choose_doctor: "{{ __('pages.choose_doctor') }}",
                choose_time: "{{ __('pages.choose_time') }}"
            };

            $('#service').change(function() {
                let serviceId = $(this).val();
                if (serviceId) {
                    $.ajax({
                        url: '/get-doctors/' + serviceId,
                        type: 'GET',
                        success: function(data) {
                            $('#doctor').html(data).prop('disabled', false);
                        }
                    });
                }  else {
                    $('#doctor').html(`<option value="">${translations.choose_doctor}</option>`).prop('disabled', true);
                    $('#appointment').html(`<option value="">${translations.choose_time}</option>`).prop('disabled', true);
                }
            });


            $('#doctor').change(function() {
                let doctorId = $(this).val();
                if (doctorId) {
                    $.ajax({
                        url: '/get-appointments/' + doctorId,
                        type: 'GET',
                        success: function(data) {
                            $('#appointment').html(data).prop('disabled', false);
                        }
                    });
                } else {
                    $('#appointment').html('<option value="">{{ __('pages.choose_time') }}</option>').prop('disabled',
                        true);
                }
            });



        });
    </script>
@endsection
