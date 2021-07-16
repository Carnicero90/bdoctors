var app = new Vue({
    el: '#root',
    data: {
        numbers: 0,
        preload: '',
        lines: 10
    },
    methods: {
        preloadPic(event) {
            let f = event.target.files[0];
            this.preload = URL.createObjectURL(f);
        },
        destroy(event) {
            event.target.parentNode.remove();
            // TODO: puo andare bene?
        }
    },
    mounted() {
        this.lines = document.getElementById('self_description').value.split(/\r\n|\r|\n/).length;
    },
})