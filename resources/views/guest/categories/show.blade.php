@extends('layouts.app')
@section('content')

<div class="container">

    <div class="row mb-5">
        <a class="btn btn-outline-dark" href="{{route("categories")}}"><i class="fas fa-arrow-left mr-3"></i>Torna alla pagina delle categorie</a>
    </div>

    <div class="row mb-4">
        <h3>{{ucfirst($category->name)}}</h3>
    </div>

    <div>

        <div class="row">
            @foreach ($category_users as $user)
                <a href="{{route("profile", ["id" => $user->id])}}" style="text-decoration: none; color: #444;">
                    <div class="card mb-4 mr-3">

                        {{-- TODO: boh, magari la media voti la mostriamo solo se supera un tot? Pagano, non e' bellino per loro vedersi un
                        pallino solo come media recensioni (d'altra parte affari loro, bohbohboh) --}}

                        <div class="card-body d-flex flex-column align-items-center">
                            <div style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden;">
                                <img src="http://127.0.0.1:8000/img/user-img.png" alt="" style="max-height: 120px; width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div class="mt-3 mb-2 font-weight-bold">
                                <span>{{ucfirst($user->name) . " " . ucfirst($user->lastname)}}</span>
                            </div>
                            <div>
                                for each sul voto <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>

@endsection