@extends('layouts.app')
@section('content')

<div class="top-margine">
    <div class="container">
        <h1>Messaggio</h1>

        <div class="row mt-3">
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
        </div>
        
    </div>
</div>

@endsection