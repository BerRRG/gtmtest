<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Consultório</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @include('nav');
</head>
<body>
<div class="container">
    
    <p class="title">Cadastro de Consultório</p>
    <hr>
    <a class="btn btn-primary caption menu" href="{{ URL::to('clinics') }}">Listar consultórios</a>



<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::open(array('url' => 'clinics')) }}

    <div class="painel panel-primary register">
        <div class="row">
            <div class="col-sm-9">
                <div class="form-group">
                    {{ Form::label('name', 'Nome') }}
                    {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                </div>
            </div>
        </div>
    </div>
    <!-- <a class="btn btn-small btn-primary buttonCad" href="{{ URL::to('clinics') }}">Voltar</a> -->
    {{ Form::submit('Inserir Consultório', array('class' => 'btn btn-primary buttonCad')) }}  

{{ Form::close() }}

<br/>
</div>
</body>
</html>
