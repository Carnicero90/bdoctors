<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'author_name', 'author_email', 'password', 'lastname', 'address'
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
