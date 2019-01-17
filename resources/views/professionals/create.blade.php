<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Profissional</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @include('nav')
</head>
<body>
<div class="container">

    <p class="title">Cadastro de Profissional</p>
    <hr>
    <a class="btn btn-primary caption menu" href="{{ URL::to('professionals') }}">Listar profissionais</a>

        
        <!-- <a href="{{ URL::to('professionals/create') }}">Adicionar profissional</a> -->

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::open(array('url' => 'professionals')) }}

@include('professionals.form')

<!-- <a class="btn btn-small btn-primary buttonCad" href="{{ URL::to('professionals') }}">Voltar</a> -->
{{ Form::submit('Inserir Profissional', array('class' => 'btn btn-primary buttonCad')) }}

{{ Form::close() }}

<br/>
</div>
</body>
</html>
