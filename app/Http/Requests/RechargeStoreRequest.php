<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RechargeStoreRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

       public function rules(): array
    {
        return [
            'amount'       =>['required','numeric'],
            'link'         =>['required'],
        ];
    }

    public function validated($key = null, $default = null)
    {

        return [
            'amount'          =>   $this->amount,
            'patient_id'      =>   Auth()->user()->patient->id
        ];
    }
}
