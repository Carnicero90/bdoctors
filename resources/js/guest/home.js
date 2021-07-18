var Api = require('../api');
var app = new Vue({
    el: '#root',
    data: {
        users: [],
        sponsoredUsers: [],
        searchString: '',
        selectedCategory: 0,
        timeOutCounter: 0
    },
    methods: {
        searchUser() {
            // test sul coso (bounceback?)
            clearTimeout(this.timeOutCounter);
            if (this.searching) {
                this.timeOutCounter = setTimeout(() => {
                    Api.promisedUsers(Api.allUsersPath, this.searchParams)
                        .then(result => {
                            this.users = result.data.users.slice(0, 5);
                        })
                }, 500
                )
            }
        }
    },
    mounted() {
        Api.promisedUsers(Api.sponsoredUsersPath)
            .then(response => this.sponsoredUsers = response.data);
    },
    computed: {
       searchParams() {
           return {
               name: this.searchString,
               cat: this.selectedCategory || ''
           };
       },
       searching() {
           return this.searchString.length > 0;
       }
    }

})