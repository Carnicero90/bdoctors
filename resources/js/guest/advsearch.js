// TODO: funziona ma e' inaccettabile, non essere pigro e rifallo decentemente quando sei meno stanco e sciatto
var app = new Vue({
    el: '#root',
    data: {
        users: [],
        params: '',
        searchString: '',
        categories: [],
        selectedCategories: [],
    },
    methods: {
        searchUser() {
            // TODO: cambia lunghezza stringa minima, ora comoda cosi per test
            if (this.searchString.length > 0) {
                axios.get(`api/search?name=${this.searchString}${this.parsedCategories}`)
                    .then(result => {
                        this.users = result.data.users;
                    })
            }
            else {
                this.users = [];
                this.searching = false;
            }


        },

        addOrRemoveCat(id) {
            if (this.selectedCat(id)) 
            {
                this.selectedCategories = this.selectedCategories.filter((el) => el!=id);
            }
            else {
                this.selectedCategories.push(id);
            }
            this.searchUser();
        },

        selectedCat(id) {
            return this.selectedCategories.includes(id);
        },

        sortUsersByReviewAvg() {
            return this.users.sort((a, b) => b.avg_vote - a.avg_vote);
        },

        sortUsersByReviewNum() {
            return this.users.sort((a, b) => b.nmb_reviews - a.nmb_reviews);
        }
    },
    mounted() {
        if (location.search) {
            this.params = location.search;
            this.searchString = new URLSearchParams(this.params).get('name');
            axios.get(`api/search${this.params}`)
                .then(result => {
                    this.users = result.data.users;
                })
        }
        axios.get(`api/categories/index`)
            .then(result => {
                this.categories = result.data.categories;
            })
        // TODO: sembra un poco ripetitivo? inoltre e' uguale alla home, c'e' da fattorizzare

    },
    computed:
    {
        parsedCategories() {
            if (this.selectedCategories.length > 0) {
                return `&cat[]=${this.selectedCategories.join('&cat[]=')}`
            }
            return ''
        }
    }
})