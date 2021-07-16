var app = new Vue({
    el: '#root',
    data: {
        numbers: 0,
        preload: ''
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
})