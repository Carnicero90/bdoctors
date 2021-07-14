<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Profile;
use App\Category;
use Illuminate\Support\Facades\Storage;
use App\Service;

class ProfileController extends Controller
{

    /**
     * Mostra il profilo dell'utente registrato
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Auth::user()->profile;
        $categories = Category::all();

        return view('admin.profile', compact('profile', 'categories'));
    }
    /**
     * Crea il profilo dell'utente, se già esistente ne aggiorna le informazioni
     *
     * @param Request $request 
     * @return \Illuminate\Http\Response
     */
    public function createOrUpdate(Request $request)
    {

        // TODO aggiungi size a validazione immagine
        $request->validate(
            [
                'self_description' => 'string | max:500 | nullable',
                'work_address' => 'string | max:100 | nullable',
                'phone_number' => 'digits_between:5,15 | nullable',
                'image-file' => 'image | nullable',
                'category' => 'exists:category_id'
            ]
        );
        $data = $request->only('self_description', 'work_address', 'phone_number', 'category_id');
        if (isset($request['image-file'])) {
            $img_path = Storage::put('uploads/user_pics', $request['image-file']);
            $data['pic'] = $img_path;
        }


        // CATEGORIES
        if (isset($request['categories']) && is_array($request['categories'])) {
            Auth::user()->categories()->sync($request['categories']);
        }
        else {
            Auth::user()->categories()->sync([]);
        }
 
        $profile = Profile::updateOrCreate(
            [
                'user_id' => Auth::user()->id
            ],
            $data
        );

        foreach(array_keys($request->input()) as $field) {
            if (substr($field, 0, 5) == 'old_s') 
            {
                $data = $request[$field];
                $service = Service::findOrFail($data['id']);
                $service->update($request[$field]);
                $service->save();
            }
        }
        foreach(array_keys($request->input()) as $field) {
            if (substr($field, 0, 7) == 'service') 
            {
                $service = new Service();
                $service->user_id = Auth::user()->id;
                $service->fill($request[$field]);
                $service->save();
            }

        }

        $profile->save();
        return redirect()->route("profile", ['id' => Auth::user()->id])->with("success", "Profilo modificato correttamente");
    }

}
