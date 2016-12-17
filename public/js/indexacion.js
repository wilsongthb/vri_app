Vue.component('vue-archivos', {
    template: '#vue-archivos',
    props: ['url'],
    data: function(){
        return {
            c_url: false,
            src: 'src',
            lista: {},
            respuesta: false
        }
    },
    methods: {
        escanear: function(){
            $.getJSON(this.url + 'escaner.php', {
                src: this.src
            },function(data){
                console.log(data);
                this.lista = data;
            }.bind(this))
        },
        ver: function(ruta){
            $.getJSON(this.url + 'contenido.php', {
                ruta: ruta
            },function(data){
                console.log(data);
                alert(data);
            }.bind(this))
        },
        indexar: function(ruta){
            $.getJSON(this.url + 'indexar.php', {
                ruta: ruta
            },function(data){
                console.log(data);
                if(data.error == ''){
                    this.respuesta = 'exito';
                }else{
                    this.respuesta = 'error';
                }
            }.bind(this))
        }
    },
    created: function(){
        this.escanear();
    }
})

new Vue({
    el: '#app'
})