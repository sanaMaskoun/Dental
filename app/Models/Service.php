<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected  $guarded = [];
    protected  $table = 'services';

    public function specialization()
    {
        return $this->belongsTo(Specialization::class , 'specialization_id');
    }

}
