<?php
namespace App\Http\Controllers;

use App\Enums\StatusBookingEnum;
use App\Enums\UserTypeEnum;
use App\Models\Booking;

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
        Booking::where('patient_id', $booking->patient_id)
            ->where('service_id', $booking->service_id)
            ->where('doctor_id', $booking->doctor_id)
            ->where('status', StatusBookingEnum::pending)
            ->update(['status' => StatusBookingEnum::complete]);
        return redirect()->back()->with('success', trans('message.completed_successfully'));
    }
}
