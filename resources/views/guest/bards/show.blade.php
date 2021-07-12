@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $user->name }} {{ $user->lastname }}</h1>
        <p>E-mail: {{ $user->email }}</p>
        <p>Indirizzo: {{ $user->address }}</p>
        <div class="row">
            <div class="col-12">
                
            </div>
            @if ($user->userDetails)
                {{ $user->userDetails->self_description }}
                
            @endif
        </div>

        <h2>Recensioni</h2>

        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-body">
                        @foreach ($user->reviews as $review)
                            <div class="mt-2 mb-2"><span>da: {{$review->author_name}}</span></div>
                            <div class="mt-2 mb-2"><span>email: {{$review->author_email}}</span></div>
                            <div class="mt-2 mb-2"><span>voto: {{$review->vote_id}}</span></div>
                            <div class="mt-2 mb-2">
                                <span>Testo recensione:</span>
                                <p class="card-text text-secondary">{{$review->content}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection