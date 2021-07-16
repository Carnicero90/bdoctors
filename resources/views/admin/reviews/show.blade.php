@extends('layouts.app')
@section('content')

    <div class="container">
        <h2>Ciao {{$user->name . " " . $user->lastname}}</h2>

        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="mt-2 mb-2"><p>Da <b>{{$review->author_name}}</b></span></div>
                        <div class="mt-2 mb-2"><span>Email: <b>{{$review->author_email}}</b></span></div>
                        <div class="mt-2 mb-2"><span>Data: <b>{{ date('d/m/Y', $review->created_at->timestamp ) }}</b></span></div>
                        <div class="mt-2 mb-2"><span>Voto {{$review->vote_id}} su 5</span></div>
                        <div class="mt-2 mb-2">
                            <span>Testo recensione:</span>
                            <p class="card-text text-secondary">{{$review->content}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

@endsection