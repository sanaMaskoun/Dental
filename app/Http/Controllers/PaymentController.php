<?php
namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        if (Auth()->user()->type == UserTypeEnum::admin) {
            $payments = Payment::all();
        } else {
            $payments = Payment::whereHas('booking', function ($q) {
                $q->where('doctor_id', Auth()->user()->doctor->id);
            })->get();
        }

        return view('dashboard.pages.payment.list', compact('payments'));
    }

}
