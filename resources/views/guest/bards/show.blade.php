@extends('layouts.app')
@section('content')

    <div class="container">

        @include("partials.success-messages")
        @include("partials.error-messages")

        {{-- TEST --}}
        <div class="mb-4 d-flex align-items-center">
            @if ($user->profile)
                <div style="width: 100px; height: 100px; border-radius: 50%; overflow: hidden;">
                    <img src="{{ asset('storage/' . $user->profile->pic) }}" alt="{{ $user->name . ' ' . $user->lastname }}" style="max-height: 100px; width: 100%; height: 100%; object-fit: cover;">
                </div>
            @else
                <div style="width: 100px; height: 100px; border-radius: 50%; overflow: hidden;">
                    <img src="{{ asset('img/user-img.png') }}" alt="" style="max-height: 100px;">
                </div>
            @endif
            <div class="d-inline-block ml-4">
                <h1>{{ $user->name }} {{ $user->lastname }}</h1>
            </div>
        </div>

        <div class="mb-4">
            @foreach ($user->categories as $category)
                <a class="btn btn-outline-dark" href="{{ route('category-page', ['slug' => $category->slug]) }}" style="padding: 2px 5px;">{{ $category->name }}</a>
            @endforeach
        </div>

        <div class="mb-4">
            <h6>Email:</h6>
            <span class="text-secondary">{{ $user->email }}</span>
        </div>


        <div class="mb-4">
            <h6>Indirizzo:</h6>
            @if ($user->profile)
                <span class="text-secondary">{{ $user->profile->work_address }}</span>
            @endif
        </div>

        <div class="mb-4">
            <h6>Vi parlo di me:</h6>
            @if ($user->profile)
                <p class="text-secondary">{{ $user->profile->self_description }}</p>
            @endif
        </div>
        {{-- END TEST --}}

        @if (!(Auth::user() && $user->id == Auth::user()->id))
        {{-- TODO: magari invece di nasconderlo si fa effetto 'disabled'? --}}
        <div class="mt-4">
            {{-- link form recensioni --}}
            <a href="{{ route('send-review', ['id' => $user->id]) }}" class="btn btn-primary mr-3">Scrivi recensione</a>
            {{-- link form messaggi --}}
            <a href="{{ route('send-message', ['id' => $user->id]) }}" class="btn btn-primary mr-3">Scrivi messaggio</a>
        </div>
        @endif
        <hr>

        {{-- PERFORMANCES --}}
        <div class="row mt-4">
            <div class="col-12">
                <h2>Servizi</h2>
            </div>
            @foreach ($user->services as $service)
                <div class="col-6">
                    <div class="card mb-3">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4>{{ $service->title }}</h4>
                            <h5>€ {{ $service->hourly_rate }} all'ora</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-secondary">{{ $service->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- END PERFORMANCES --}}

        {{-- reviews --}}
        <div class="row mt-4">
            <div class="col-12 mb-2">
                <h2>Recensioni</h2>
            </div>
            
            <div class="col-12">
                @foreach ($user->reviews as $review)
                    <div class="card mb-3">
                        <div class="card-header d-flex justify-content-between">
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
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div>
                                    <span class="text-secondary">voto: </span>
                                    @for ($i = 0; $i < $review->vote->value; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                </div>
                                <div>
                                    <span class="text-secondary">ricevuta il {{date("d/m/Y", $review->created_at->timestamp)}}</span>
                                </div>
                            </div>
                            <div class="mt-2 mb-2">
                                <p class="card-text text-secondary">{{$review->content}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- END reviews --}}


    </div>

@endsection