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

    // TODO: commenta
    public static function userHasActiveSponsorPlan($user_id)
    {
        $now = new Carbon();
        $user_active_plans = SponsorplanUser::where(
            [
                ['user_id', '=', $user_id],
                ['success', '=', 1],
                ['end_date', '>', $now],
            ]
        )->get();

        return $user_active_plans->isNotEmpty();
    }
}
