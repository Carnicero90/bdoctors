var app = new Vue({
    el: '#root',
    data: {
        users: [],
        params: '',
        visibleUsers: [],
        avg_vote: 0,
        searchString: '',
        selectedCategory: ''
    },
    methods: {
        searchUser() {
            // TODO: cambia lunghezza stringa minima, ora comoda cosi per test
            if (this.searchString.length > 0) {
                console.log(this.searchString)
                axios.get(`api/search?name=${this.searchString}&cat=${this.selectedCategory}`)
                    .then(result => {
                        this.users = result.data.users;
                        console.log(`api/search?name=${this.searchString}&cat=${this.selectedCategory}`)
                    })

            }
            else {
                this.users = [];
                this.searching = false;
            }


        },

        sortUsersByReviewAvg() {
            return this.users.sort((a, b) => b.avg_vote - a.avg_vote);
        },

        sortUsersByReviewNum() {
            return this.users.sort((a, b) => b.nmb_reviews - a.nmb_reviews);
        }
    },
    mounted() {
        this.params = location.search;
        this.searchString = new URLSearchParams(location.search).get('name');
        // TODO: sembra un poco ripetitivo? inoltre e' uguale alla home, c'e' da fattorizzare
        // TODO: anche qua funzia solo se categoria selezionata, va corretta API

        axios.get(`api/search${this.params}`)
            .then(result => {
                this.users = result.data.users;
            })
    }
})