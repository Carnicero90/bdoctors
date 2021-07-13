const { default: Axios } = require("axios")

var app = new Vue({
    el: '#root',
    data: {},
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
        
    }
})