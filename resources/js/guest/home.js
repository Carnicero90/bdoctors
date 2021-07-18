var Api = require('../api');
var app = new Vue({
    el: '#root',
    data: {
        users: [],
        sponsoredUsers: [],
        searchString: '',
        searching: false,
        selectedCategory: '',
        timeOutCounter: 0
    },
    methods: {
        searchUser() {
            // test sul coso (bounceback?)
            clearTimeout(this.timeOutCounter);
            if (this.searchString.length > 0) {
                this.searching = true;
                this.timeOutCounter = setTimeout(() => {
                    Api.promisedUsers(Api.allUsersPath, `name=${this.searchString}`, `cat=${this.selectedCategory}`)
                    .then(result => {
                        this.users = result.data.users.slice(0, 5);
                    })
                }, 500
                )
            }
            else {
                this.users = [];
                this.searching = false;
            }
        }
    },
    mounted() {
        Api.promisedUsers(Api.sponsoredUsersPath)
            .then(response => this.sponsoredUsers = response.data);
    }
})