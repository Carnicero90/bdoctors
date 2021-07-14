const { default: Axios } = require("axios")

var app = new Vue({
    el: '#root',
    data: {
        users: [],
        sponsoredUsers: [],
        searchString: '',
        searching: false
    },
    methods: {
      searchUser() {
          this.searching = true;
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
            this.sponsoredUsers = result.data;
        })
    }
})