@extends('layouts.app')
@section('content')

    <div class="container">
        <h2>Ciao {{$user->name . " " . $user->lastname}}</h2>

        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="mt-2 mb-2"><span>da: {{$review->author_name}}</span></div>
                        <div class="mt-2 mb-2"><span>email: {{$review->author_email}}</span></div>
                        <div class="mt-2 mb-2">
                            <span>Testo</span>
                            <p class="card-text text-secondary">{{$review->content}}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
    </div>

@endsection