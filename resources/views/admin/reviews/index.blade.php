@extends('layouts.app')
@section('content')

    <div class="container">
        <h1>Ciao {{$user->name . " " . $user->lastname}}</h1>
        <h2>Ecco la lista delle recensioni lasciate per te dagli utenti:</h2>

        @if ($user->reviews->isNotEmpty())
        
        @foreach ($user->reviews as $review)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h4 class="card-title">{{ $review->vote_id }}</h4>
                    <p class="card-text">{{ $review->content }}</p>
                    <h5 class="card-title">{{ $review->author_name }}</h5>
                    <a href="{{ route('admin.reviews-dettails', ["id" => $review->id]) }}" class="btn btn-primary">Vai alla recensione</a>
                </div>
            </div>
        @endforeach

        @else
        <div class="col-12">
            <span>Nessuna recensione ricevuta</span>
        </div>
        @endif
    </div>
@endsection