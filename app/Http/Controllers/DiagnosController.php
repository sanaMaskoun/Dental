<?php
namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use App\Models\Diagnos;

class DiagnosController extends Controller
{
    public function index()
    {
        if (Auth()->user()->type == UserTypeEnum::admin) {
            $diagnosis = Diagnos::all();
        } else {
            $diagnosis = Diagnos::where('doctor_id', Auth()->user()->id)->get();
        }

        return view('dashboard.pages.diagnos.list', compact('diagnosis'));
    }
}
