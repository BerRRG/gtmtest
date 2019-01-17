<!DOCTYPE html>
<html>
<head>
    @include('gtm-header')

    <title>Editar Cliente</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @include('nav');
</head>
<body>

    @include('gtm-body')

<div class="container">

	<p class="title">Editar cliente:  {{ $client->name }}</p>
    <hr>
    <a class="btn btn-primary caption menu" href="{{ URL::to('clients') }}">Listar clientes</a>
    <a class="btn btn-primary caption menu" href="{{ URL::to('clients/create') }}">Adicionar cliente</a>

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}
{{ Form::model($client, array('route' => array('clients.update', $client->id), 'method' => 'PUT')) }}

{{ Form::model($client, array('route' => array('clients.update', $client->id), 'method' => 'PUT'))}}

@include('clients.form')

<a class="btn btn-small btn-primary buttonCad" href="{{ URL::to('clients') }}">Voltar</a>
{{ Form::submit('Salvar alterações', array('class' => 'btn btn-primary buttonCad')) }}

{{ Form::close() }}   	


</div>
</body>
</html>
