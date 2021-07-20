@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="card mt-4">
            <div class="card-body">
                <h4 class="card-title">Piano {{ ucfirst(str_replace('_', ' ', $sponsorPlan->name)) }}</h4>
                <div class="mb-2">
                    <p class="card-text text-secondary">{{ $sponsorPlan->description }}</p>
                </div>
                <div class="mb-4"><span class="card-text">Sponsorizzazione da {{ $sponsorPlan->duration_in_hours }} ore
                </div>
                @if (Auth::user())
                    <div><a href="{{ route('admin.pay', ['id' => $sponsorPlan->id]) }}"
                            class="btn btn-success">Acquista a soli € {{ $sponsorPlan->pricing }}</a></div>

                @else
                    <div><a href="{{ route('register') }}" class="btn btn-success">Iscriviti per accedere ai nostri piani
                            premium {{ $sponsorPlan->pricing }}</a></div>

                @endif
            </div>
        </div>
    </div>

@endsection
