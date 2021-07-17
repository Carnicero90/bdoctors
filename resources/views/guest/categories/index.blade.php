@extends('layouts.app')
@section('content')

<div class="container">
    <div class="mt-3 mb-5">
        <h1>Categorie</h1>
    </div>
    <div class="row">
        @foreach ($categories as $category)
            @include("partials.categories-list")
        @endforeach
    </div>
</div>

@endsection