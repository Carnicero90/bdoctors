import Axios from "axios";

var app = new Vue({
    el: '#root',
    data: {
        user_id: -1,
        reviews: [],
        reviews_to_show: 5,
    },
    mounted() {
       this.user_id = document.getElementById('userid').value;
       axios.get('../api/reviews/' + this.user_id)
       .then(response => {
           this.reviews = response.data.reviews;
       })
    }
});