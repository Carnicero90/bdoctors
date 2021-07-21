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

                test = last_year.map(el => {
                    return {
                        tot: 0,
                        date: el
                    }
                });
                messages.forEach(element => {
                    test[test.findIndex(el => el.date = element.date)].tot = element.tot;
                    console.log(test[test.findIndex(el => el.date = element.date)])
                });
                console.log(test)
                console.log(last_year)
                console.log(messages)

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
                            data: messages,
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
                            data: reviews,
                            backgroundColor: ['#4e6b8c', ],
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

        <div class="mt-3 mb-4">
            <h1>Statistiche utente</h1>
        </div>

        <div class="row">

            <div class="col-6 mb-5">
                {{-- section#mails --}}
                <section id="mails">
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
            </div>

            <div class="col-6 mb-5">
                {{-- section#reviews --}}
                <section id="reviews">
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
            </div>

            <div class="col-6 mb-5">
                {{-- section#votes --}}
                <section id="votes">
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
    </div>
</div>
@endsection
