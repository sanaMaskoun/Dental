<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Doctor extends Model implements HasMedia
{
    use HasFactory ,InteractsWithMedia;
    protected  $guarded = [];
    protected  $table = 'doctors';

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class, 'doctor_specialization');
    }
    public function services()
    {
        return $this->belongsToMany(Service::class, 'doctor_service');
    }

}
