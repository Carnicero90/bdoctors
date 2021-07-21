@extends('layouts.app')

@section('header-scripts')
@endsection

@section('content')

<div class="top-margine">
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
                            <div class="profile-img-dashboard-container">
                                <a href="{{ route('profile', ['id' => $user->id]) }}">
                                    <img src="{{ asset('storage/' . $user->profile->pic) }}" alt="{{ $user->name . ' ' . $user->lastname }}" class="profile-img-dashboard">
                                </a>
                            </div>
                        @else
                            <div class="profile-img-dashboard-container">
                                <a href="{{ route('profile', ['id' => $user->id]) }}">
                                    <img src="{{ asset('img/user-img.png') }}" alt="" class="profile-img-dashboard">
                                </a>
                            </div>
                        @endif
                        <div class="user-name ml-3">
                            <h2>Ciao <a class="hover-blue" href="{{ route('profile', ['id' => $user->id]) }}">{{ $user->name }}</a>, cosa vuoi fare?</h2>
                        </div>
                    </div>

                    {{-- Tasti navigazione --}}
                    @include('partials.dashboard-nav')
 
                </div>
            </div>
        </div>
        {{-- END HEADER --}}

        <div class="row mt-4">

            {{-- Recensioni --}}
            <div class="col-6">
                <div class="d-flex align-items-center mb-2">
                    <a class="hover-blue" href="{{ route('admin.reviews') }}"><h3>Recensioni</h3></a>
                </div>
                @if ($reviews->isNotEmpty())
                    @foreach ($reviews as $review)
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
                                <div class="d-flex align-items-center justify-content-between">
                                    {{-- review vote --}}
                                    <div>
                                        <span class="text-secondary">voto: </span>
                                        @for ($i = 0; $i < $review->vote->value; $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                    </div>
                                    {{-- review date --}}
                                </div>
                                <div class="mt-2 mb-2">
                                    <p class="card-text text-secondary">{{strlen($review->content) > 69 ? substr($review->content, 0, 70) . '...' : $review->content}}</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="{{route("admin.reviews-dettails", ["id" => $review->id])}}" class="btn btn-primary mt-2"><i class="far fa-file-alt mr-2"></i>Leggi recensione</a>
                                    <span class="text-secondary">ricevuta il {{ $review->send_date }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div>
                        Nessuna recensione presente
                    </div>
                @endif
            </div>

            {{-- Messaggi --}}
            <div class="col-6">
                <div class="d-flex align-items-center mb-2">
                    <h3><a class="hover-blue" href="{{ route('admin.messages') }}">Messaggi</a></h3>
                </div>
                @if ($messages->isNotEmpty())
                    @foreach ($messages as $message)
                        <div class="card mb-3">
                            <div class="card-header d-flex justify-content-between">
                                <div class="mr-5">
                                    <span><i class="fas fa-user-circle mr-1"></i></span>
                                    <span>{{ $message->author_name }}</span>
                                </div>
                                <div>
                                    <span><i class="fas fa-envelope mr-1"></i></span>
                                    <span>{{ $message->author_email }}</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mt-2 mb-2">
                                    <p class="card-text text-secondary">{{ strlen($message->text) > 139 ? substr($message->text, 0, 140) . '...' : $message->text }}</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="{{ route('admin.message-page', ['id' => $message->id]) }}"
                                        class="btn btn-primary mt-2"><i class="far fa-envelope mr-2"></i>Leggi messaggio</a>
                                    <span class="text-secondary">ricevuto il {{ $message->message_date }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @else
                    <div>
                        Nessun messaggio da mostrare
                    </div>
                @endif

            </div>
        </div>

    </div>
</div>
@endsection
