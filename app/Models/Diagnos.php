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


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('diagnos')

            ->singleFile();
        }
}
