var app = new Vue({
    el: '#root',
    data: {
        show: false,
    },
    methods: {
        showForm() {
            this.show = true;
            console.log(this.show)
        }
    }
})