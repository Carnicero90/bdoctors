@extends('layouts.app')

@section('content')

    <div class="container">

        {{-- TEST --}}
        {{-- Qui adnrà un foreach --}}
        @foreach ($all_plans as $plan)
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ ucfirst(str_replace('_', ' ', $plan->name)) }}</h5>
                    <p class="card-text">{{ $plan->description }}</p>
                    <a href="{{ route('sponsor-show', ['slug' => $plan->slug]) }}" class="btn btn-primary">Vai al piano singolo</a>
                </div>
            </div>
        @endforeach
        {{-- END TEST --}}

    </div>

@endsection
