<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable , InteractsWithMedia ,HasRoles ;

    protected  $guarded = [];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function doctor()
    {
        return $this->hasOne(Doctor::class , 'user_id');
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('profile')
        ->useFallbackUrl(config('app.url') .'/img/user.png')

            ->singleFile();
            $this->addMediaCollection('certifications');

        }
}
