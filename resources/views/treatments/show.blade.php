<!DOCTYPE html>
<html>
<head>
    <title>Detalhes do Tratamento</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @include('nav');
</head>
<body>
<div class="container">
    
        <p class="title">Detalhes do Tratamento</p>
        <hr>
        <a class="btn btn-primary caption menu" href="{{ URL::to('treatments') }}">Listar tratamentos</a>
        <a class="btn btn-primary caption menu" href="{{ URL::to('treatments/create') }}">Adicionar tratamento</a>



    <div class="panel panel-primary register">
        <p class="title-detail">{{ $treatment->name }}</p>
        <p class="details">
            <strong>Descrição:</strong> {{ $treatment->description }}<br>
        </p>
    </div>
    <div>    	
        <a class="btn btn-small btn-primary" href="{{ URL::to('treatments') }}">Voltar</a>
    </div>
<br/>
</div>
</body>
</html>
