<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected  $guarded = [];
    protected  $table = 'bookings';
    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }


}
