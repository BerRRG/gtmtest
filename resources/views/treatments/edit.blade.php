<!DOCTYPE html>
<html>
<head>
    <title>Editar Tratamento</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @include('nav');
</head>
<body>
<div class="container">

        <p class="title">Editar tratamento:  {{ $treatment->name }}</p>
        <hr>
        <a class="btn btn-primary caption menu" href="{{ URL::to('treatments') }}">Listar tratamentos</a>
        <a class="btn btn-primary caption menu" href="{{ URL::to('treatments/create') }}">Adicionar tratamento</a>

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::model($treatment, array('route' => array('treatments.update', $treatment->id), 'method' => 'PUT')) }}

    <div class="panel-primary register">
    <div class="form-group">
        {{ Form::label('name', 'Nome') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Descrição') }}
        {{ Form::text('description', Input::old('description'), array('class' => 'form-control')) }}
    </div>
    </div>
    {{ Form::submit('Inserir alteração', array('class' => 'btn btn-primary buttonCad')) }}

{{ Form::close() }}

<br/>
</div>
</body>
</html>
