<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Specialization extends Model implements HasMedia
{
    use HasFactory ,InteractsWithMedia;
    protected  $guarded = [];
    protected  $table = 'specializations';

    public function services()
    {
        return $this->hasMany(Service::class ,'specialization_id');
    }

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class ,'doctor_specialization');

    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('img')->singleFile();

        }
}
