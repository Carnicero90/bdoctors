@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="card mt-4">
            <div class="card-body">
                <h4 class="card-title">Piano {{ucfirst(str_replace("_", " ", $sponsorPlan->name))}}</h4>
                <div class="mb-2"><p class="card-text text-secondary">{{$sponsorPlan->description}}</p></div>
                <div class="mb-4"><span class="card-text">Sponsorizzazione da {{$sponsorPlan->duration_in_hours}} ore</div>
                <div><a href="{{route('sponsor-store', ['id' => $sponsorPlan->id ])}}" class="btn btn-success">Acquista a soli € {{$sponsorPlan->pricing}}</a></div>
            </div>
        </div>
    </div>

@endsection