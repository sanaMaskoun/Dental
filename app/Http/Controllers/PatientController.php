<?php
namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use App\Models\Diagnos;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function index()
    {
        if (Auth()->user()->type == UserTypeEnum::admin) {
            $patients = User::where('type', UserTypeEnum::patient)->get();
            return view('dashboard.pages.patient.listAdmin', compact('patients'));

        } else {
            $patients = Patient::whereHas('diagnoses', function ($query) {
                $query->where('doctor_id', Auth()->user()->doctor->id);
            })
                ->with(['user', 'diagnoses' => function ($query) {
                    $query->where('doctor_id', Auth()->user()->doctor->id);
                }])
                ->get();
            return view('dashboard.pages.patient.list', compact('patients'));

        }
    }

    public function show(User $patient)
    {
        if (Auth()->user()->type == UserTypeEnum::admin) {
            $diagnoses= Diagnos::where('patient_id', $patient->patient->id)->get();


        }else{
            $diagnoses= Diagnos::where('doctor_id', Auth()->user()->doctor->id)->where('patient_id', $patient->patient->id)->get();

        }
            return view('dashboard.pages.patient.show', compact('patient','diagnoses'));
    }
}
