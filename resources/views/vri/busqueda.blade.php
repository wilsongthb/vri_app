@extends('vri.default')
@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-md-4">
        @include('vri.menu')
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="text-center">BUSQUEDA</h3></div>
                <div class="panel-body" ng-app="vri" ng-controller="busqueda">
                    <!-- Angular JS para variar :D -->
                    <div class="col-md-6">
                        <label for="">Este campo te permite buscar frases dentro del contenido de los documentos indexados en la base de datos</label>
                        <textarea cols="30" rows="10" ng-model="search" ng-change="mostrar()" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6 list-group">
                        <button class="list-group-item active">Tesis que coinciden: @{{lista.total}}</button>
                        <button class="list-group-item" ng-repeat="item in lista.data"><a href="/res/archivo/@{{item.id}}">@{{item.id + ' :: ' + item.nombre}}</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script src="{{asset('/static/js/angular.js')}}"></script>
<script src="{{asset('/js/vri/busqueda.js')}}"></script>
@endpush