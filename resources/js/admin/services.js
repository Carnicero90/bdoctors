var app = new Vue({
    el: '#root',
    data: {
        show: false,
        formModify: false,
        old_services: [],
    },
    methods: {
        showForm() {
            this.show = true;
        },

        changeFormModify() {
            this.formModify = true;
            console.log(this.formModify);
        },
    },

    mounted() {
        console.log(this.formModify);
    }
})