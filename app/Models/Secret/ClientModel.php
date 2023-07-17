<?php

namespace App\Models\Secret;

use App\Services\Response;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{
    use HasFactory;

    protected $table = 'client';
    protected $guarded = [];

    // protected $hidden = ['created_at', 'updated_at'];

    public function status()
    {
        return $this->status = !$this->status;
    }

    public function updateClientSecret()
    {
        return $this->status = Response::random(60);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->client_id = Response::random(20);
            $model->client_secret = Response::random(60);
        });
    }
}
