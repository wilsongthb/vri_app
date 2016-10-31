Vue.component('vue-archivos', {
    template: '#vue-archivos',
    data: function(){
        return {
            c_url: false,
            url: 'http://localhost/p/dev/laravel-5.3/public/php/',
            src: 'src',
            lista: {},
            respuesta: false
        }
    },
    methods: {
        escanear: function(){
            $.getJSON('http://localhost/p/dev/laravel-5.3/public/php/escaner.php', {
                src: this.src
            },function(data){
                console.log(data);
                this.lista = data;
            }.bind(this))
        },
        ver: function(ruta){
            $.getJSON('http://localhost/p/dev/laravel-5.3/public/php/contenido.php', {
                ruta: ruta
            },function(data){
                console.log(data);
                alert(data);
            }.bind(this))
        },
        indexar: function(ruta){
            $.getJSON('http://localhost/p/dev/laravel-5.3/public/php/indexar.php', {
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