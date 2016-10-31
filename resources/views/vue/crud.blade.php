<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="{{url('css/app.css')}}">
</head>
<body>
    <div id="app"></div>
    <div class="container" id="crud">
        <div class="col-md-12">
            <crud-tag></crud-tag>
        </div>
    </div>
</body>
<template id="crud-tag">
    <div class="container">
        <h1>CRUD</h1>
        <table class="table">
            <tbody>
                <tr v-for="fila in respuesta.data">
                    <td>@{{fila.id}}</td>
                    <td>@{{fila.paterno}}</td>
                    <td>@{{fila.materno}}</td>
                    <td>@{{fila.nombres}}</td>
                </tr>
            </tbody>
        </table>
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li v-for="pagina in respuesta.last_page">
                    <a href="#" class="btn-page" v-on:click="cargar(pagina)">@{{pagina}}</a>
                </li>
            </ul>
    </div>
</template>
<script src="{{url('js/app.js')}}"></script>
<script src="{{url('js/crud.js')}}"></script>
</html>