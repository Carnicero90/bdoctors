var Api = require('../api');
// TODO: funziona ma e' inaccettabile, non essere pigro e rifallo decentemente quando sei meno stanco e sciatto
var app = new Vue({
    el: '#root',
    data: {
        users: [],
        params: '',
        visibleUsers: [],
        searchString: '',
        categories: [],
        selectedCategories: [],
        timeOutCounter: 0,
    },
    methods: {
        searchUser() {
            clearTimeout(this.timeOutCounter);
            if (this.searchString.length > 0) {
                this.timeOutCounter = setTimeout(() => {

                    Api.promisedUsers(Api.allUsersPath, { name: this.searchString, ...Api.parseQueryString(this.parsedCategories) })
                        .then(result => {
                            this.users = result.data.users;
                        })
                }, 500)
            }
            else {
                this.users = [];
                this.searching = false;
            }
        },

        addOrRemoveCat(id) {
            if (this.selectedCat(id)) {
                this.selectedCategories = this.selectedCategories.filter((el) => el != id);
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
            const params = Api.parseQueryString(location.search);
            if (params['cat']) {
                this.selectedCategories.push(parseInt(params['cat']));
            }
            this.searchString = params['name'];
            console.log(this.selectedCategories)
            Api.promisedUsers(Api.allUsersPath, params)
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
            return this.selectedCategories.map((value, index) => `cat[${index}]=${value}`).join('&');
        }
    }
})