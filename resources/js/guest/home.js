const { default: Axios } = require("axios")

var app = new Vue({
    el: '#root',
    data: {
        users: [],
        searchString: ''
    },
    methods: {
      searchUser() {
        console.log(this.searchString);
        Axios.get(`api/index?name=${this.searchString}`)
        .then(result => {
            this.users = result.data.users;
            console.log(this.users);
        })
      }
    },
    mounted() {
        Axios.get('api/sponsored')
        .then(result => {
            this.users = result.data;
            console.log(this.users)
        })
    }
})