@extends('layouts.app')
@section('content')

<div class="container">
    <div class="mt-2 mb-4">
        <h1>Categorie</h1>
    </div>
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-4">
                <div class="card mb-3">
                    <div class="card-header">
                        {{ucfirst($category->name)}}
                    </div>
                    <div class="card-body">
                        <a href="{{route("category-page", ["slug" => $category->slug])}}" class="btn btn-primary">Visualizza tutti i {{$category->name}}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection