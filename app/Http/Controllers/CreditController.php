<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    public function index()
    {
        $credits = Credit::get();
        return view('dashboard.pages.credit.list', compact('credits'));
    }

    public function accept(Credit $credit)
    {

            $credit->patient->update(['account' => $credit->amount + $credit->patient->account]);
            $credit->delete();

            return redirect()->back()->with('success', trans('message.add_balance'));

    }

    public function reject(Credit $credit)
    {

            $credit->delete();
            return redirect()->back()->with('success', trans('message.reject_balance'));

    }
}
