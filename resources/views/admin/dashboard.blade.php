@extends('layouts.app')
@section('content')

<div class="container">

    <div class="text-center">
        @include("partials.success-messages")
        @include("partials.error-messages")
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 text-center">

            <div class="card">
                <div class="card-header">
                    <h5>
                        Ciao
                        <span class="font-weight-bold">{{$user->name}}</span>,
                        cosa vuoi fare?
                    </h5>
                </div>
                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-primary ml-2" href="{{route('admin.messages')}}">
                        <i class="far fa-envelope mr-1"></i> Leggi i messaggi
                    </a>
                    <a class="btn btn-primary ml-2" href="{{route('admin.reviews')}}">
                        <i class="far fa-list-alt mr-1"></i> Leggi le recensioni
                    </a>
                    <a class="btn btn-warning ml-2" href="{{route('sponsor-index')}}">
                        <i class="fas fa-star mr-1"></i> Acquista un piano premium
                    </a>
                    <a class="btn btn-success ml-2" href="{{route('admin.profile-index')}}">
                        <i class="fas fa-user-alt mr-1"></i> Profilo
                    </a>
                    <a class="btn btn-success ml-2" href="{{route('admin.messages')}}">
                        <i class="fas fa-user-cog mr-1"></i> Impostazioni
                    </a>

                    <a class="btn btn-danger ml-2" href="#"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>

                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection