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



    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('doctorImg')
        ->useFallbackUrl(config('app.url') .'/img/doctor.png')

            ->singleFile();
        }
}
