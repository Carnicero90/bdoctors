<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    // TODO: commentala
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
