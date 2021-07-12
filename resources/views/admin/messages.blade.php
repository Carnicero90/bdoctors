@extends('layouts.app')
@section('content')

    <div class="container">
        <h1>Ciao {{$user->name . " " . $user->lastname}}</h1>
        <h2>Ecco i messaggi che gli utenti ti hanno inviato:</h2>

        @if ($user->messages->isNotEmpty())

            <div class="row">
                @foreach ($user->messages as $message)
                    <div class="col-6">
                        <div class="card mt-4">
                            <div class="card-body">
                                <h4>{{$message->author_name}}</h4>
                                <h5>{{$message->author_email}}</h5>
                                <p class="card-text text-secondary">{{substr($message->text, 0, 120)}}...</p>
                                <div class="mb-3"><span>{{$message->message_date}}</span></div>

                                {{-- href="{{route("admin.posts.show", ["post" => $post->id])}}" --}}
                                <a href="#" class="btn btn-primary"><i class="far fa-file-alt"></i> Leggi il messaggio</a>

                                {{-- action="{{route("admin.posts.destroy", ["post" => $post->id])}}"> --}}
                                <form class="form-group d-inline-block" action="#" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <input class="btn btn-danger" type="submit" value="Elimina il messaggio">
                                </form>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        @else
            <div class="col-12">
                <span>Nessun messaggio ricevuto</span>
            </div>
        @endif
    </div>

@endsection