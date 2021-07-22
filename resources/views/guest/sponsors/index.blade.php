@extends('layouts.app')

@section('content')

<div class="top-margine">
    <div class="container">

        {{-- HEADER --}}
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <div class="dashboard">
                    {{-- @include('partials.dashboard-nav') --}}
                </div>
            </div>
        </div>
        {{-- END HEADER --}}

        <div class="mt-3 mb-4">
            <h1>Piani di sponsorizzazione</h1>
        </div>
        
        <div class="row">
            @foreach ($all_plans as $plan)
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h3 class="card-title">{{ucfirst(str_replace("_", " ", $plan->name))}}</h3>
                            <h5>€ {{$plan->pricing}}</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-2"><p class="card-text">{{$plan->description}}</p></div>
                            <div class="mb-4"><span class="card-text">Durata {{$plan->duration_in_hours}} ore</span></div>
                            <div><a href="{{route('sponsor-show', ['slug' => $plan->slug])}}" class="btn btn-outline-primary">Vedi dettagli piano</a></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>

@endsection