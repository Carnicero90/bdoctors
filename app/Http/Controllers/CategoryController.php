<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;

class CategoryController extends Controller
{
    public function index() {

        $categories = Category::all();

        $data = [
            "categories" => $categories
        ];

        return view("guest.categories.index", $data);
    }

    public function show($slug) {

        $category = Category::where("slug", "=", $slug)->first();

        if (!$category) {
            abort("404");
        }

        $data = [
            "category" => $category,
        ];

        return view("guest.categories.show", $data);
    }


    // ESEMPIO BOOLPRESS
    //
    // public function show($slug) {

    //     $post = Post::where("slug", "=", $slug)->first();

    //     if (!$post) {
    //         abort("404");
    //     }

    //     $data = [
    //         "post" => $post,
    //         "post_category" => $post->category,
    //         "post_tags" => $post->tags
    //     ];

    //     return view("guest.posts.show", $data);
    // }
}
