<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();

        $categories_for_response = [];

        foreach ($categories as $category) {

            $categories_for_response[] = [
                'id' => $category->id,
                'name' => $category->name,
                'slug' => $category->slug
            ];
        }

        $result = [
            'categories' => $categories_for_response,
            'success' => true
        ];

        return response()->json($result);
    }
}