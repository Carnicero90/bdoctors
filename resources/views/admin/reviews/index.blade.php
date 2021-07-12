@extends('layouts.app')
@section('content')

    <div class="container">
        <h1>Ciao {{$user->name . " " . $user->lastname}}</h1>
        <h2>Ecco la lista delle recensioni lasciate per te dagli utenti:</h2>

        @foreach ($user->reviews as $review)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $review->author_name }}</h5>
                    <h4 class="card-title">{{ $review->vote_id }}</h4>
                    <p class="card-text">{{ $review->content }}</p>
                    {{-- <a href="{{ route('admin.reviews.show', ["id" => $review->id]) }}" class="btn btn-primary">Vai alla recensione</a> --}}
                </div>
            </div>
        @endforeach
    </div>

@endsection