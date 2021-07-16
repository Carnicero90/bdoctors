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


        }
    },
    mounted() {
        axios.get('api/sponsored')
            .then(result => {
                this.sponsoredUsers = result.data;
            })
    }
})