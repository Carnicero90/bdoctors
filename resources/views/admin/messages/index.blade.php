@extends('layouts.app')
@section('content')

    <div class="container">
        <h1>Messaggi</h1>

        @include("partials.success-messages")
        
        <div class="row">
            @if ($messages->isNotEmpty())
                @foreach ($messages as $message)
                    <div class="col-12">
                        <div class="card mt-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <div class="mt-2 mb-2"><h4><small>da </small>{{$message->author_name}}</h4></div>
                                <div class="mt-2 mb-2"><h6><i class="fas fa-envelope mr-2"></i>{{$message->author_email}}</h6><span></div>
                            </div>
                            <div class="card-body">
                                <div class="mt-2 mb-4">
                                    <p class="card-text text-secondary">{{$message->text}}</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <a href="{{ route('admin.message-page', ['id' => $message->id]) }}" class="btn btn-primary mr-2"><i class="far fa-file-alt mr-2"></i>Leggi</a>
                                        <form class="form-group d-inline-block" action="{{ route('admin.message-hide', ['id' => $message->id]) }}" method="post">
                                            @csrf
                                            @method("POST")
                                            <button class="btn btn-danger mr-2" type="submit" onclick="return confirm('Vuoi Eliminare il messaggio?')"><i class="fas fa-times mr-2"></i>Elimina</button>
                                        </form>
                                    </div>
                                    <div class="mt-2 mb-2 text-secondary">ricevuto il {{ $message->message_date }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 mt-3">
                    <span>Nessun messaggio da mostrare</span>
                </div>
            @endif
        </div>
    </div>

@endsection
