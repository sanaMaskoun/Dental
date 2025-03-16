<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class FAQRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'question'            =>  ['required'],
            'answer'              =>  ['required']
        ];
    }


    public function validated($key = null, $default = null)
    {
        return [
            'question'     => $this->question,
            'answer'       => $this->answer,
            'user_id'      => Auth()->user()->id
        ] ;
    }
}
