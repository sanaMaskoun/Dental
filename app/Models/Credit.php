<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Credit extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected  $guarded = [];
    protected  $table = 'credits';


    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('link')
            ->singleFile();
        }
}
