console.log("test");
let messagesReviews = document.getElementById("messagesReviews").getContext("2d");
let messagesCanvas = document.getElementById("messagesCanvas").getContext("2d");
let reviewsCanvas = document.getElementById("reviewsCanvas").getContext("2d");
let months = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre",];

let messagesReviewsChart = new Chart(messagesReviews, {

    type: "bar",

    data: {
        labels: months,
        datasets: [
            {
                label: "Numero messaggi",
                data: messagesNumber,
                backgroundColor: ["#e3342f",],
            },
            {
                label: "Numero recensioni",
                data: reviewsNumber,
                backgroundColor: ["#3490dc",],
            },
        ],
        options: {
            legend: {
                display: false,
                position: "right",
            }
        }
    },

    options: {

    },
})

let messagesChart = new Chart(messagesCanvas, {

    type: "bar",

    data: {
        labels: months,
        datasets: [
            {
            label: "Numero messaggi",
            data: messagesNumber,
            backgroundColor: ["#e3342f",],
            },
        ]
    },

    options: {

    },
})

let reviewsChart = new Chart(reviewsCanvas, {

    type: "bar",

    data: {
        labels: months,
        datasets: [
            {
            label: "Numero recensioni",
            data: reviewsNumber,
            backgroundColor: ["#3490dc",],
            },
        ]
    },

    options: {

    },
})