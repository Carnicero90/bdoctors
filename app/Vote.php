<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function reviews() {
        return $this->hasMany('App\Review');
    }

    // in $hidden si inseriscono le colonne che non si vuole vengano mostrate
    protected $hidden = ['created_at', 'updated_at'];

}
