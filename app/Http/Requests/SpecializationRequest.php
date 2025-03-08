<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SpecializationRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        $nameUnique = Rule::unique('specializations', 'name')->ignore($this->specialization);

        return [
            'name'        => ['required', 'string', 'max:50' ,$nameUnique],
        ];
    }


    public function validated($key = null, $default = null)
    {
        return[
         'name'    => $this->name,
         
        ];

    }
}
