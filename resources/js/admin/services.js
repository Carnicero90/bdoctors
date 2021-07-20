var app = new Vue({
    el: '#root',
    data: {
        show: false,
        old_services: []
    },
    methods: {
        showForm() {
            this.show = true;
            console.log(this.show)
        }
    },

    mounted() {

    }
})