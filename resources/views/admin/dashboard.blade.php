@extends('layouts.app')

@section('header-scripts')
@endsection

@section('content')

<div class="container">

    <div class="text-center">
        @include("partials.success-messages")
        @include("partials.error-messages")
    </div>

    {{-- HEADER --}}
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">

            {{-- Saluto all'utente loggato --}}
            <div class="dashboard">
                <div class="mb-4 d-flex align-items-center">
                    @if ($user->profile)
                        <div style="width: 100px; height: 100px; border-radius: 50%; overflow: hidden;">
                            <a href="{{route("profile", ['id' => $user->id ])}}">
                                <img src="{{ asset('storage/' . $user->profile->pic) }}" alt="{{ $user->name . ' ' . $user->lastname }}" style="max-height: 100px; width: 100%; height: 100%; object-fit: cover;">
                            </a>
                        </div>
                    @else
                        <div style="width: 100px; height: 100px; border-radius: 50%; overflow: hidden;">
                            <a href="{{route("profile", ['id' => $user->id ])}}">
                                <img src="{{ asset('img/user-img.png') }}" alt="" style="max-height: 100px;">
                            </a>
                        </div>
                    @endif
                    <h3 class="ml-3">
                        Ciao
                        <a class="saluto" href="{{route("profile", ['id' => $user->id ])}}">
                            <span class="font-weight-bold">{{$user->name}}</span>
                        </a>
                        , cosa vuoi fare?
                    </h3>
                </div>

                {{-- Tasti navigazione --}}
                <div class="dash-list d-flex text-center align-items-center">
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- Crea/Modifica Profilo --}}
                    <a class="dash-link" href="{{route('admin.profile-index')}}">
                        <i class="fas fa-user-cog mb-2" style="font-size: 20px;"></i>
                        <div>Crea / Modifica profilo</div>
                    </a>
                    
                    {{-- Aggiungi/Modifica Prestazione --}}
                    <a class="dash-link" href="{{route('admin.services')}}">
                        <i class="fas fa-user-plus mb-2" style="font-size: 20px;"></i>
                        <div>Aggiungi / Modifica prestazione</div>
                    </a>

                    {{-- Acquista Piano Premium --}}
                    <a class="dash-link" href="{{route('sponsor-index')}}">
                        <i class="fas fa-star mb-2" style="font-size: 20px;"></i>
                        <div>Acquista piano premium</div>
                    </a>

                    {{-- Visualizza Profilo Pubblico --}}
                    <a class="dash-link" href="{{route("profile", ['id' => $user->id ])}}">
                        <i class="fas fa-user-tie mb-2" style="font-size: 20px;"></i>
                        <div>Visualizza profilo pubblico</div>
                    </a>

                    {{-- Statistiche --}}
                    <a class="dash-link" href="{{route("admin.statistics", ['id' => $user->id ])}}">
                        <i class="fas fa-signal mb-2" style="font-size: 20px;"></i>
                        <div>Stats</div>
                    </a>

                    {{-- Logout --}}
                    <a class="dash-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt mb-2" style="font-size: 20px;"></i>    
                        <div>Logout</div>
                    </a>

                </div>
            </div>
        </div>
    </div>
    {{-- END HEADER --}}

    {{-- Recensioni --}}
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
                        <div class="d-flex align-items-center justify-content-between">
                            {{-- review vote --}}
                            <div>
                                @for ($i = 0; $i < $review->vote->value; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                            </div>
                            {{-- review date --}}
                            <span class="text-secondary">{{date(config('app.StandardDateFormat'), $review->created_at->timestamp)}}</span>
                        </div>
                        <div class="mt-2 mb-2">
                            <p class="card-text text-secondary">{{strlen($review->content) > 69 ? substr($review->content, 0, 70) . '...' : $review->content}}</p>
                        </div>
                        <a href="{{route("admin.reviews-dettails", ["id" => $review->id])}}" class="btn btn-primary mt-2"><i class="far fa-file-alt"></i> Leggi la recensione</a>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Messaggi --}}
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
                        <div class="d-flex align-items-center">
                            <span class="text-secondary">{{ $message->message_date }}</span>
                        </div>
                        <div class="mt-2 mb-2">
                            <p class="card-text text-secondary">{{strlen($message->text) > 69 ? substr($message->text, 0, 70) . '...' : $message->text}}</p>
                        </div>
                        <a href="{{route('admin.message-page', ['id' => $message->id])}}" class="btn btn-primary mt-2"><i class="far fa-file-alt"></i> Leggi il messaggio</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
</div>
@endsection