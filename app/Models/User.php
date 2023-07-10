<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Services\Response;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $guarded = [];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function active()
    {
        return $this->isActive = !$this->isActive;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->token = Response::random(60);
            $model->avatar = Response::url('/default.jpg');
        });
    }
}
