<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'date'       => ['required'],
            'start_time' => ['required'],
            'end_time'   => ['required', 'after:start_time'],
        ];
    }


    public function validated($key = null, $default = null)
    {
        $date = Carbon::createFromFormat('d-m-Y', time: $this->date)->format('Y-m-d');

        return [
            'date'           => $date,
            'start_time'     => $this->start_time,
            'end_time'       => $this->end_time,
            'doctor_id'      => Auth()->user()->doctor->id,
        ];
    }
}
