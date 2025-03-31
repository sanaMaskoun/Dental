<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;
    protected  $guarded = [];
    protected  $table = 'f_a_q_s';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
