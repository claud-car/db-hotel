var app = new Vue({
    el: "#root",
    data:{
        stanze:[],
        stanza:[]
    },
    mounted(){
        axios.get('http://localhost/5.database/db-hotel/visualizzazione_schermo_php_vue/api/stanze.php')
        .then((response) => {
            this.stanze = response.data.response;
        });
    },
    methods: {
        selezioneStanza: function(id) {
            console.log(id);
            axios.get(`http://localhost/5.database/db-hotel/visualizzazione_schermo_php_vue/api/stanze.php?id=${id}`)
            .then((response) => {
                this.stanza = response.data.response[0];
                console.log(this.stanza);
            });
     
        }
    }

}) //fine root


//http://localhost/5.database/db-hotel/visualizzazione_schermo_php_vue/api/stanze.php