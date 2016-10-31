@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-md-4">
        @include('vri.menu')
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="text-center">INDEXACION</h3></div>
                <div class="panel-body">
                    <div is="vue-archivos"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('template')
<template id="vue-archivos">
    <div>
        <h4>Archivos escaneados</h4>
        <div v-if="respuesta == 'error'" class="alert alert-danger" role="alert">
            <strong>Error!</strong> , ya esta indexado
            <button type="button" class="close" v-on:click="respuesta = false" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div v-if="respuesta == 'exito'" class="alert alert-success" role="alert">
            <strong>Indexado!</strong> , con exito
            <button type="button" class="close" v-on:click="respuesta = false" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="input-group">
            <span class="input-group-addon">
                <label for="basic-url">URL</label>
            </span>
            <span class="input-group-addon">
                <input type="checkbox" v-model="c_url">
            </span>
            <span v-if="c_url" class="input-group-addon" id="basic-addon3" >@{{url}}</span>
            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" v-model="src">
        </div>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Nombre</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="f in lista.archivos">
                    <td v-bind:title="url + f.direccion">@{{f.nombre}}</td>
                    <td>
                        <div class="btn-group btn-group-justified" role="group" aria-label="...">
                            <a v-bind:href="url + f.direccion">
                                <button type="button" class="btn btn-default" title="Ver"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                            </a>
                            <a><button type="button" class="btn btn-default" v-on:click="indexar(f.direccion)" title="Indexar"><span class="glyphicon glyphicon-link" aria-hidden="true"></span></button></a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <pre>
        @{{respuesta}}
        </pre>
    </div>
</template>
@endsection

@section('script')
<script src="{{url('js/indexacion.js')}}"></script>
@endsection