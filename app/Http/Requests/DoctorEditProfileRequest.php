<?php
namespace App\Http\Requests;

use App\Enums\UserTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class DoctorEditProfileRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
         $emailUnique = Rule::unique('users', 'email')->ignore($this->user);
// dd(request()->all());
        return [
            'first_name'        => ['required', 'string', 'max:20'],
            'last_name'         => ['required', 'string', 'max:20'],
            'email'             => ['required', 'email'],
            'phone'             => ['required', 'numeric', 'digits_between:10,14'],
            'land_line'         => ['required', 'numeric', 'digits_between:7,10'],
            'bio'               => ['required', 'max:500'],
            'profile'           => ['nullable'],
            'location'          => ['string', 'required', 'max:50'],
            'years_of_practice' => ['required', 'numeric'],
            'services'          => ['required', 'array'],
            'services.*'        => ['integer', 'exists:services,id', 'distinct'],
        ];
    }

    public function userValidated($key = null, $default = null)
    {
        return [
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'email'      => $this->email,

            'phone'      => $this->phone,
            'is_active'  => true,
            'type'       => UserTypeEnum::doctor,
        ];

    }
    public function doctorValidated($key = null, $default = null)
    {
        return [
            'bio'               => $this->bio,
            'land_line'         => $this->land_line,
            'location'          => $this->location,
            'years_of_practice' => $this->years_of_practice,
        ];

    }

}
