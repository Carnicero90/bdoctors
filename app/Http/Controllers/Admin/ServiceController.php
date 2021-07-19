<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Service;
use App\User;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $services = Service::where('user_id', '=', $user->id)->get();

        $data = [
            'user' => $user,
            'services' => $services
        ];

        return view('admin.services.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'string | max:200 | required',
            'hourly_rate' => 'numeric | required | between:0.00,1000000.00',
            'description' => 'string | nullable'
        ]
        );

        $modif_service = Service::findOrFail($id);
        
        $user = Auth::user();

        if($modif_service->user_id != $user->id)
        {
            abort(403, 'Accesso non autorizzato');
        }        


        // TODO Update
        $modif_service->update();

        return redirect()->route('admin.services');
    }

    public function create($id) {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        if ($service->user_id == Auth::user()->id) {
            $service->delete();
        }

        return back();
    }
}
