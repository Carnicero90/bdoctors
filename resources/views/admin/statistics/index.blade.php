@extends('layouts.app')
@section('header-scripts')

    {{-- ChartJS cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endsection

@section('footer-scripts')

    {{-- file JavaScript --}}
    <script src="{{ asset('js/stats.js') }}"></script>

@endsection

@section('content')
        <div class="container">

            <h1>Statistiche</h1>

            <div class="row">

                <div class="col-12 mt-5 mb-5">
                    <div class="card">
                        <div class="card-header">
                            <h2>Messaggi e Recensioni</h2>
                        </div>
                        <div class="card-body">
                            <canvas id="messagesReviews"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-5 mb-5">
                    <div class="card">
                        <div class="card-header">
                            <h2>Messaggi</h2>
                        </div>
                        <div class="card-body">
                            <canvas id="messagesCanvas"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-5 mb-5">
                    <div class="card">
                        <div class="card-header">
                            <h2>Recensioni</h2>
                        </div>
                        <div class="card-body">
                            <canvas id="reviewsCanvas"></canvas>
                        </div>
                    </div>
                </div>

            </div>

        </div>
@endsection