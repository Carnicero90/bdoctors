@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            @foreach ($user->categories as $cat)
                @dump($cat->name)
            @endforeach
        </div>
        <h1>{{ $user->name }} {{ $user->lastname }}</h1>
        {{-- TEST --}}
        <img src="{{ $user->profile ? asset('storage/' . $user->profile->pic) : 'defaultimagedainserire' }}" alt="" style="width: 200px">
        <a href="{{ route("send-review", ['id' => $user->id]) }}" class="btn btn-primary ml-3 mr-3">Scrivi recensione</a>
        <a href="{{ route("send-message", ['id' => $user->id]) }}" class="btn btn-primary ml-3 mr-3">Scrivi messaggio</a>
        {{-- END TEST --}}
        <p>E-mail: {{ $user->email }}</p>
        <p>Indirizzo: {{ $user->address }}</p>
        <div class="row">
            <div class="col-12">
                @if ($user->profile)
                {{-- TEST --}}
                    <p> Vi parlo di me: {{ $user->profile->self_description }}</p>
                @endif
            </div>

        </div>

        <h2>Recensioni</h2>
        <a href="">Lascia una recensione</a>

        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-body">
                        @foreach ($user->reviews as $review)
                            <div class="mt-2 mb-2"><span>da: {{ $review->author_name }}</span></div>
                            {{-- <div class="mt-2 mb-2"><span>email: {{ $review->author_email }}</span></div> --}}
                            <div class="mt-2 mb-2">
                                @for ($i = 0; $i < $review->vote_id; $i++)
                                   <i class="fas fa-star"></i>
                                @endfor
                            </div>
                            {{-- TODO: non usare direttamente l'id, potrebbe non corrispondere al value del voto! --}}
                            {{-- <div class="mt-2 mb-2"><span>voto: {{ $review->vote_id }}</span></div> --}}
                            <div class="mt-2 mb-2">
                                {{-- <span>Testo recensione:</span> --}}
                                <p class="card-text text-secondary">{{ strlen($review->content) > 100 ? substr($review->content, 0,100) . '...' : $review->content }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
