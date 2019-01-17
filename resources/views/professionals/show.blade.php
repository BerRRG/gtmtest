<!DOCTYPE html>
<html>
<head>
    <title>Detalhes do Profissional</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @include('nav');
</head>
<body>
<div class="container">

        <p class="title">Detalhes do Profissional</p>
        <hr>
        <a class="btn btn-primary caption menu"href="{{ URL::to('professionals') }}">Listar profissionais</a>
        <a class="btn btn-primary caption menu" href="{{ URL::to('professionals/create') }}">Adicionar profissionais</a>

    <div class="panel panel-primary register">
        <p class="title-detail">{{ $professional->name }}</p>
        <p class="details">
	    <strong>Especialidade:</strong> {{ $professional->occupation }}<br>
	    <strong>Data de Nascimento:</strong> {{ $professional->birth_date }}<br>            
	    <strong>Email:</strong> {{ $professional->email }}<br>
	    <strong>Telefone:</strong> {{ $professional->phone }}<br>
	    <strong>Celular:</strong> {{ $professional->celphone }}<br>
	    <strong>Endereço:</strong> {{ $professional->address }}<br>
	    <strong>Bairro:</strong> {{ $professional->neighborhood }}<br>
	    <strong>CEP:</strong> {{ $professional->cep }}<br>
	    <strong>Cidade:</strong> {{ $professional->city }}<br>
	    <strong>Estado:</strong> {{ $professional->uf }}<br>
	    <strong>Estado civil:</strong> {{ $professional->marital_status }}<br>
        </p>
    </div>
    <div>    	
        <a class="btn btn-small btn-primary" href="{{ URL::to('professionals') }}">Voltar</a>
        <!-- <a class="btn btn-small btn-primary" href="{{ URL::to('professionals/edit') }}">Editar</a> -->
    </div>
<br/>
</div>
</body>
</html>
