@extends('layouts.app')
@section('content')

<div class="container">
    <div class="mt-3 mb-5">
        <h1>Categorie</h1>
    </div>
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-3">
                <a href="{{route("category-page", ["slug" => $category->slug])}}" class="font-weight-bold" style="text-decoration: none; color: #444;">
                    <div class="card mb-3">
                        <div class="card-body text-center text-uppercase">
                            <img src="{{'http://127.0.0.1:8000/img/icons/' . $category->slug . '.png'}}" alt="" style="height: 25px;" class="mr-2">
                            <span>{{str_replace("registrazione e mixaggio", "rec & mix", $category->name)}}</span>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

@endsection