const { default: Axios } = require("axios")

var app = new Vue({
    el: '#root',
    data: {
        users: [],
        sponsoredUsers: [],
        searchString: '',
        searching: false,
        selectedCategory: '',
    },
    methods: {
        searchUser() {
            if (this.searchString.length > 2) {
                if (this.selectedCategory) {
                    this.searching = true;
                    Axios.get(`api/test?name=${this.searchString}&cat=${this.selectedCategory}`)
                    .then(result => {
                        this.users = result.data.users.slice(0,5);
                    })
                }
                else {
                    this.searching = true;
                    Axios.get(`api/index?name=${this.searchString}`)
                        .then(result => {
                            this.users = result.data.users.slice(0,5);
                        })
                }
            }
            else {
                this.users = [];
                this.searching = false;
            }


        }
    },
    mounted() {
        Axios.get('api/sponsored')
            .then(result => {
                this.sponsoredUsers = result.data;
            })
    }
})