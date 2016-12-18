Vue.component('vue-archivosycarpetas', {
    template: "#vue-archivosycarpetas",
    data: function(){
        return {
            ver_url: false,
            url: '/php/',
            src: 'files',
            escaner: 'escaner.php',
            lista: {},
            respuesta: false
        }
    },
    methods: {
        escanear: function(){
            $.getJSON(this.url + this.escaner, {
                src: this.src,
                rutas: 'si'
            },function(data){
                this.lista = data;
            }.bind(this))
        },
    },
    created: function(){
        this.escanear();
    }
});

new Vue({
    el: '#app',
    data: {
        msg: 'XD'
    }
});