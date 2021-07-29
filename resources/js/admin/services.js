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
        },
    },

    mounted() {
    }
})