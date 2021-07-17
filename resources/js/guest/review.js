var app = new Vue({
    el: '#root',
    data: {
        value: -1,
        votes: [],
        clickedValue: -1
    },
    methods: {
        fillStars(index) {
            this.value = index;
        }
    },

    mounted() {
        axios.get('../api/votes/index')

        // .catch(function (error) {
        //     console.log(error);
        // })
        .then(result => {
            this.votes = result.data.votes;
        })
    }
})