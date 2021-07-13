@extends('layouts.app')
@section('content')

    <div class="container">

        {{-- TEST --}}
        <h1>{{ $user->name }} {{ $user->lastname }}</h1>
        <img src="{{ $user->profile ? asset('storage/' . $user->profile->pic) : 'defaultimagedainserire' }}" alt="" style="width: 200px">

        @foreach ($user->categories as $category)
                <div class="form-group">
                    <label for="category">Categorie:</label>
                    <input type="text" class="form-control" id="category" name="category" placeholder="{{$category->name}}" disabled>
                </div>
        @endforeach
        {{-- END TEST --}}

        <form>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="{{$user->email}}" disabled>
            </div>
            <div class="form-group">
                <label for="address">Indirizzo</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="{{$user->address}}" disabled>
            </div>
            @if ($user->profile)
                <div class="form-group">
                    <label for="self_description">Vi parlo di me</label>
                    <textarea class="form-control" id="self_description" name="self_description" rows="3" placeholder="{{$user->profile->self_description}}" disabled></textarea>
                </div>
            @endif
        </form>

        <div class="mt-5 mb-5">
            <a href="{{ route("send-review", ['id' => $user->id]) }}" class="btn btn-primary mr-3">Scrivi recensione</a>
            <a href="{{ route("send-message", ['id' => $user->id]) }}" class="btn btn-primary mr-3">Scrivi messaggio</a>
        </div>

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
