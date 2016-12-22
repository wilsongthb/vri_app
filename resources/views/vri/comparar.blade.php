@extends('vri.default')
@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2>COMPARACION - @{{msg}}</h2>
        </div>
        <vue-comparar></vue-comparar>
    </div>
</div>
@endsection
@section('template')
<template id="vue-archivosycarpetas">
    <div>
        <h4>Seleccionar Archivo</h4>
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
        <button class="btn btn-default" v-for="r in lista.rutas" v-on:click="src = r.direccion; escanear()">
            @{{r.nombre}}
        </button>
        <hr>
        <div class="list-group">
            <a class="list-group-item list-group-item-warning" v-for="f in lista.carpetas" v-bind:title="f.direccion" v-on:click="src = f.direccion; escanear()">
                <span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;<span>@{{f.nombre}}</span>
            </a>
            <a class="list-group-item" v-for="f in lista.archivos" v-bind:title="f.direccion" @click="seleccionar(f.direccion)">
                <span class="glyphicon glyphicon-file"></span>&nbsp;&nbsp;<span>@{{f.nombre}}</span>
            </a>
        </div>
        <button @click="terminar()" class="btn btn-danger">Cancelar</button>
    </div>
</template>
<template id="vue-comparar">
    <div class="row">
        <input type="text" v-model="identificador" class="form-control">
        <hr>
        <template v-if="select == 1">
            <vue-archivosycarpetas @terminar="terminar" clave="0" url="{{url('/php')}}/"></vue-archivosycarpetas>
        </template>
        <template v-if="select == 2">
            <vue-archivosycarpetas @terminar="terminar" clave="1" url="{{url('/php')}}/" ></vue-archivosycarpetas>
        </template>
        <template v-if="select == 3">
            <form v-bind:action="'{{url('/vri/comparacion/resultado')}}/'+identificador" method="post">
            <div class="col-md-6">
                <div class="input-group">
                <label for="">Archivo 1</label>
                    <span class="input-group-addon btn btn-default" @click="select=1">
                        Seleccionar
                    </span>
                    <input type="text" v-model="ruta[0]" class="form-control" name="ruta0">
                </div>
                {{-- <label for="">Ver contenido</label>&nbsp;&nbsp;<input type="checkbox" v-model="ver.f1">
                <template v-if="ver.f1">
                    <pre>@{{txt1}}</pre>
                </template> --}}
            </div>
            <div class="col-md-6">
                <div class="input-group">
                <label for="">Archivo 2</label>
                    <span class="input-group-addon btn btn-default" @click="select=2">
                        Seleccionar
                    </span>
                    <input type="text" v-model="ruta[1]" class="form-control" name="ruta1">
                </div>
                {{-- <label for="">Ver contenido</label>&nbsp;&nbsp;<input type="checkbox" v-model="ver.f2">
                <template v-if="ver.f2">
                    <pre>@{{txt2}}</pre>
                </template> --}}
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    {{-- <hr>
                    <button class="btn btn-default form-control" @click="comparar()">Comparar</button>
                    <a v-bind:href="'{{url('/vri/comparacion/resultados')}}/'+identificador">
                        <button class="btn btn-warning form-control">Resultados</button>
                    </a> --}}
                    {{ csrf_field() }}
                    <button class="btn btn-warning form-control">Resultados</button>
                </div>
            </div>
            </form>
        </template>
    </div>
</template>
@endsection
@push('script')
<script src="{{asset('/static/js/vue.js')}}"></script>
<script src="{{asset('/js/vri/comparacion.js')}}"></script>
@endpush