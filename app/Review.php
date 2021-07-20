<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $fillable = [

        "author_name", "author_email", "content", "vote_id", "user_id", "service_received"
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function vote()
    {
        return $this->belongsTo('App\Vote');
    }
}

