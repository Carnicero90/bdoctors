@extends('layouts.app')
@section('content')

    <div class="container">
        <h2>Ciao {{$user->name . " " . $user->lastname}}</h2>

        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="mt-2 mb-2"><span>da: {{$message->author_name}}</span></div>
                        <div class="mt-2 mb-2"><span>email: {{$message->author_email}}</span></div>
                        <div class="mt-2 mb-2">
                            <span>Testo</span>
                            <p class="card-text text-secondary">{{$message->text}}</p>
                        </div>
                        <div class="mb-3"><span>Data ricezione: {{$message->message_date}}</span></div>


                        <form class="form-group d-inline-block" action="{{ route('admin.message-hide', ['id' => $message->id]) }}" method="post">
                            @csrf
                            @method("POST")
                            <input class="btn btn-danger" type="submit" value="Elimina il messaggio">
                        </form>

                    </div>
                </div>
            </div>
        </div>
        
    </div>

@endsection