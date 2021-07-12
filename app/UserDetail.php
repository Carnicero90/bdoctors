<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
        'self_description', 'phone_number', 'work_address', 'user_id'
    ];
}
