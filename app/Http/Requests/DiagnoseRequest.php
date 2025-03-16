<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DiagnoseRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'diagnose'         => ['required'],
            'notes'            => ['required'],
            'patient'          => ['required' , 'exists:patients,id'],
            'diagnosImg'       => ['nullable']
        ];
    }


    public function validated($key = null, $default = null)
    {
        return [
            'diagnose'     => $this->diagnose,
            'notes'        => $this->notes,
            'patient_id'     => $this->patient,
            'doctor_id'     => Auth()->user()->doctor->id,
        ];
    }
}
