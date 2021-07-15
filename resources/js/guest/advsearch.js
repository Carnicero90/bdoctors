const { default: Axios } = require("axios")

var app = new Vue({
    el: '#root',
    data: {
        users: []

    },
    methods: {
       
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