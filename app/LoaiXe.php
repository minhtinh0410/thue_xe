<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiXe extends Model
{
    protected $guarded = [];

    public function xes()
    {
        return $this->hasMany('App\Xe', 'loaixe_id', 'id');
    }
}
