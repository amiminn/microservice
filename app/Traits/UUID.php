<?php

namespace App\Traits;

use App\Services\Response;
use Illuminate\Support\Str;

trait UUID
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Response::uuid();
            $model->token = Response::random(60);
            $model->avatar = Response::url('/assets/avatar.png');
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}
