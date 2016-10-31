// define
var MyComponent = Vue.extend({
  template: '<div>A custom component!</div>'
})
// register
Vue.component('my-component', MyComponent)
// create a root instance
new Vue({
  el: '#example'
});


//my trabajo, films
var c_film = Vue.extend({
    template: '#t-1',
    data: function (){
        return {
            list: {}
        }
    },
    created: function () {
        $.getJSON('http://localhost/p/dev/swapi.co.json', function(data){
            console.log(data);
            this.list = data.results;
        }.bind(this));
    }
});
Vue.component('my-film', c_film)
new Vue({
    el: '#films'
});
