Vue.component('vue-archivosycarpetas', {
    template: "#vue-archivosycarpetas",
    props: ['clave', 'url'],
    data: function(){
        return {
            ver_url: false,
            // url: '/php/',
            src: 'files/txt',
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
        seleccionar: function(ruta){
            archivo[this.clave] = ruta;
            this.$emit('terminar');
        },
        terminar: function(){
            this.$emit('terminar');
        }
    },
    created: function(){
        this.escanear();
    }
});

var archivo = ['',''];

Vue.component('vue-comparar', {
    template: '#vue-comparar',
    data: function(){
        return {
            url: '/php/comparar.php',
            ruta: [],
            txt1: '',
            txt2: '',
            ver: {
                f1: false,
                f2: false
            },
            select: 3,
            identificador: 'comparar_'+Date.now()+'.txt'
        }
    },
    methods: {
        terminar: function(){
            this.ruta = archivo;
            this.select = 3;
        },
        comparar: function(){
            $.post(
                this.url,
                {
                    nombre: this.identificador,
                    ruta1: this.ruta[0],
                    ruta2: this.ruta[1]
                },
                function(data){
                    console.log(data);
                }
            )
        }
    }
});
new Vue({
    el: '#app',
    data: {
        msg: 'Vue is Works!',

    }
});