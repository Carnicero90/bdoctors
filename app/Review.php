<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $fillable = [

        "author_name", "author_email", "content", "vote"
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function votes()
    {
        return $this->belongsTo('App\Vote');
    }
}

