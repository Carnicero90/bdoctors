<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
        'self_description', 'phone_number', 'work_address', 'user_id'
    ];

    protected $primaryKey = 'user_id';
}
