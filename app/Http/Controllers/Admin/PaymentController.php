<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Transaction;
use Illuminate\Support\Facades\Auth;
use App\SponsorplanUser;
use App\Sponsorplan;
use Carbon\Carbon;


class PaymentController extends Controller
{
    public function index($id)
    {
        $plan = Sponsorplan::findOrFail($id);

        return view('admin.payment', compact('plan'));
    }

    public function make(Request $request)
    {
        //    TOTEST
        $plan = Sponsorplan::find(1);

        $payload = $request->input('payload', false);
        $user = Auth::user();
        $new_user_sponsored = new SponsorplanUser();
        if (!$payload) {
            $new_user_sponsored->success = false;
            // TODO: vedere se salvare pure questo come transazione fallita o se fare semplicemente tornare indietro a pagina carta
        } 
        else {
            $nonce = $payload['nonce'];
            $status = Transaction::sale([
                'amount' => $plan->pricing,
                'paymentMethodNonce' => $nonce,
                'options' => [
                    'submitForSettlement' => True
                ]
            ]);
            $new_user_sponsored->success = $status->success;

        }
        $new_user_sponsored->user_id = $user->id;
        $new_user_sponsored->order_date = Carbon::now();
        $new_user_sponsored->end_date = Carbon::now()->addHours($plan->duration_in_hours);
        $new_user_sponsored->sponsorplan_id = $plan->id;
        $new_user_sponsored->invoice = '2121331323444455';
        $new_user_sponsored->save();


        return response()->json($status);
    }
}
