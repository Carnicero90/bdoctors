@extends('layouts.app')
@section('content')

    <div class="container">
        <h1>Ciao {{$user->name . " " . $user->lastname}}</h1>
        <h2>Ecco la lista delle recensioni lasciate per te dagli utenti:</h2>
        

        @if ($reviews->isNotEmpty())
        
            <div class="row">
                @foreach ($reviews as $review)
                    <ol class="col-6">
                        <li class="card mt-4">
                            <div class="card-body">
                                <h4>Da {{$review->author_name}}</h4>
                                <h5>{{$review->author_email}}</h5>
                                <h6>Il {{date('d/m/Y', $review->created_at->timestamp)}}</h6>
                                <p class="card-text text-secondary">{{substr($review->content, 0, 120)}}...</p>
                                <div class="mb-3"><span>Voto {{ $review->vote->value }} su 5</span></div>
                                {{-- TODO: eliminare riferimento hardcoded a voto max, lo recuperiamo dal db --}}
                                <div><a href="{{route("admin.reviews-dettails", ["id" => $review->id])}}" class="btn btn-primary"><i class="far fa-file-alt"></i> Leggi la recensione</a></div>
                            </div>
                        </li>
                    </ol>
                @endforeach
            </div>

        @else
            <div class="col-12">
                <span>Nessuna recensione presente</span>
            </div>
        @endif
    </div>
@endsection