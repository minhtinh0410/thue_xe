<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quyen extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany('App\User', 'quyen_id', 'id');
    }
}
