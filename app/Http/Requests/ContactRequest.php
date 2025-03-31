<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

  
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email' ,'unique:contact_us,email'],
            'subject' => ['required', 'string', 'max:50'],
        ];
    }

    public function validated($key = null, $default = null)
    {
        return [
            'name'         => $this->name,
            'email'        => $this->email,
            'subject'      => $this->subject,
            'user_id'       => Auth()->user()->id,
        ];
    }
}
