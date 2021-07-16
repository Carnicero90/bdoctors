const { default: Axios } = require("axios");
const { sortBy } = require("lodash");

var app = new Vue({
    el: '#root',
    data: {
        users: []

    },
    methods: {
        orderUserByReview() {
            this.users = this.users.sort((firstUser, secondUser) => secondUser - firstUser);
            console.table(this.users);
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