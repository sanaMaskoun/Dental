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
                        <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Modern Dentistry
                            in a Calm and Relaxed Environment</h1>
                        <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">A small river
                            named Duden flows by their place and supplies it with the necessary regelialia.</p>
                        <button id="bookAppointmentBtn" class="btn btn-primary px-4 py-3" data-toggle="modal"
                            data-target="#bookingModal">
                            Book an Appointment
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
                        <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Modern Achieve
                            Your Desired Perfect Smile</h1>
                        <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary
                            regelialia.</p>

                        <button id="bookAppointmentBtn" class="btn btn-primary px-4 py-3" data-toggle="modal"
                            data-target="#bookingModal">
                            Book an Appointment
                        </button>
                    </div>
                </div>
            </div>
    </section>


    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-2">Our Specialization</h2>
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
                    <h5 class="modal-title" id="bookingModalLabel">Book an Appointment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="bookingForm" action="{{ route('book_appointment') }}" method="POST">
                        @csrf
                        <!-- Select Service -->
                        <div class="mb-3">
                            <label for="service" class="form-label">Select Service</label>
                            <select class="form-select" id="service" name="service">
                                <option value="">Choose a service</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Select Doctor (dynamic) -->
                        <div class="mb-3">
                            <label for="doctor" class="form-label">Select Doctor</label>
                            <select class="form-select" id="doctor" name="doctor" disabled>
                                <option value="">Choose a doctor</option>
                            </select>
                        </div>

                        <!-- Select Appointment Time (dynamic) -->
                        <div class="mb-3">
                            <label for="appointment" class="form-label">Select Date & Time</label>
                            <select class="form-select" id="appointment" name="appointment" disabled>
                                <option value="">Choose a time</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="payment_method" class="form-label">Select Payment Methode</label>
                            <select class="form-select" id="payment_method" name="payment_method">
                                <option value="">Choose a Methode</option>
                                <option value="{{ PaymentMethodEnum::full }}">full</option>
                                <option value="{{ PaymentMethodEnum::installment }}">installment</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Confirm Booking</button>
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
                } else {
                    $('#doctor').html('<option value="">Choose a doctor</option>').prop('disabled', true);
                    $('#appointment').html('<option value="">Choose a time</option>').prop('disabled',
                        true);
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
                    $('#appointment').html('<option value="">Choose a time</option>').prop('disabled',
                        true);
                }
            });



        });
    </script>
@endsection
