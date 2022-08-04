<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password'
    ];

    public function quyen()
    {
        return $this->belongsTo('App\Quyen', 'quyen_id', 'id');
    }

    public function giaoDichs()
    {
        return $this->hasMany('App\GiaoDich', 'user_cmnd', 'cmnd');
    }
}
