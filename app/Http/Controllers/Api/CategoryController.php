<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Ritorna l'elenco di tutte le categorie
     *
     * @return \Illuminate\Contracts\Support\JsonResponse
     */
    public function index()
    {
        $categories = Category::select('id', 'name', 'slug');

        $result = [
            'categories' => $categories,
            'success' => true
        ];

        return response()->json($result);
    }
}
