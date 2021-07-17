var app = new Vue({
    el: '#root',
    data: {
        vote: 0,
        votes: []
    },
    methods: {
        selectVote(event) {
        }
    },

    mounted() {
        axios.get('http://127.0.0.1:8000/api/votes/index')
        // TODO: non sono sicuro del perche non mi trovi sta route, vedi documentazione
        .then(result => {
            console.log(result)
            this.votes = result.data.votes;
        })
    }
})