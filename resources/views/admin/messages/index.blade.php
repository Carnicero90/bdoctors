@extends('layouts.app')
@section('content')
    {{-- div.container --}}
    <div class="container">
        {{-- section.messages --}}
        <section>
            <h1>Ciao {{ $user->name . ' ' . $user->lastname }}</h1>
            <h2 class="mb-4">Ecco i messaggi che gli utenti ti hanno inviato:</h2>
            {{-- success and error messages --}}
            @include("partials.success-messages")
            {{-- div.row --}}
            <div class="row">
                @if ($messages->isNotEmpty())
                    @foreach ($messages as $message)
                            <div class="col-6">
                                <div class="card mt-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h4>{{ $message->author_name }}</h4>
                                            <span class="text-secondary">{{$message->message_date}}</span>
                                        </div>
                                        <h5>{{ $message->author_email }}</h5>
                                        <p class="card-text text-secondary">{{ substr($message->text, 0, 120) }}...</p>
                                        <div class="mb-3 text-right">
                                        </div>
                                        <a href="{{ route('admin.message-page', ['id' => $message->id]) }}" class="btn btn-primary mr-2"><i class="far fa-file-alt mr-2"></i>Leggi</a>
                                        
                                        {{-- form delete --}}
                                        <form class="form-group d-inline-block" action="{{ route('admin.message-hide', ['id' => $message->id]) }}" method="post">
                                            @csrf
                                            @method("POST")
                                            <button class="btn btn-danger mr-2" type="submit" onclick="return confirm('Vuoi Eliminare il messaggio?')"><i class="fas fa-times mr-2"></i>Elimina</button>
                                        </form>
                                        {{-- END form delete --}}

                                    </div>
                                </div>
                            </div>
                        {{-- div message --}}

                        {{-- END div message --}}
                    @endforeach
                @else
                    <div class="col-12">
                        <span>Nessun messaggio ricevuto</span>
                    </div>
                @endif
            </div>
            {{-- END div.row --}}
        </section>
        {{-- END section.messages --}}
    </div>
    {{-- END div.container --}}


@endsection
