// var app = angular.module('vri', []);
// app.service('alf', function(){
//     return {
//         msg: 'pam pam'
//     }
// });
// app.service('php', function($http){
//     return {
//         darLista: function(directorio){
//             return $http.get('/php/archivosycarpetas.php', {
//                 params: {
//                     ruta: directorio
//                 }
//             });
//         }
//     }
// });
// app.controller('indexacion', function($scope, alf, php) {
//     $scope.lista = {};
//     $scope.directorio = 'files';

//     $scope.mostrar = function(){
//         php.darLista($scope.directorio).then(function(response){
//             $scope.lista = response.data;
//         });
//     }
//     $scope.cambia = function(directorio){
//         $scope.directorio = directorio;
//     }

//     $scope.mostrar();
// });