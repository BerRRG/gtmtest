<!DOCTYPE html>
<html>
<head>
    <title>Editar Profissional</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @include('nav');
</head>
<body>
<div class="container">

		<p class="title">Editar: {{ $professional->name }}</p>
        <hr>
        <a class="btn btn-primary caption menu" href="{{ URL::to('professionals') }}">Listar profissionais</a>
        <a class="btn btn-primary caption menu" href="{{ URL::to('professionals/create') }}">Adicionar profissional</a>

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::model($professional, array('route' => array('professionals.update', $professional->id), 'method' => 'PUT')) }}

@include('professionals.form')
{{ Form::submit('Inserir alterações', array('class' => 'btn btn-primary buttonCad')) }}

{{ Form::close() }}

<br/>
</div>
</body>
</html>
