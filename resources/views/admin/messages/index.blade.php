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

        <div class="row align-items-center title">
            <div class="col-2">
                <h1><a href="">Messaggi</a></h1>
            </div>
            @if ($numb_mess_to_read)
                <div class="col-10">
                    <div class="badge badge-success badge-new-message">
                        Hai {{$numb_mess_to_read}}
                        @if ($numb_mess_to_read == 1)
                            messaggio non letto
                        @else
                            messaggi non letti
                        @endif
                    </div>
                </div>
            @endif
        </div>

        <div class="row mb-5">
            @if ($messages->isNotEmpty())
                @foreach ($messages as $message)
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card mt-4">
                            {{-- message header --}}
                            <div class="card-header d-flex align-items-center">
                                <div class="mt-2 mb-2 flex-grow-1">
                                    <h4>{{$message->author_name}}</h4>
                                </div>
                                @if ($message->to_read)
                                    <div class="d-inline-block badge badge-success badge-new-message mr-3">Messaggio non letto</div>
                                @endif
                                <div class="mt-2 mb-2">
                                    <h6>{{$message->author_email}}</h6>
                                </div>
                            </div>
                            {{-- END message header --}}

                            {{-- message body --}}
                            <div class="card-body">
                                <div class="mt-2 mb-4">
                                    <p class="text-gray">
                                        @if (strlen($message->text) > 133)
                                            {{substr($message->text, 0, 130) . "..."}}
                                        @else
                                            {{$message->text}}
                                        @endif
                                    </p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div><a href="{{ route('admin.message-page', ['id' => $message->id]) }}" class="btn btn-outline-primary mr-2"><i class="far fa-file-alt mr-2"></i>Leggi</a></div>
                                    <div class="mt-2 mb-2">{{date("d/m/Y", strtotime($message->message_date))}}</div>
                                </div>
                            </div>
                            {{-- END message body --}}
                            
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 mt-3">
                    <span class="text-gray">Nessun messaggio presente</span>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
