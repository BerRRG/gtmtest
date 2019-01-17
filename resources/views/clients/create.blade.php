<!DOCTYPE html>
<html>
<head>
    @include('gtm-header')
    <title>Cadastrar Cliente</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @include('nav');
</head>
<body>
    @include('gtm-body')
<div class="container">

	<p class="title">Cadastro de Cliente</p>
    <hr>
    <a class="btn btn-primary caption menu" href="{{ URL::to('clients') }}">Listar clientes</a>
        

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::open(array('url' => 'clients')) }}

@include('clients.form')

<!-- <a class="btn btn-small btn-primary buttonCad" href="{{ URL::to('clients') }}">Voltar</a> -->
{{ Form::submit('Inserir Cliente', array('class' => 'btn btn-primary buttonCad')) }}   	
        
{{ Form::close() }}

<br/>
</div>
</body>
</html>
