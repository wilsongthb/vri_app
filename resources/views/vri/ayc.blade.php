@extends('layouts.app')

@push('link')
<link href="{{asset('/static/css/cosmo/bootstrap.min.css')}}" rel="stylesheet">
@endpush

@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-md-4">
        @include('vri.menu')
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="text-center">VER ARCHIVOS Y CARPETAS</h3></div>
                <div class="panel-body">
                    <vue-archivosycarpetas></vue-archivosycarpetas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('template')
<template id="vue-archivosycarpetas">
    <div>
        <h4>Archivos escaneados</h4>
        <div class="text-right">
            <span class="glyphicon glyphicon-cog"></span><label>Configurar</label>&nbsp;<input type="checkbox" v-model="ver_url">
        </div>
        <div class="input-group" v-if="ver_url">
            <span class="input-group-addon">
                <label for="">URL</label>
            </span>
            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" v-model="escaner" v-on:change="escanear()">
            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" v-model="url" v-on:change="escanear()">
            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" v-model="src" v-on:change="escanear()">
        </div>
        <button class="btn btn-primary" v-for="r in lista.rutas" v-on:click="src = r.direccion; escanear()">
            @{{r.nombre}}
        </button>
        <hr>
        <div class="list-group">
            <a class="list-group-item list-group-item-warning" v-for="f in lista.carpetas" v-bind:title="f.direccion" v-on:click="src = f.direccion; escanear()">
                <span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;<span>@{{f.nombre}}</span>
            </a>
            <a class="list-group-item" v-for="f in lista.archivos" v-bind:title="f.direccion" v-bind:href="url + f.direccion">
                <span class="glyphicon glyphicon-file"></span>&nbsp;&nbsp;<span>@{{f.nombre}}</span>
            </a>
        </div>
    </div>
</template>
@endsection

@push('script')
<script src="{{asset('/static/js/vue.js')}}"></script>
<script src="{{asset('/js/archivosycarpetas.js')}}"></script>
@endpush