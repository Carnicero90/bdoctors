<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Sponsorplan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\SponsorplanUser;
use Illuminate\Support\Facades\Auth;

class SponsorplanUserController extends Controller
{
    public function store(Request $request, $id)
    {   
        $plan = Sponsorplan::findOrFail($id);


        if (!Auth::user()) 
        {
            return redirect( route('login') );
        }

        $user_id = Auth::user()->id;

        if (SponsorplanUser::userHasActiveSponsorPlan($user_id)) 
        {
            return redirect()->route('admin.dashboard')->with("errors", "Non puoi acquistare il piano, hai già un abbonamento attivo!");
        }
        $new_subscription = new SponsorplanUser();
        $new_subscription->user_id = $user_id;
        $new_subscription->order_date = Carbon::now();
        $new_subscription->end_date = $plan->endDate();
        $new_subscription->sponsorplan_id = $id;
        // TOTEST
        $new_subscription->invoice = 'bababa';
        $new_subscription->success = intval($request['success']);
        $new_subscription->save();

        return redirect()->route("admin.dashboard")->with("success", "Abbonamento sottoscritto");
    }
}
