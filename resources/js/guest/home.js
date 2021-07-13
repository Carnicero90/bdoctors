const { default: Axios } = require("axios")

var app = new Vue({
    el: '#root',
    data: {
        users: [],
        searchString: ''
    },
    methods: {
        /*
        * stampa name in console, seguito da un punto esclamativo
        *
        * @param str name
        * return void
        */
    },
    mounted() {
        Axios.get('api/sponsored')
        .then(result => {
            this.users = result.data;
            console.log(this.users)
        })
    }
})