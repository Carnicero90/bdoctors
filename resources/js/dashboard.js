var app = new Vue({
    el: '#root',
    data: {
        title: 'Lista Mail',
        mails: [],
        id: false,
        password: false
    },
    mounted() {
        this.id = document.querySelector('meta[name=user-id]').content;
        this.password = document.querySelector('meta[name=token').content
        axios.get(`/api/messages?id=${this.id}&password=${this.password}`)
            .then((response) => {
                this.mails = response.data.data;
                console.log(response)
            })
    }

});