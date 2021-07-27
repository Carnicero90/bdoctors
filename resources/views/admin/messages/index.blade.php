@extends('layouts.app')
@section('content')

<div class="top-margine">
    <div class="container">

        {{-- HEADER --}}
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <div class="dashboard">
                    @include('partials.dashboard-nav')
                </div>
            </div>
        </div>
        {{-- END HEADER --}}

        {{-- success messages --}}
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                @include("partials.success-messages")
            </div>
        </div>
        {{-- END success messages --}}

        <h1>Messaggi</h1>

        <div class="row mb-5">
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
                                    <p class="card-text">
                                        @if (strlen($message->text) > 133)
                                            {{substr($message->text, 0, 130) . "..."}}
                                        @else
                                            {{$message->text}}
                                        @endif
                                    </p>
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
