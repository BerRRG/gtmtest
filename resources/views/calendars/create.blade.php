<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Cliente</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @include('nav');
</head>
<body>
<div class="container">

		<p class="title">Cadastro de Clientes</p>
    	<hr>
        <a class="btn btn-primary caption menu" href="{{ URL::to('clients') }}">Listar clientes</a>
        <a class="btn btn-primary caption menu" href="{{ URL::to('clients/create') }}">Adicionar cliente</a>


<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::open(array('url' => 'clients')) }}

@include('clients.form')

{{ Form::submit('Inserir', array('class' => 'btn btn-primary buttonCad')) }}

{{ Form::close() }}

<br/>
</div>
</body>
</html>
