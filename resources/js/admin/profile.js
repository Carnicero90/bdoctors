var app = new Vue({
    el: '#root',
    data: {
        numbers: 0,
        preload: '',
        lines: 10,
        loadedPic: false 

    },
    methods: {
        preloadPic(event) {
            let f = event.target.files[0];
            this.preload = URL.createObjectURL(f);
            this.loadedPic = true;

        },
        destroy(event) {
            event.target.parentNode.remove();
        }
    },
    mounted() {
        // 
        this.lines = document.getElementById('self_description').value.split(/\r\n|\r|\n/).length;
    },
})