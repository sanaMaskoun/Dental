<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Service extends Model implements HasMedia
{
    use HasFactory ,InteractsWithMedia;
    protected  $guarded = [];
    protected  $table = 'services';

    public function specialization()
    {
        return $this->belongsTo(Specialization::class , 'specialization_id');
    }

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'doctor_service');

    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('img')->singleFile();

        }
}
