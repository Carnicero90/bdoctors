@extends('layouts.app')
@section('content')

    <div class="container">

        {{-- TEST --}}
        <div class="mb-4">
            <img class="d-inline-block mr-2" src="{{ $user->profile ? asset('storage/' . $user->profile->pic) : 'defaultimagedainserire' }}" alt="" style="width: 100px">
            <h1 class="d-inline-block">{{ $user->name }} {{ $user->lastname }}</h1>
        </div>

        <div class="mb-4">
            <h6>Categorie:</h6>
            @foreach ($user->categories as $category)
                <a class="btn btn-outline-dark" href="route{{}}">{{$category->name}}</a>
                {{-- <a class="align-middle text-dark" href="{{route("category-page", ["slug" => $post_category->slug])}}">{{$category->name}}</a> --}}
            @endforeach
        </div>

        <div class="mb-4">
            <h6>Email:</h6>
            <span class="text-secondary">{{$user->email}}</span>
        </div>

        <div class="mb-4">
            <h6>Indirizzo:</h6>
            <span class="text-secondary">{{$user->address}}</span>
        </div>

        <div class="mb-4">
            <h6>Vi parlo di me:</h6>
            @if ($user->profile)
                <p class="text-secondary">{{$user->profile->self_description}}</p>
            @endif
        </div>
        {{-- END TEST --}}

        <div class="mt-4 mb-5">
            <a href="{{ route("send-review", ['id' => $user->id]) }}" class="btn btn-primary mr-3">Scrivi recensione</a>
            <a href="{{ route("send-message", ['id' => $user->id]) }}" class="btn btn-primary mr-3">Scrivi messaggio</a>
        </div>

        {{-- PERFORMANCES --}}
        <form>
            <h2 class="mb-4">Servizi</h2>
            @foreach ($user->services as $service)
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $service->title }}</h4>
                    </div>
                    <div class="card-body">
                        <span>{{$service->hourly_rate}} € all'ora</span>
                        <p>{{$service->description}}</p>
                    </div>
                </div>
            @endforeach
        </form>
        {{-- END PERFORMANCES --}}
        
        <div class="row mt-4">
            <div class="col-12">
                <h2>Recensioni</h2>
                @foreach ($user->reviews as $review)
                    <div class="card mt-4">
                        <div class="card-header">
                            <span><i class="fas fa-user-circle mr-1"></i></span>
                            <span>{{ $review->author_name }}</span>
                        </div>
                        <div class="card-body">
                            {{-- <div class="mt-2 mb-2"><span>email: {{ $review->author_email }}</span></div> --}}
                            <div>
                                @for ($i = 0; $i < $review->vote_id; $i++)
                                <i class="fas fa-star"></i>
                                @endfor
                            </div>
                            {{-- TODO: non usare direttamente l'id, potrebbe non corrispondere al value del voto! --}}
                            {{-- <div class="mt-2 mb-2"><span>voto: {{ $review->vote_id }}</span></div> --}}
                            <div class="mt-2 mb-2">
                                {{-- <span>Testo recensione:</span> --}}
                                <p class="card-text text-secondary">{{ strlen($review->content) > 120 ? substr($review->content, 0,120) . '...' : $review->content }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        
    </div>
@endsection