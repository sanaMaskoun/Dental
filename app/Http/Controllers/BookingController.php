<?php

namespace App\Http\Controllers;

use App\Enums\PaymentMethodEnum;
use App\Enums\StatusBookingEnum;
use App\Enums\UserTypeEnum;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        if (Auth()->user()->type == UserTypeEnum::admin) {
            $bookings = Booking::all();
        } else {
            $bookings = Booking::where('doctor_id', Auth()->user()->doctor->id)->get();
        }

        return view('dashboard.pages.booking.list', compact('bookings'));
    }


    public function completed(Booking $booking)
    {
        $booking->update(['status' => StatusBookingEnum::complete]);
        return redirect()->back()->with('success', 'completed successfully');
    }
}
