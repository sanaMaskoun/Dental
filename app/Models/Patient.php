<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    use HasFactory;
    protected  $guarded = [];
    protected  $table = 'patients';

    public function diagnoses()
    {
        return $this->HasMany(Diagnos::class , 'patient_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
