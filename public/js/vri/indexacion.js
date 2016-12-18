Vue.component('vue-archivosycarpetas', {
    template: "#vue-archivosycarpetas",
    props: [
        'url',
        'srcini',
        'escaner'
    ],
    data: function(){
        return {
            src: this.srcini,
            ver_url: false,
            lista: {},
            respuesta: false,
            procesado: false
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
        terminar: function(){
            //alert('mi hijo me dijo que termine');
            this.procesado = false;
        }
    },
    created: function(){
        this.escanear();
    }
});

Vue.component('vue-indexar', {
    template: '#vue-indexar',
    props: ['procesado','url'],
    data: function(){
        return {
            msg: 'aqui voy a indexar',
            nombre: this.procesado.nombre,
            direccion: this.procesado.direccion
        }
    },
    methods: {
        indexar: function(ruta){
            $.post(this.url + 'indexar.php', {
                nombre: this.nombre,
                direccion: this.direccion
            },function(data){
                data = JSON.parse(data);
                console.log(data);
                if(data.error == ''){
                    alert('Guardado en la base de datos con exito!');
                }else{
                    alert('Error!: '+data.error);
                }
                this.$emit('terminar');
            }.bind(this))
        },
        terminar: function(){
            this.$emit('terminar');
            // alert('gritando!!');
        }
    }
});

new Vue({
    el: '#app',
    data: {
        msg: 'Vue is Works!',

    }
});