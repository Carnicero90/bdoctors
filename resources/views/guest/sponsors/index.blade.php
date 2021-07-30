@extends('layouts.app')

@section('content')

    <div class="top-margine">
        <div class="container">

            <div class="mt-3 mb-5 text-center">
                <h1>Piani di sponsorizzazione</h1>
            </div>

            <div class="row">
                @foreach ($all_plans as $plan)
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                        <div class="card mb-4 text-center">
                            <div class="card-body">
                                <div class="sponsor-title">
                                    <h2>{{$plan->name}}</h2>
                                </div>
                                <div class="sponsor-price mt-3 mb-4">
                                    <h3>{{$plan->pricing}}<small>€</small></h3>
                                </div>
                                <div class="sponsor-description">
                                    <div class="mb-4">
                                        <span><i class="fas fa-check mr-2"></i>Assistenza 7 giorni su 7</span>
                                    </div>
                                    <div class="mb-4">
                                        <span><i class="fas fa-check mr-2"></i>Migliora il tuo posizionamento nella ricerca in Homepage</span>
                                    </div>
                                    <div class="mb-4">
                                        <span><i class="fas fa-check mr-2"></i>Migliora il tuo posizionamento nella ricerca avanzata</span>
                                    </div>
                                    <div class="mb-4">
                                        <span><i class="fas fa-check mr-2"></i>Profilo visualizzato in Homepage come Artista del momento</span>
                                    </div>
                                    <div class="mb-4">
                                        <span><i class="fas fa-check mr-2"></i>Badge<small class="badge badge-top ml-2 mr-2">Top Bard</small>sul tuo profilo</span>
                                    </div>
                                    <div class="mb-4">
                                        @if (!$plan->savings)
                                            <span><i class="fas fa-times mr-2"></i>Nessun risparmio</span>
                                        @else
                                            <span><i class="fas fa-check mr-2"></i>Risparmio del {{$plan->savings}}%</span>
                                        @endif
                                    </div>
                                    <div class="mb-4">
                                        <span><i class="fas fa-check mr-2"></i>Durata<span class="sponsor-duration text-white ml-2 mr-2">{{$plan->duration_in_hours}}</span>ore</span>
                                    </div>
                                </div>

                                @if (Auth::user())
                                    <div><a href="{{ route('admin.pay', ['id' => $plan->id]) }}" class="btn btn-outline-success">Acquista</a></div>
                                @else
                                    <div><a href="{{ route('register') }}" class="btn btn-outline-success">Iscriviti per acquistare il piano</a></div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

@endsection
