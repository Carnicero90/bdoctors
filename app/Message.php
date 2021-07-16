<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function users() {
        return $this->belongsTo('App\User');
    }

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_name', 'author_email', 'text', 'service_number', 'user_id', 'message_date', 'to_show', 'to_read',
    ];
}
