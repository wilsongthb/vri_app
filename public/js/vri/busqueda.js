var app = angular.module('vri', []);
app.service('server', function($http){
    return {
        darLista: function(frase){
            return $http.post('/res/lista_archivos', {
                _token: Laravel.csrftoken,
                search: frase
            });
        }
    }
});
app.controller('busqueda', function($scope, server) {
    $scope.lista = {};
    $scope.search = '';
    $scope.msg = 'Angular is Works!';

    $scope.mostrar = function(){
        server.darLista($scope.search).then(function(response){
            $scope.lista = response.data;
            console.log($scope.lista);
        });
    }

    $scope.mostrar();
});