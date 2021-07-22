var Api = require('../api');
var app = new Vue({
    el: '#root',
    data: {
        users: [],
        sponsoredUsers: [],
        searchString: '',
        selectedCategory: 0,
        timeOutCounter: 0,
        tot_to_show: 4,
        start_index: 0
    },
    methods: {
        slideLeft() {
            const slicer = this.start_index - this.tot_to_show;
            if ( slicer < 0 ) {
                this.sponsoredUsers = [...this.sponsoredUsers.slice(this.sponsoredUsers.length + slicer, this.sponsoredUsers.length), ...this.sponsoredUsers.slice(0, this.sponsoredUsers.length + slicer)]
            }
            else {
                this.start_index -= this.tot_to_show;
            }
        },
        slideRight() {
            const slicer = this.start_index + this.tot_to_show;
            if (slicer > this.sponsoredUsers.length -1 -this.tot_to_show) {
                this.sponsoredUsers = [...this.sponsoredUsers.slice(this.sponsoredUsers.length - slicer, this.sponsoredUsers.length), ...this.sponsoredUsers.slice(0, this.sponsoredUsers.length - slicer)]
            }
            else {
                this.start_index = slicer;
            }

        },
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
    created() {
        setInterval(() => {
            this.slideRight();
        }, 5000)
    },

    computed: {
       searchParams() {
           return {
               name: this.searchString,
               cat: this.advsearchCat
           };
       },
       searching() {
           return this.searchString.length > 0;
       },

       advsearchCat() {
           return this.selectedCategory || ''
       }
    }

})