@extends('layouts.app')

@section('header-scripts')
@endsection

@section('content')

    <div class="top-margine">
        <div class="container">

            <div class="text-center">
                @include("partials.success-messages")
                @include("partials.error-messages")
            </div>

            {{-- HEADER --}}

            {{-- Saluto all'utente loggato --}}
            <div class="dashboard">

                <div class="row align-items-center">
                    <div class="col-12 col-sm-12 col-md-3 col-lg-2 col-xl-2 d-flex mb-4">
                        @if ($user->profile)
                            <div class="profile-img-dashboard-container">
                                <img src="{{ asset('storage/' . $user->profile->pic) }}" alt="{{ $user->name . ' ' . $user->lastname }}" class="profile-img-dashboard">
                            </div>
                        @else
                            <div class="profile-img-dashboard-container">
                                <a href="{{ route('profile', ['id' => $user->id]) }}">
                                    <img src="{{ asset('img/user/user-img.png') }}" alt="" class="profile-img-dashboard">
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-6 col-xl-6 text-center text-sm-center text-md-left text-xl-left mb-4">
                        <h2>{{$user->name . " " . $user->lastname}}</h2>
                    </div>
                    <div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 text-lg-right text-center text-sm-center text-md-righ text-xl-righ tmb-4">
                        @if ($user->sponsored)
                            <a class="btn btn-outline-success" href="{{ route('sponsor-index') }}">
                                <h4>Sei un utente Premium</h4>
                                <span>fino al {{date("d/m/y", strtotime($user->sponsored->end_date)) . " alle ore " . date("H:i", strtotime($user->sponsored->end_date))}}</span>
                            </a>
                        @else
                            <a class="btn btn-outline-success" href="{{ route('sponsor-index') }}">
                                <h4>Acquista un piano Premium</h4>
                                <span>Vedi i piani disponibili</span>
                            </a>
                        @endif
                    </div>
                </div>

            </div>

            {{-- HEADER --}}
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <div class="dashboard">
                        @include('partials.dashboard-nav')
                    </div>
                </div>
            </div>
            {{-- END HEADER --}}

            <div class="row mt-4 mb-3">
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <a href="{{ route('admin.profile-index') }}" class="no-decorations">
                        <div class="card shadow zoom mb-4">
                            <div class="card-body">
                                <h3>{{ Auth::user()->profile ? 'Modifica' : 'Crea' }} profilo</h3>
                                <img src="{{asset("img/dashboard/cards/modifica-profilo.jpg")}}" alt="" class="img_100">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <a href="{{ route('admin.services') }}" class="no-decorations">
                        <div class="card shadow zoom mb-4">
                            <div class="card-body">
                                <h3>Servizi</h3>
                                <img src="{{asset("img/dashboard/cards/servizi.jpg")}}" alt="" class="img_100">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <a href="{{ route('profile', ['id' => Auth::user()->id]) }}" class="no-decorations">
                        <div class="card shadow zoom mb-4">
                            <div class="card-body">
                                <h3>Profilo pubblico</h3>
                                <img src="{{asset("img/dashboard/cards/profilo-pubblico.jpg")}}" alt="" class="img_100">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <a href="{{ route('admin.reviews') }}" class="no-decorations">
                        <div class="card shadow zoom mb-4">
                            <div class="card-body">
                                <h3>Recensioni</h3>
                                <img src="{{asset("img/dashboard/cards/recensioni.jpg")}}" alt="" class="img_100">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <a href="{{ route('admin.messages') }}" class="no-decorations">
                        <div class="card shadow zoom mb-4">
                            <div class="card-body">
                                <h3>Messaggi</h3>
                                <img src="{{asset("img/dashboard/cards/messaggi.jpg")}}" alt="" class="img_100">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <a href="{{ route('admin.statistics', ['id' => Auth::user()->id]) }}" class="no-decorations">
                        <div class="card shadow zoom mb-4">
                            <div class="card-body">
                                <h3>Statistiche</h3>
                                <img src="{{asset("img/dashboard/cards/statistiche.jpg")}}" alt="" class="img_100">
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection
