@extends('layouts.app')
@section('content')

<div class="top-margine">
    <div class="container">
        <h1>Messaggi</h1>

        @include("partials.success-messages")
        {{-- <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4"> --}}

        <div class="row">
            @if ($messages->isNotEmpty())
                @foreach ($messages as $message)
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card mt-4">
                            {{-- message header --}}
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <div class="mt-2 mb-2">
                                    <h4>{{ $message->author_name }}</h4>
                                </div>
                                <div class="mt-2 mb-2">
                                    <h6>{{ $message->author_email }}</h6>
                                </div>
                            </div>
                            {{-- END message header --}}

                            {{-- message body --}}
                            <div class="card-body">
                                <div class="mt-2 mb-4">
                                    <p class="card-text">{{ $message->text }}</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <a href="{{ route('admin.message-page', ['id' => $message->id]) }}"
                                            class="btn btn-outline-primary mr-2"><i class="far fa-file-alt mr-2"></i>Leggi</a>
                                        <form class="form-group d-inline-block"
                                            action="{{ route('admin.message-hide', ['id' => $message->id]) }}"
                                            method="post">
                                            @csrf
                                            @method("POST")
                                            <button class="btn btn-outline-danger mr-2" type="submit"
                                                onclick="return confirm('Vuoi Eliminare il messaggio?')"><i
                                                    class="fas fa-times mr-2"></i>Elimina</button>
                                        </form>
                                    </div>
                                    <div class="mt-2 mb-2">{{date("d/m/Y", strtotime($message->message_date))}}</div>
                                </div>
                            </div>
                            {{-- END message body --}}
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
</div>

@endsection
