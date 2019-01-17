<!DOCTYPE html>
<html>
<head>
    <title>Detalhes do Cliente</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('/') }}">Home</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('calendario') }}">Listar Calendario</a></li>
    </ul>
</nav>

<h1>Detalhes do Cliente</h1>

    <div class="jumbotron text-left">
        <h2>{{ $calendar->client()->first()->name }}</h2>
        <p>
            <strong>Nome do cliente:</strong> {{ $calendar->client()->first()->name }}<br>
            <strong>Nome do profissional:</strong> {{ $calendar->professional()->first()->name }}<br>
            <strong>Sala:</strong> {{ $calendar->clinic()->first()->name }}<br>
	        <strong>Começo:</strong> {{ $calendar->start_date }}<br>
    	    <strong>Fim:</strong> {{ $calendar->end_date }}<br>
        </p>
    </div>
    <div>
        <a class="btn btn-small btn-success" href="{{ URL::to('calendario') }}">Voltar</a>
    </div>
<br/>
</div>
</body>
</html>
