@extends('layouts.app')
@section('header-scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"
        integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- ChartJS cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


@endsection

@section('footer-scripts')

    <script>
        const id = {{ Auth::user()->id }};
        let stats;
        axios.get('../../api/stats?id=' + id)
            .then(response => stats = response.data)
            .finally(() => {
                const messages = stats['messages'];
                const reviews = stats['reviews'];

                const now = new Date();
                console.log(now.getMonth())
                const labels = messages.map(item => item.month + '/' + item.year);
                console.log(labels);
                console.log(messages);


                // let messagesReviews = document.getElementById("messagesReviews").getContext("2d");
                // let messagesCanvas = document.getElementById("messagesCanvas").getContext("2d");
                // let reviewsCanvas = document.getElementById("reviewsCanvas").getContext("2d");

                // let messageCanvasChart = new Chart(messagesCanvas, {
                //     type: 'bar',
                //     datasets: [{
                //         data: messages,
                //     backgroundColor: ["#e3342f", ],
                //     }  ]
                
                

                // },
                // options: {
                //     parsing: {
                //         xAxisKey: 'month'
                //         yAxisKey: 'tot'
                //     }
                // })

                // let messagesReviewsChart = new Chart(messagesReviews, {

                //     type: "bar",

                //     data: {
                //         labels: [labels],
                //         datasets: {
                //                 label: 'Messaggi',
                //                 data:
                //                 parsing: {
                //                     yAxisKey: 'tot'
                //                 },
                //                 backgroundColor: ["#e3342f", ],
                //             },
                //             {
                //                 label: "Numero recensioni",
                //                 data: reviews,
                //                 parsing: {
                //                     yAxisKey: 'tot'
                //                 },
                //                 backgroundColor: ["#3490dc", ],
                //             },
                //         ],
                //         options: {
                //             legend: {
                //                 display: false,
                //                 position: "right",
                //             }
                //         }
                //     },

                //     options: {

                //     },
                // })

                //     let messagesChart = new Chart(messagesCanvas, {

                //         type: "bar",

                //         data: {
                //             labels: months,
                //             datasets: [{
                //                 label: "Numero messaggi",
                //                 data: messagesNumber,
                //                 backgroundColor: ["#e3342f", ],
                //             }, ]
                //         },

                //         options: {

                //         },
                //     })

                //     let reviewsChart = new Chart(reviewsCanvas, {

                //         type: "bar",

                //         data: {
                //             labels: months,
                //             datasets: [{
                //                 label: "Numero recensioni",
                //                 data: reviewsNumber,
                //                 backgroundColor: ["#3490dc", ],
                //             }, ]
                //         },

                //         options: {

                //         },
                //     })
            });
    </script>

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
