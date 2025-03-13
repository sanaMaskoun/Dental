<?php

namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = User::where('type' , UserTypeEnum::patient)->get();
        return view('dashboard.pages.patient.list',compact('patients'));
    }


    public function show(User $patient)
    {

         return view('dashboard.pages.patient.show', compact('patient'));
    }
}
