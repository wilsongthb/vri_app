@extends('vri.default')
@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-md-4">
        @include('vri.menu')
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="text-center">Convertir</h3></div>
                <div class="panel-body">
                    {{public_path('')}}
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