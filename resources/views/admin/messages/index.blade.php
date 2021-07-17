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
                                        <h4>{{ $message->author_name }}</h4>
                                        <h5>{{ $message->author_email }}</h5>
                                        <p class="card-text text-secondary">{{ substr($message->text, 0, 120) }}...</p>
                                        <div class="mb-3">
                                            @dump($message->message_date)
                                            <span>{{ $message->message_date }}</span>
                                        </div>
                                        <a href="{{ route('admin.message-page', ['id' => $message->id]) }}"
                                            class="btn btn-primary"><i class="far fa-file-alt"></i> Leggi il messaggio</a>
                                        {{-- form delete --}}
                                        <form class="form-group d-inline-block"
                                            action="{{ route('admin.message-hide', ['id' => $message->id]) }}"
                                            method="post">
                                            @csrf
                                            @method("POST")
                                            <input class="btn btn-danger" type="submit" value="Elimina il messaggio" onclick="return confirm('Vuoi Eliminare il messaggio?')">
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
