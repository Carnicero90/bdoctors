<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class SponsorplanUser extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    // TODO: da commentare
    public static function userHasActiveSponsorPlan($user_id)
    {
        $now = Carbon::now();
        $user_active_plans = SponsorplanUser::where(
            [
                ['user_id', '=', $user_id],
                ['success', '=', 1],
                ['end_date', '>', $now],
            ]
        )->get();

        return $user_active_plans->isNotEmpty();
    }

    protected $fillable = [
        'user_id', 'success', 'sponsorplan_id', 'order_date', 'end_date', 'invoice' 
    ];
}
