<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaoDich extends Model
{
    protected $table = 'giao_dichs';

    protected $guarded = [];

    public function xe()
    {
        return $this->belongsTo('App\Xe', 'xe_bien_so', 'bien_so');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_cmnd', 'cmnd');
    }
}
