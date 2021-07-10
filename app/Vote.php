<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function reviews() {
        return $this->hasMany('App\Review', 'vote_id', 'id');
    }
}
