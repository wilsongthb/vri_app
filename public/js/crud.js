Vue.component('crud-tag', {
    template: '#crud-tag',
    data: function(){
        return {
            link: '../models/estudiantes',
            respuesta: {}
        }
    },
    methods: {
        leer: function(link){
            $.getJSON(link, function(respuesta){
                this.respuesta = respuesta;
            }.bind(this))
        },
        cargar: function(pagina){
            var new_link = this.link + '?page=' + pagina;
            //alert(new_link);
            this.leer(new_link);
        }
    },
    created: function(){
        this.leer(this.link);
    }
})
new Vue({
    el: '#crud'
})