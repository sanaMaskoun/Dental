<?php

namespace App\Http\Requests;

use App\Enums\StatusJoinUsEnum;
use Illuminate\Foundation\Http\FormRequest;

class JoinRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name'       => ['required', 'string', 'max:20'],
            'email'      => ['required', 'email' ,'unique:join_us,email'],
            'subject'    => ['required', 'string', 'max:50'],
            'phone'      => ['required', 'numeric', 'digits_between:7,14'],

        ];
    }

    public function validated($key = null, $default = null)
    {
        return [
            'name'          => $this->name,
            'email'         => $this->email,
            'subject'       => $this->subject,
            // 'user_id'       => Auth()->user()->id,
            'phone'         => $this->phone,
            'status'        => StatusJoinUsEnum::pending,

        ];
    }
}
