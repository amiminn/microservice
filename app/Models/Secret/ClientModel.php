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

    public $incrementing = false;
    // protected $hidden = ['created_at', 'updated_at'];

    public function status()
    {
        $this->status = !$this->status;
        return $this;
    }

    public function updateClientSecret()
    {
        $this->client_secret = Response::random(60);
        return $this;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Response::epoch();
            $model->client_id = Response::random(20);
            $model->client_secret = Response::random(60);
        });
    }
}
