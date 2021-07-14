@extends('layouts.app')
@section('content')

<div class="container">
    <h5>Categorie</h5>
    <ul>
        @foreach ($categories as $category)
        <li>
            <div class="mb-4">
                {{$category->name}}
                <a href="{{route("category-page", ["slug" => $category->slug])}}" class="btn btn-primary">Visualizza gli artisti della categoria</a>
            </div>
        </li>  
    @endforeach
    </ul>
</div>

@endsection