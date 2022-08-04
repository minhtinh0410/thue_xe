<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Xe extends Model
{
    protected $guarded = [];

    public function loaiXe()
    {
        return $this->belongsTo('App\LoaiXe', 'loaixe_id', 'id');
    }

    public function giaoDichs()
    {
        return $this->hasMany('App\GiaoDich', 'xe_bien_so', 'bien_so');
    }
}
