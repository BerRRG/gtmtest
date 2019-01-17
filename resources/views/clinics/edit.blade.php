<!DOCTYPE html>
<html>
<head>
    <title>Editar Consultório</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @include('nav');
</head>
<body>
<div class="container">

        <p class="title">Editar: {{ $clinic->name }}</p>
        <hr>
        <a class="btn btn-primary caption menu" href="{{ URL::to('clinics') }}">Listar consultórios</a>
        <a class="btn btn-primary caption menu" href="{{ URL::to('clinics/create') }}">Adicionar consultório</a>

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::model($clinic, array('route' => array('clinics.update', $clinic->id), 'method' => 'PUT')) }}

    <div class="panel panel-primary register">
        <div class="form-group">
            {{ Form::label('name', 'Nome') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>
    </div>
    {{ Form::submit('Inserir alterações', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

<br/>
</div>
</body>
</html>
