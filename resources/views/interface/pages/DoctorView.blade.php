@extends('interface.master.app')

@section('interface')
<head>
    <style>

        .doctor-profile {
            display: flex;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-top: 50px;
        }

        .doctor-image {
            flex: 1;
            background: #203e50;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }

        .doctor-image img {
            border-radius: 50%;
            width: 200px;
            height: 200px;
            object-fit: cover;
            border: 4px solid white;
        }

        .doctor-details {
            flex: 2;
            padding: 30px;
        }

        .doctor-details h2 {
            color: #22b8c7;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .doctor-details p {
            font-size: 18px;
            color: #555;
            margin: 10px 0;
        }

        .doctor-details p strong {
            color: #333;
        }

        .services, .appointments {
            margin-top: 30px;
        }

        .services h3, .appointments h3 {
            color: #22b8c7;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .services-list, .appointments-list {
            list-style-type: none;
            padding: 0;
        }

        .services-list li, .appointments-list li {
            background: #f8f9fa;
            margin: 10px 0;
            padding: 15px;
            border-radius: 10px;
            font-size: 16px;
            color: #333;
            transition: background 0.3s ease;
        }

        .services-list li:hover, .appointments-list li:hover {
            background: #e9ecef;
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
                            class="mr-2"><a href="{{ route('home') }}">Home</a> / Doctor Details</span></p>
                    <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Doctor Details</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container" style="padding-bottom: 50px;">
    <div class="doctor-profile">
        <div class="doctor-image">
            <img src="{{ $doctor->getFirstMediaUrl('profile') }}" alt="Doctor Image">
        </div>

        <div class="doctor-details">
            <h2>{{ $doctor->first_name }} {{ $doctor->last_name }}</h2>
            <p><strong>Email:</strong> {{ $doctor->email }}</p>
            <p><strong>Phone:</strong> {{ $doctor->phone }}</p>
            <p><strong>Land Line:</strong> {{ $doctor->doctor->land_line }}</p>
            <p><strong>Years of Practice:</strong> {{ $doctor->doctor->years_of_practice }}</p>
            <p><strong>Location:</strong> {{ $doctor->doctor->location }}</p>

            <div class="services">
                <h3>Services</h3>
                <ul class="services-list">
                    @foreach ($doctor->doctor->services as $service)
                        <li>{{ $service->name }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="appointments">
                <h3>Appointments Available</h3>
                <ul class="appointments-list">
                    @foreach ($doctor->doctor->appointments as $appointment)
                        <li>
                            <strong>Date:</strong> {{ $appointment->date }}<br>
                            <strong>Start Time:</strong> {{ $appointment->start_time }}<br>
                            <strong>End Time:</strong> {{ $appointment->end_time }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
