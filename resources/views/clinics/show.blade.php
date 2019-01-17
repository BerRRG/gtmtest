<!DOCTYPE html>
<html>
<head>
    <title>Detalhes do Consultório</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @include('nav');
</head>
<body>
<div class="container">

        <p class="title">Detalhes do Consultório</p>
        <hr>
        <a class="btn btn-primary caption menu" href="{{ URL::to('clinics') }}">Listar consultórios</a></li>
        <a class="btn btn-primary caption menu" href="{{ URL::to('clinics/create') }}">Adicionar consultório</a>


    <div class="panel panel-primary register">
        <p class="title-detail">{{ $clinic->name }}</p>
        <p class="details">
            <strong>Status: </strong> Liberado <br>
        </p>
    </div>
    <div>    	
        <a class="btn btn-small btn-primary" href="{{ URL::to('clinics') }}">Voltar</a>
    </div>
<br/>
</div>
</body>
</html>
