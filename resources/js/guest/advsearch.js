var app = new Vue({
    el: '#root',
    data: {
        users: [],
        params: '',
        visibleUsers: [],
        avg_vote: 0,
        searchString: '',

    },
    methods: {
        searchUser() {
            // TODO: cambia lunghezza stringa minima, ora comoda cosi per test
            if (this.searchString.length > 0) {
                if (this.selectedCategory) {
                    this.searching = true;
                    axios.get(`api/test?name=${this.searchString}&cat=${this.selectedCategory}`)
                    .then(result => {
                        this.users = result.data.users.slice(0,5);
                    })
                }
                else {
                    this.searching = true;
                    axios.get(`api/index?name=${this.searchString}`)
                        .then(result => {
                            this.users = result.data.users.slice(0,5);
                        })
                }
            }
            else {
                this.users = [];
                this.searching = false;
            }


        },

        sortUsersByReviewAvg() {
           return this.users.sort((a,b) => b.avg_vote - a.avg_vote );
        },
       
        sortUsersByReviewNum() {
           return this.users.sort((a,b) => b.nmb_reviews - a.nmb_reviews );
        }
    },
    mounted() {
        this.params = location.search;
        let a = new URLSearchParams(location.search);
        // TODO: usarlo in un qualche modo, che pare comodo

        // per ora funzia solo se ci sono i params, domani finisco
        axios.get(`api/test${this.params}`)
        .then(result => {
            this.users = result.data.users;
        })
    }
})