<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Diagnos extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;
    protected  $guarded = [];
    protected  $table = 'diagnos';


    public function patient()
    {
        return $this->belongsTo(Patient::class ,'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class ,'doctor_id');
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('diagnosImg')
        ->useFallbackUrl(config('app.url') .'/img/diagnoses.webp ')

            ->singleFile();
        }
}
