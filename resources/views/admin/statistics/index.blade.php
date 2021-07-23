@extends('layouts.app')

@section('header-scripts')
    {{-- Axios cdn --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"
        integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- ChartJS cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

@section('footer-scripts')
    {{-- ChartJS stuff --}}
    <script>
        const id = {{ Auth::user()->id }};
        let stats;
        axios.get('../../api/stats?id=' + id)
            .then(response => stats = response.data)
            .catch((reason) => document.querySelector('#page-content').innerHTML = reason)
            .finally(() => {

                const messagesCanvas = document.getElementById("messagesCanvas").getContext("2d");
                const reviewsCanvas = document.getElementById("reviewsCanvas").getContext("2d");
                const averageVotes = document.getElementById("averageVotes").getContext("2d");
                // in caso non arrivino le stats, per qualche ragione non 'coperta' dal catch
                if (!stats) {
                    document.querySelector('#page-content').innerHTML =
                        "Siamo spiacenti, non è stato possibile caricare le tue statistiche. Riprovare più tardi"
                    return
                }

                const last_year = stats[
                'last_year']; // array di stringhe (le date dei mesi dell'ultimo anno solare, ordinate)
                const messages = stats['messages']; // array di oggetti, elenco dei messaggi ricevuti per mese
                const reviews = stats[
                'reviews']; // array di oggetti, elenco delle recensioni ricevute per mese e relativa media voti mensile

                // creiamo degli array di oggetti in cui siano presenti anche i mesi in cui il totale dei messaggi o delle recensioni e' == 0
                const mess_months = fillEmptyMonths(messages, last_year, 'date');
                const rev_months = fillEmptyMonths(reviews, last_year, 'date');

                // popoliamo i nostri grafici
                const reviewsCanvasChart = new Chart(reviewsCanvas, {
                    type: 'bar',
                    data: {
                        datasets: [{
                            label: 'Recensioni ricevute',
                            data: rev_months,
                            backgroundColor: ["#4e8c8c"],
                            parsing: {
                                yAxisKey: 'tot',
                                xAxisKey: 'date'
                            }
                        }]
                    }
                })

                const messageCanvasChart = new Chart(messagesCanvas, {
                    type: 'bar',
                    data: {
                        datasets: [{
                            label: 'Messaggi ricevuti',
                            data: mess_months,
                            backgroundColor: ["#8c4e4e", ],
                            parsing: {
                                yAxisKey: 'tot',
                                xAxisKey: 'date',
                            }

                        }]
                    }
                });

                const avgVotes = new Chart(averageVotes, {
                    type: 'bar',
                    data: {
                        datasets: [{
                            label: 'Media recensioni',
                            data: rev_months,
                            backgroundColor: ['#4e6b8c', ],
                            parsing: {
                                yAxisKey: 'avg_vote',
                                xAxisKey: 'date',
                            }

                        }]
                    }
                });
// TODO: non so di preciso come commentarla, il problema è che dal backend arrivano dati fondamentalmente eterogenei e vengono 'normalizzati' qua, quindi a chi legge ma non ha scritto può risultare poco chiara
                function fillEmptyMonths(filler, year, field) {
                    const fillable = Array.from(year, function(i){
                        const j = {};
                        j[field] = i;
                        return j;
                    })

                    filler.forEach(element => {
                        fillable[fillable.findIndex(el => el[field] == element[field])] = {
                            ...element
                        };
                    })
                    return fillable;
                }
            });
    </script>

@endsection

@section('content')
    <div class="top-margine">
        <div class="container">

            {{-- HEADER --}}
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <div class="dashboard">
                        @include('partials.dashboard-nav')
                    </div>
                </div>
            </div>
            {{-- END HEADER --}}

            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4 mb-4">
                    <h1>Statistiche utente</h1>
                    <div>
                        <a href="#mails" class="btn mr-2 text-white" style="background-color: #8c4e4e">Messaggi ricevuti</a>
                        <a href="#reviews" class="btn mr-2 text-white" style="background-color: #4e8c8c">Recensioni ricevute</a>
                        <a href="#votes" class="btn mr-2 text-white" style="background-color: #4e6b8c">Media voti</a>
                    </div>
                </div>
            </div>

            <div class="row" id="page-content">

                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-4 mb-4">
                    {{-- section#mails --}}
                    <section id="mails">
                        <div class="card">
                            <div class="card-header">
                                <h3>Messaggi ricevuti per mese</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="messagesCanvas"></canvas>
                            </div>
                        </div>
                    </section>
                    {{-- END section#mails --}}
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-4 mb-4">
                    {{-- section#reviews --}}
                    <section id="reviews">
                        <div class="card">
                            <div class="card-header">
                                <h3>Recensioni ricevute per mese</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="reviewsCanvas"></canvas>
                            </div>
                        </div>
                    </section>
                    {{-- END section#reviews --}}
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-4 mb-4">
                    {{-- section#votes --}}
                    <section id="votes">
                        <div class="card">
                            <div class="card-header">
                                <h3>Voto medio recensioni per mese</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="averageVotes"></canvas>
                            </div>
                        </div>
                    </section>
                    {{-- END section#votes --}}
                </div>
            </div>
        </div>
    </div>
@endsection
