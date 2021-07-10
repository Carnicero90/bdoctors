@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <p>Voti</p>
                @foreach (config('votes') as $item)
                    @dump($item)
                @endforeach
                <p>Rece</p>
                @dump(
                    Auth::user()->reviews[0]
                )
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- TOREMOVE --}}
                    <h1>BOOLBARDS</h1>

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
