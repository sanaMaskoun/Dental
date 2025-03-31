@extends('interface.master.app')

@section('interface')

    <head>
        <style>
            .card {
                border: none;
                border-radius: 15px;
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                overflow: hidden;
                background: rgba(255, 255, 255, 0.9);
                backdrop-filter: blur(10px);
            }

            .card-header {
                background: linear-gradient(135deg, #203e50, #128aa3);
                color: white;
                text-align: center;
                padding: 20px;
                border-bottom: none;
            }

            .card-header h4 {
                margin: 0;
                font-weight: 700;
            }

            .card-body {
                padding: 30px;
            }

            .form-group label {
                font-weight: 700;
                color: ##203e50;
            }

            .form-control {
                border-radius: 10px;
                border: 2px solid ##203e50;
                padding: 10px;
                transition: all 0.3s ease;
            }

            .form-control:focus {
                border-color: ##128aa3;
                box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
            }

            .form-control-file {
                border: 2px dashed ##203e50;
                padding: 20px;
                text-align: center;
                border-radius: 10px;
                background: rgba(0, 123, 255, 0.1);
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .form-control-file:hover {
                background: rgba(0, 123, 255, 0.2);
            }

            .btn-primary {
                background: linear-gradient(135deg, #203e50, #128aa3) !important;
                border: none;
                border-radius: 10px;
                padding: 10px;
                font-weight: 700;
                transition: all 0.3s ease;
            }

            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
            }
        </style>
    </head>
    <section class="home-slider owl-carousel">
        <div class="slider-item bread-item" style="background-image: url('{{ asset('interface/images/bg_1.jpg') }}');"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container" data-scrollax-parent="true">
                <div class="row slider-text align-items-end">
                    <div class="col-md-7 col-sm-12 ftco-animate mb-5">
                        <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span
                                class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span> /Recharge</span></p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="test">
        <div class="container" style="padding-top: 100px; padding-bottom: 50px;">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif


                @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif
                    <div class="card">
                        <div class="card-header">
                            <h4>Recharge </h4>
                        </div>
                        <div class="card-body">
                            <form  action="{{ route('recharge_store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="number" class="form-control" id="amount" name="amount"
                                        placeholder="Enter Amount">
                                    @error('amount')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="link">Link</label>
                                    <input type="file" class="form-control-file" name="link" id="link">
                                    @error('link')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Confirm payment
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
