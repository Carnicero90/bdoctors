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
    // TOASK: francamente non so manco se metterlo in admin, ma mi pareva piu corretto
    public function store($id)
    {   
        $plan = Sponsorplan::find($id);

        if ( !$plan ) 
        {
            // fai qualcosa
        }
        // TOSAY: qua saltiamo la verifica in braintree, che verra aggiunta successivamente:
        // si "finge" che il pagamento sia andato a buon fine
        if (!Auth::user()) 
        {
            // TOADD: redirect a login: in teoria gia dovrebbe essere impedito che uno possa provare a 
            // abbonarsi senza essere loggato via middleware, ma hai visto mai
        }

        $user_id = Auth::user()->id;

        if (SponsorplanUser::userHasActiveSponsorPlan($user_id)) 
        {
            // TODO: aggiungi messaggio
            // Reindirizza direi a pagina precedente?
        }

        $new_subscription = new SponsorplanUser();
        $new_subscription->user_id = $user_id;
        $new_subscription->order_date = Carbon::now();
        $new_subscription->end_date = $plan->endDate();
        $new_subscription->sponsorplan_id = $id;
        // TOTEST
        $new_subscription->invoice = 'bababa';
        $new_subscription->success = true;
        $new_subscription->save();
        dd($new_subscription);
    }
}
