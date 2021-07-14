@extends('layouts.app')
@section('content')

<div class="container">

    <div class="mb-4">
        <a class="btn btn-outline-dark" href="{{route("categories")}}">Torna alla pagina delle categorie</a>
    </div>

    <div>
        <h3>{{ucfirst($category->name)}}</h3>
    </div>

    <div>
        <h4>Lista utenti della categoria:</h4>

        <div class="row">
            @foreach ($category_users as $user)
                <div class="col-4">
                    <div class="card mb-3">
                        <div class="card-header">
                            {{ucfirst($user->name)}}
                        </div>
                        <div class="card-body">
                            <a href="{{route("profile", ["id" => $user->id])}}" class="btn btn-primary">Vai al profilo dell'artista</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection