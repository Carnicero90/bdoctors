var app = new Vue({
    el: '#root',
    data: {
        users: [],
        sponsoredUsers: [],
        searchString: '',
        searching: false,
        selectedCategory: '',
        counter: 0
    },
    methods: {
        searchUser() {
            // test sul coso (bounceback?)
            clearTimeout(this.counter);
            if (this.searchString.length > 0) {
                this.searching = true;
                this.counter = setTimeout(() => {
                    console.log('searching')
                    axios.get(`api/search?name=${this.searchString}&cat=${this.selectedCategory}`)
                    .then(result => {
                        this.users = result.data.users.slice(0, 5);
                    })
                }, 600
                )

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