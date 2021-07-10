<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;

class CategoryUserController extends Controller
{
    /**
     * Return the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($slug)
    {
        $cat = Category::where('slug', '=', $slug)->first();

        if (!$cat) {
            abort('404');
        }
        
        $data = $cat->users()->get();
        // TODO jsonificala
       return $data;
    }
}
