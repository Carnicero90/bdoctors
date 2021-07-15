@extends('layouts.app')
@section('content')

    <div class="container">

        @include("partials.success-messages")

        {{-- TEST --}}
        <div class="mb-4 d-flex align-items-center">
            @if ($user->profile)
                <div style="width: 100px; height: 100px; border-radius: 50%; overflow: hidden;">
                    <img src="{{asset('storage/' . $user->profile->pic)}}" alt="" style="max-height: 100px; width: 100%; height: 100%; object-fit: cover;">
                </div>
            @else
                <div style="width: 100px; height: 100px; border-radius: 50%; overflow: hidden;">
                    <img src="{{asset('img/user-img.png')}}" alt="" style="max-height: 100px;">
                </div>
            @endif
            <div class="d-inline-block ml-4">
                <h1>{{$user->name}} {{$user->lastname}}</h1>
            </div>
        </div>

        <div class="mb-4">
            <h6>Categorie:</h6>
            @foreach ($user->categories as $category)
                <a class="btn btn-outline-dark" href="{{route("category-page", ["slug" => $category->slug])}}">{{$category->name}}</a>
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
            </div>
            @foreach ($user->reviews as $review)
                <div class="col-6">
                    <div class="card mt-4">
                        <div class="card-header d-flex">
                            <div class="mr-5">
                                <span><i class="fas fa-user-circle mr-1"></i></span>
                                <span>{{$review->author_name}}</span>
                            </div>
                            <div>
                                <span><i class="fas fa-envelope mr-1"></i></span>
                                <span>{{$review->author_email}}</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <span class="text-secondary">{{$review->created_at}}</span>
                            <div>
                                @for ($i = 0; $i < $review->votes; $i++)
                                <i class="fas fa-star"></i>
                                @endfor
                            </div>
                            {{-- TODO: non usare direttamente l'id, potrebbe non corrispondere al value del voto! --}}
                            {{-- <div class="mt-2 mb-2"><span>voto: {{ $review->vote_id }}</span></div> --}}
                            <div class="mt-2 mb-2">
                                <p class="card-text text-secondary">{{ strlen($review->content) > 120 ? substr($review->content, 0,120) . '...' : $review->content }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

@endsection