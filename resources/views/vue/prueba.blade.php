<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <div id="app">
        @{{saludo}}
    </div>
    <div id="example">
        <my-component></my-component>
    </div>
    <div id="films">
        <my-film></my-film>
    </div>
    <template id="t-1">
        <div>
            <h1>Peliculas</h1>
            <ul>
                <li v-for="f in list">@{{f.title}}</li>
            </ul>
        </div>
    </template>
</body>
@if(isset($dev))
    <script src="{{url('/js/vue.js')}}"></script>
@else
    <script src="{{url('/js/app.js')}}"></script>    
@endif
<script src="{{url('/js/script.js')}}"></script>
</html>