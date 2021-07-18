var app = new Vue({
    el: '#root',
    data: {
        value: -1,
        votes: [],
        clickedValue: -1,
        selectedValue: null
    },
    methods: {
        fillStars(index) {
            this.value = index;
        },
        selectVoteValue(index, voteValue) {
            // al click
            this.clickedValue = index;
            this.selectedValue = voteValue;
        },
        backToPreviousVoteValue() {
            // al mouseleave
            if (this.clickedValue > -1) 
            // verifica se l'utente ha gia' selezionato un voto
            {
                this.fillStars(this.clickedValue);
            }
            else 
            {
                this.fillStars(-1);
            }
        }
        
    },

    mounted() {
        axios.get('../api/votes/index')
        .then(result => {
            this.votes = result.data.votes;
        })
    }
})