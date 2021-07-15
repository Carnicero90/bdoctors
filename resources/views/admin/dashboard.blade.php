@extends('layouts.app')
@section('content')

<div class="container">

    <div class="text-center">
        @include("partials.success-messages")
        @include("partials.error-messages")
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 text-center">

            <div class="card">
                <div class="card-header">
                    <h5>
                        Ciao
                        <span class="font-weight-bold">{{$user->name}}</span>,
                        cosa vuoi fare?
                    </h5>
                </div>
                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-success ml-2" href="{{route('admin.profile-index')}}">
                        <i class="fas fa-user-alt mr-1"></i> Crea / Modifica il tuo profilo
                    </a>
                    <a class="btn btn-warning ml-2" href="{{route('sponsor-index')}}">
                        <i class="fas fa-star mr-1"></i> Acquista un piano premium
                    </a>
                    <a class="btn btn-success ml-2" href="{{route("profile", ['id' => 1])}}">
                        <i class="fas fa-user-alt mr-1"></i> Visualizza il tuo profilo pubblico
                    </a>
                    <a class="btn btn-danger ml-2" href="#"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>

                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-6">
            <div class="d-flex align-items-center">
                <h2>Recensioni</h2>
                <a class="btn btn-primary ml-3" href="{{route('admin.reviews')}}"><i class="far fa-list-alt mr-1"></i> Leggi tutte le recensioni</a>
            </div>
            @foreach ($user->reviews as $review)
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
                            @for ($i = 0; $i < $review->vote_id; $i++)
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
            @endforeach
        </div>

        <div class="col-6">
            <div class="d-flex align-items-center">
                <h2>Messaggi</h2>
                <a class="btn btn-primary ml-3" href="{{route('admin.messages')}}"><i class="far fa-envelope mr-1"></i> Leggi tutti i messaggi</a>
            </div>
            @foreach ($user->messages as $message)
                <div class="card mt-4">
                    <div class="card-header d-flex">
                        <div class="mr-5">
                            <span><i class="fas fa-user-circle mr-1"></i></span>
                            <span>{{$message->author_name}}</span>
                        </div>
                        <div>
                            <span><i class="fas fa-envelope mr-1"></i></span>
                            <span>{{$message->author_email}}</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <span class="text-secondary">{{$message->created_at}}</span>
                        <div class="mt-2 mb-2">
                            <p class="card-text text-secondary">{{ strlen($message->text) > 120 ? substr($message->text, 0,120) . '...' : $message->text }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
</div>
@endsection