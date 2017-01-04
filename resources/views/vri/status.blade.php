@extends('vri.default')
@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-md-4">
        @include('vri.menu')
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="text-center">Status</h3></div>
                <div class="panel-body">
                    <pre>
<?php
echo file_get_contents('status.txt');
?>
                    </pre>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection