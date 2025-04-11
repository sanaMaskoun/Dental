@extends('dashboard.master.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card invoice-info-card">
                    <div class="card-body">
                        <div class="invoice-item invoice-item-one">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="invoice-head">
                                        <p>{{ __('pages.doctor') }} : {{ $diagnose->doctor->user->first_name }}  {{ $diagnose->doctor->user->last_name }}</p>
                                        <p>{{ __('pages.patient') }} :  {{ $diagnose->patient->user->first_name }}  {{ $diagnose->patient->user->last_name }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="invoice-item invoice-item-two">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-info">
                                        <strong class="customer-text-one">{{ __('pages.diagnose') }}</strong>
                                        <p class="invoice-details invoice-details-two">
                                            {{ $diagnose->diagnose }}
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="invoice-terms">
                                    <h6>{{ __('pages.notes') }}:</h6>
                                    <p class="mb-0">{{ $diagnose->notes }}</p>
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="invoice-total-card">
                                    <div class="invoice-total-box">
                                        <div class="invoice-total-inner">
                                            <img class="img-fluid d-inline-block" src="{{ $diagnose->getFirstMediaUrl('diagnosImg') }}" alt="sign">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
