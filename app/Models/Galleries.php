<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galleries extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];

    public function trips()
    {
        return $this->hasMany('App\Models\Trips', 'trip_id', 'id');
    }
}
