const { default: Axios } = require("axios");
const { sortBy } = require("lodash");

var app = new Vue({
    el: '#root',
    data: {
        users: [],
        visibleUsers: [],
        avg_vote: 0,

    },
    methods: {
        sortByReviewRate() {
           this.users = this.users.filter(user => user.avg_vote > this.avg_vote )
        },
       
        orderUserByReview() {
           return this.users.sort((a,b) => b.nmb_reviews -a.nmb_reviews );
        }
    },
    mounted() {
        this.params = location.search;
        // per ora funzia solo se ci sono i params, domani finisco
        Axios.get(`api/test${this.params}`)
        .then(result => {
            this.users = result.data.users;
            console.log(this.users)
        })
    }
})