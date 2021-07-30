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
    public function index($id) {
        $user = Auth::user();
        if (SponsorplanUser::userHasActiveSponsorPlan($user->id)) {
            return redirect()->route('admin.dashboard')->with('errors', 'Non puoi acquistare, hai già un piano di sponsorizzazione attivo');
        }

        $plan = Sponsorplan::findOrFail($id);

        return view('admin.payment', compact('plan'));
    }

    public function make(Request $request, $id) {
        if (!Auth::user()) {
            return redirect(route('login'));
        }
        $user = Auth::user();

        if (SponsorplanUser::userHasActiveSponsorPlan($user->id)) {
            return response()->json(false);
        }
        
        // TOTEST
        $plan = Sponsorplan::findOrFail($id);

        $payload = $request['payload'];

        $nonce = $payload['nonce'];
        $status = Transaction::sale([
            'amount' => $plan->pricing,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        return response()->json($status);
    }
}
