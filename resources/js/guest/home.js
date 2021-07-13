const { default: Axios } = require("axios")

var app = new Vue({
    el: '#root',
    data: {
        users: []
    },
    methods: {
        /*
        * stampa name in console, seguito da un punto esclamativo
        *
        * @param str name
        * return void
        */
       sample_func(name) {
        console.log(name + '!')
       }
    },
    mounted() {
        Axios.get('api/sponsored')
        .then(result => {
            this.users = result.data;
            console.log(this.users)
        })
    }
})