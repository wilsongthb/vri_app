@extends('vri.default')

@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-md-4">
        @include('vri.menu')
        </div>
        <div class="col-md-8">
            <div class="panel panel-primary">
            <div class="panel-heading"><h2>Subir Archivos</h2></div>
            <div class="panel-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                </div>
                <a href="/php/files/pdf/{{ Session::get('doc') }}">VER</a>
                @endif
                <form action="{{url('vri/subir')}}" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            Selecciona el archivo para subir:
                            {{csrf_field()}}
                            <input type="file" name="doc" id="doc" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <button type="submit">Subir!</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection