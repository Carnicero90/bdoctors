@extends('layouts.app')
@section('content')

<div class="top-margine">
    <div class="container">
        <h1>Messaggio</h1>

        <div class="row mt-3">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="mt-2 mb-2"><h4>{{$message->author_name}}</h4></div>
                        <div class="mt-2 mb-2"><h6>{{$message->author_email}}</h6><span></div>
                    </div>
                    <div class="card-body">
                        <div class="mt-2 mb-4">
                            <p class="text-gray">{{$message->text}}</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <button class="btn btn-outline-primary mr-2" onclick="return alert('Dobbiamo impostare la risposta via mail')"><i class="fas fa-share-square mr-2"></i>Rispondi</button>
                                <form class="form-group d-inline-block" action="{{ route('admin.message-hide', ['id' => $message->id]) }}" method="post">
                                    @csrf
                                    @method("POST")
                                    <button class="btn btn-outline-danger mr-2" type="submit" onclick="return confirm('Vuoi Eliminare il messaggio?')"><i class="fas fa-times mr-2"></i>Elimina</button>
                                </form>
                            </div>
                            <div class="mt-2 mb-2">{{date("d/m/y", strtotime($message->message_date)) . " ore " . date("H:i", strtotime($message->message_date))}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection