<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected  $guarded = [];
    protected  $table = 'contact_us';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
