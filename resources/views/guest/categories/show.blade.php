@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row mb-5">
            <a class="btn btn-outline-dark" href="{{route("categories")}}"><i class="fas fa-arrow-left mr-3"></i>Torna alla pagina delle categorie</a>
        </div>

        <div class="row mb-4">
            <h3>{{ucfirst($category->name)}}</h3>
        </div>

        <div class="row mt-4 d-flex align-items-center">
            @foreach ($category_users as $user)
                <div class="mr-4" style="width: 21%">
                    @include("partials.user-card-php")
                </div>
            @endforeach
        </div>
    </div>

@endsection