<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
