@extends('layouts.app')

@section('content')
    
<div class="container">

    {{-- TEST --}}
    {{-- Qui adnrà un foreach --}}
    @foreach ($all_plans as $plan)
        @dump($plan)
    @endforeach

    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="..." alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">Piano sponsor</h5>
        <p class="card-text">Caccia i soldi.</p>
        <a href="#" class="btn btn-primary">Vai al piano singolo</a>
        </div>
    </div>

    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="..." alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">Piano sponsor</h5>
        <p class="card-text">Caccia i soldi.</p>
        <a href="#" class="btn btn-primary">Vai al piano singolo</a>
        </div>
    </div>

    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="..." alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">Piano sponsor</h5>
        <p class="card-text">Caccia i soldi.</p>
        <a href="#" class="btn btn-primary">Vai al piano singolo</a>
        </div>
    </div>
    {{-- END TEST --}}

</div>

@endsection