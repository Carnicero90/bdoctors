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
            .finally(() => {
                const last_year = stats['last_year'];
                const messages = stats['messages'];
                const message_dates = messages.map(item => item.date);

                const reviews = stats['reviews'];
                const review_dates = reviews.map(item => item.date);

                // last_year.forEach(element => {
                //    if (!message_dates.includes(element)) {
                //        messages.push({
                //            tot: 0,
                //            date: element
                //        })
                //    }
                //    if (!review_dates.includes(element)) {
                //        reviews.push({
                //            tot: 0,
                //            date: element
                //        })
                //    }
                // });

                const messagesCanvas = document.getElementById("messagesCanvas").getContext("2d");
                const reviewsCanvas = document.getElementById("reviewsCanvas").getContext("2d");
                const averageVotes = document.getElementById("averageVotes").getContext("2d");

                const reviewsCanvasChart = new Chart(reviewsCanvas, {
                    type: 'bar',
                    data: {
                        datasets: [{
                            label: 'Recensioni ricevute',
                            data: reviews,
                            backgroundColor: ["green"],
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
                            data: messages,
                            backgroundColor: ["#e3342f", ],
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
                            data: reviews,
                            backgroundColor: ['blue', ],
                            parsing: {
                                yAxisKey: 'avg_vote',
                                xAxisKey: 'date',
                            }

                        }]
                    }
                });
            });
    </script>

@endsection

@section('content')
    <div class="container">
        <h1>Statistiche utente</h1>
        <div class="row">

            {{-- section#mails --}}
            <section id="mails" class="col-6 mt-5 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h2>Messaggi ricevuti per mese</h2>
                    </div>
                    <div class="card-body">
                        <canvas id="messagesCanvas"></canvas>
                    </div>
                </div>
            </section>
            {{-- END section#mails --}}

            {{-- section#reviews --}}
            <section id="reviews" class="col-6 mt-5 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h2>Recensioni ricevute per mese</h2>
                    </div>
                    <div class="card-body">
                        <canvas id="reviewsCanvas"></canvas>
                    </div>
                </div>
            </section>
            {{-- END section#reviews --}}

            {{-- section#votes --}}
            <section id="votes" class="col-6 mt-5 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h2>Voto medio recensioni per mese</h2>
                    </div>
                    <div class="card-body">
                        <canvas id="averageVotes"></canvas>
                    </div>
                </div>
            </section>
            {{-- END section#votes --}}
        </div>
    </div>
@endsection
