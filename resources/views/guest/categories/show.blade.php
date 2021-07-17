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
                    <a href="{{route("profile", ["id" => $user->id])}}" style="text-decoration: none; color: #444;">
                        <div class="card mb-4" style="position: relative;">    
                            <div class="card-body d-flex flex-column align-items-center">
                                <div style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden;">
                                    @if ($user->pic)
                                        <img src="{{asset('storage/' . $user->pic)}}" alt="" style="max-height: 120px; width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <img src="{{asset("/img/user-img.png")}}" alt="" style="max-height: 120px; width: 100%; height: 100%; object-fit: cover;">                                    
                                    @endif
                                </div>
                                <div class="mt-3 mb-2 font-weight-bold">
                                    <span>{{ucfirst($user->name) . " " . ucfirst($user->lastname)}}</span>
                                </div>
                                <div>
                                    {{-- intval() ritorna un intero da una stringa --}}
                                    @for ($i = 0; $i < intval($user->avg_vote); $i++)
                                        <span><i class="fas fa-star"></i></span>
                                    @endfor
                                </div>
                                @if ($user->sponsored)
                                    <div style="position: absolute; top: 5px; right: 7px;">
                                        <small class="badge badge-secondary">Consigliato</small>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection