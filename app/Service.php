<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    protected $fillable = [
        'user_id', 
        'title', 
        'hourly_rate', 
        'description'
    ];
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
