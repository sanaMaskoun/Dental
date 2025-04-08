<?php
namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function index()
    {
        if (Auth()->user()->type == UserTypeEnum::admin) {
            $patients = User::where('type', UserTypeEnum::patient)->get();

        } else {
            $patients = Patient::whereHas('diagnoses', function($query) {
                $query->where('doctor_id', Auth()->user()->doctor->id);
            })
            ->with(['user', 'diagnoses' => function($query) {
                $query->where('doctor_id', Auth()->user()->doctor->id);
            }])
            ->get();
        }
        return view('dashboard.pages.patient.list', compact('patients'));
    }

    public function show(User $patient)
    {

        return view('dashboard.pages.patient.show', compact('patient'));
    }
}
