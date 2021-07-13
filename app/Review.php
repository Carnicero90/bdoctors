<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
<<<<<<< HEAD
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'author_name', 'author_email', 'password', 'lastname', 'address'
    ];
=======

    protected $fillable = [

        "author_name", "author_email", "content", "vote_id"
    ];

>>>>>>> crud-start
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function votes()
    {
        return $this->belongsTo('App\Vote');
    }
}

