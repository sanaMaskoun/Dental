<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServiceRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        $nameUnique = Rule::unique('services', 'name')->ignore($this->service);

        return [
            'name'                 => ['required', 'string', 'max:50' ,$nameUnique],
            'price'                => ['required', 'numeric'],
            'specialization'       => ['required', 'exists:specializations,id'],
        ];
    }


    public function validated($key = null, $default = null)
    {
        return [

            'name'               => $this-> name,
            'price'              => $this-> price,
            'specialization_id'  => $this-> specialization,
        ];
    }
}
