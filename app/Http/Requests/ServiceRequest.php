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
            'description'          => ['required', 'string', 'max:200' ],
            'price'                => ['required', 'numeric'],
            'img'                  => ['sometimes', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'specialization'       => ['required', 'exists:specializations,id'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->sometimes('img', 'required', function ($input) {
            return !$input->has_image;
        });
    }
    public function validated($key = null, $default = null)
    {
        return [

            'name'               => $this-> name,
            'description'        => $this-> description,
            'price'              => $this-> price,
            'specialization_id'  => $this-> specialization,
        ];
    }
}
