@extends('layouts.app')

@section('content')

    <div class="container">

        <h1>Piani di sponsorizzazione</h1>

        @foreach ($all_plans as $plan)
            <div class="col-4 d-inline-block" style="width: 33%;">
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class="card-title">Piano {{ucfirst(str_replace("_", " ", $plan->name))}}</h4>
                        <div class="mb-2"><p class="card-text text-secondary">{{$plan->description}}</p></div>
                        <div class="mb-4"><span class="card-text">Durata {{$plan->duration_in_hours}} ore - </span><span>Prezzo € {{$plan->pricing}}</span></div>
                        <div><a href="{{route('sponsor-show', ['slug' => $plan->slug])}}" class="btn btn-primary">Vedi dettagli piano</a></div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

@endsection